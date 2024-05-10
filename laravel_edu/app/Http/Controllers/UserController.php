<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function eduUser() {
        // ---------------------------
        // 쿼리 빌더
        // ---------------------------
        // $result = DB::select('select * from users');
        // $result = DB::select("SELECT * FROM users WHERE name= :name", ['name' => '갑돌이']);
        // $result = DB::select("SELECT * FROM users WHERE name= ? or name = ?", ['갑돌이', '갑순이']); // 위에 식과 동일하다
        // $result = DB::select("SELECT * FROM users WHERE deleted_at is not null");

        // insert
        // $sql = 'INSERT INTO users(name, email, password) VALUES(?, ?, ?)';
        // $data = ['김철수', 'admin4@admin.com', Hash::make('qwer1234!')];
        // DB::beginTransaction(); // 트랜잭션 시작
        // $result = DB::insert($sql, $data);
        // if(!$result) {
        //     DB::rollBack(); // 롤백
        // }else {
        //     DB::commit(); // 커밋
        // }

        // update
        // $sql = 'UPDATE users set deleted_at = null WHERE id = ?';
        // $data = [5];
        // $result = DB::update($sql, $data);
        
        // delete
        // $sql = 'DELETE FROM users WHERE id = ?';
        // $data = [7];
        // $result = DB::delete($sql, $data);

        // ---------------------------
        // 쿼리 빌더 체이닝
        // ---------------------------   
        // users 테이블 모든 데이터 조회
        // select * from users;
        $result = DB::table('users')->get();

        // $result = DB::table('users')->where('name', '=', '홍길동')->dd(); 쿼리 어떻게 작성했는지 보여준다 
        // select * from users where name = ?; ['홍길동'];
        // $result = DB::table('users')->where('name', '=', '홍길동')->dd(); 

        // select * from users where id = ? or id = ?; [3, 4];
        // 두번째 파라미터는 , 를 생략이 가능하다
        // or은 orWhere로 작성해서 연결하면 된다
        $result = DB::table('users')->where('id', 3)->orWhere('id', 4)->get(); 

        // select * from users where name = '홍길동' and id = ?; ['홍길동', 3]
        // and는 where로 작성해서 연결하면 된다
        $result = DB::table('users')->where('name', '홍길동')->where('id', 4)->get(); 

        // select * from users order by name ASC;
        $result = DB::table('users')->select('name')->orderBy('name', 'ASC')->get(); 
        
        // select * from users where id in (?, ?); [2, 5]
        $result = DB::table('users')->whereIn('id', [2, 5])->get();
        // $result = DB::table('users')->whereNOTIn('id', [2, 5])->get(); // 적용한 파라미터 만 빼고 가져오는 식
        
        // select * from users where deleted_at is null;
        $result = DB::table('users')->whereNull('deleted_at')->get();
        
        // 2023년에 가입한 사람만 출력
        // select * from users where year(created_at) = ?; 속도 문제 있을때 밑에 식 이용하면 괜찮아 질것이다
        // select * from users where created_at between 20230101000000 and 20231231235959 = ?;
        $result = DB::table('users')->whereYear('created_at', '2023')->get();

        // 성별 회원수를 구하자
        // SELECT COUNT(gender) FROM users GROUP BY gender;
        // $result = DB::table('users')->select('gender', DB::raw('COUNT(gender) cnt'))->groupBy('gender')->get();
        $result = DB::table('users')->select('gender', DB::raw('COUNT(gender) cnt'))->groupBy('gender')->having('gender', '=', 'M')->get(); // 남자직원 순만 불려온다

        // SELECT id,name FROM users GROUP BY id limit ? offset ?; [1, 2]
        $result = DB::table('users')->select('id', 'name')->orderBy('id')->limit(1)->offset(2)->get();

        // 동적쿼리는 만들기 위한 when 메소드
        $reqData = 1; // 유저가 1또는 빈값인 데이터 전달
        $result = DB::table('users')->when($reqData, function($query, $reqData) {
            $query->where('id', $reqData);
        })->get();

        // first() : 쿼리 결과에서 가장 첫번째 레코드만 반환
        $result = DB::table('users')->first();
        // count() : 쿼리 결과의 레코드 수를 반환
        $result = DB::table('users')->count();
        // find($id) : 지정된 기본키의 해당하는 레코드를 반환
        $result = DB::table('users')->find(3);

        // insert[DB 삽입]
        // $result = DB::table('users')->insert([
        //     'name' => '김영희'
        //     ,'email' => 'kim@admin.com'
        //     ,'password' => Hash::make('qwer1234!')
        //     ,'gender' => 'F'
        // ]);

        // update[DB 업데이트]
        // $result = DB::table('users')->where('id', 10)->update([
        //     'email' => 'kim@naver.com'
        // ]);

        // delete[DB 삭제]
        // $result = DB::table('users')->where('id', 10)->delete();

        // ---------------------------
        // Eloquent Model
        // ---------------------------   
        $result = User::all();
        // $result = User::find(3);

        // insert
        $data = [
            'name' => '김영희'
            ,'email' => 'kim@naver.com'
            ,'password' => Hash::make('qwer1234!')
            ,'gender' => 'F'
        ];

        // $result = User::create($data); // 만든다
        // $result = $target->save(); // 저장한다

        // upsert
        // DB::beginTransaction();
        // $target = User::find(16);
        // $target->gender='M';
        // $result = $target->save();
        // DB::commit();

        // delete
        // $result = User::destroy(16);

        // 소프트 딜리트 된 데이터 조회
        // 삭제된 데이터도 같이 불려온다
        $result = User::withoutTrashed()->get(); // 소프트 딜리트 포함
        $result = User::onlyTrashed()->get(); // 소프트 딜리트 만

        // 소프트 딜리트 된거 복원
        $result = User::where('id', 16)->restore();
        
        return var_dump($result);
    }
}
