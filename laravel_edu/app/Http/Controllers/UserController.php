<?php

namespace App\Http\Controllers;

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

        // WHERE 나머지 부터 ... 커밍 순


        return var_dump($result);
    }
}
