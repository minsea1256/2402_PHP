<?php

namespace App\Http\Controllers;

use App\Exceptions\MyAuthException;
use App\Exceptions\MyValidateException;
use App\Models\User;
use MyToken;
use MyUserValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function login(Request $request) {
        Log::debug('Start Login', $request->all());
        $requestData = [
            'account' => $request->account
            ,'password' => $request->password
        ];
        
        // 유효성 검사
        $resultValidate = MyUserValidate::myValidate($requestData);

        // 유효성 검사 실패 처리 - 시스템 에러 X, 유저가 보낸 데이터가 문제가 있을때
        if($resultValidate->fails()) {
            Log::debug('login Validation Error', $resultValidate->errors()->all());
            throw new MyValidateException('E01');
        }

        // 유저 정보 조회
        $resultUserInfo = User::where('account', $request->account)->withCount('boards')->first();

        // 미등록 유저 없음
        if(!isset($resultUserInfo)) {
            throw new MyAuthException('E20');
        }

        // 패스워드 체크
        if(!(Hash::check($request->password, $resultUserInfo->password))) {
            throw new MyAuthException('E21');
        }

        // 토큰 발행
        list($accessToken, $refreshToken) = MyToken::createTokens($resultUserInfo);

        // 리프래시 토큰 저장
        MyToken::updateRefreshToken($resultUserInfo, $refreshToken);


        // response Date
        $responseDate = [
            'code' => '0'
            ,'msg' => '인증완료'
            ,'accessToken' => $accessToken // 권한체크
            ,'refreshToken' => $refreshToken // 인증체크
            ,'data' => $resultUserInfo
        ];
        return response()->json($responseDate, 200);
    }

    /**
     * 로그아웃
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return response() json
     */

    public function logout(Request $request) {
        $id = MyToken::getValueInPayload($request->bearerToken(), 'idt');
        $userInfo = User::find($id);

        MyToken::removeRefreshToken($userInfo);
        $responseDate = [
            'code' => '0'
            ,'msg' => ''
            ,'date' => $userInfo
        ];

        return response()->json($responseDate, 200);
    }
}
