<?php

namespace App\Http\Controllers;

use App\Exceptions\MyAuthException;
use App\Exceptions\MyValidateException;
use App\Http\Middleware\MyAuth;
use App\Models\User;
use MyToken;
use MyUserValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * 로그인 처리
     */
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

    /**
     * 토큰 재발급
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return response() json
     */
    public function reissue(Request $request) {
        Log::debug('*********************** 토큰 재발급 시작 ***********************');
        // 유저 PK 획득
        $id = MyToken::getValueInPayload($request->bearerToken(), 'idt');
        Log::debug('배어럴 토큰 : '.$request->bearerToken());
        Log::debug('유저 PK : '.$id);

        // 유저 정보 획득
        $resultUserInfo = User::find($id);
        Log::debug('유저 정보 : ', $resultUserInfo->toArray());

        // 유효한 유저 확인
        if(!isset($resultUserInfo)) {
            throw new MyAuthException('E20');
        }
        Log::debug('유효한 유저 확인 완료');
        
        // 리프래시 토큰 체크
        if($request->bearerToken() !== $resultUserInfo->refresh_token) {
            throw new MyAuthException('E23');
        }
        Log::debug('리프래시 토큰 체크 완료');
        
        // 토큰 발행
        list($accessToken, $refreshToken) = MyToken::createTokens($resultUserInfo);
        Log::debug('토큰 발행 완료');
        
        // 리프래시 토큰 저장
        MyToken::updateRefreshToken($resultUserInfo, $refreshToken);
        Log::debug('토큰 저장 완료');


        // response Date
        $responseDate = [
            'code' => '0'
            ,'msg' => '인증완료'
            ,'accessToken' => $accessToken // 권한체크
            ,'refreshToken' => $refreshToken // 인증체크
            ,'data' => $resultUserInfo
        ];
        
        Log::debug('*********************** 토큰 재발급 완료 ***********************');
        return response()->json($responseDate, 200);
    }

    // 회원가입
    public function user(Request $request) {
        Log::debug('*********************** 회원 가입 시작 ***********************');
        Log::debug('Start Login', $request->all());
        $requestData = [
            'account' => $request->account
            ,'password' => $request->password
            ,'name' => $request->name
        ];
        // 유효성 검사
        $resultValidate = MyUserValidate::myValidate($requestData);

        // 유효성 검사 실패 처리 - 시스템 에러 X, 유저가 보낸 데이터가 문제가 있을때
        if($resultValidate->fails()) {
            Log::debug('login Validation Error', $resultValidate->errors()->toArray());
            throw new MyValidateException('E01');
        }

        // 유저 정보 조회
        $resultUserInfo = User::where('account', $request->account)->withCount('boards')->first();
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
        Log::debug('*********************** 회원 가입 완료 ***********************');
    }
}
