<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ---------------------------------
// 라우터 정의
// ---------------------------------
// 문자열 리턴
Route::get('/hi', function() {
    return '안녕하세요.';
});

// Route::http메소드('/url', function() {}
Route::get('/hello', function() {
    return 'hello';
});

// 뷰파일 리턴
Route::get('/myview', function() {
    return view('myView');
});

// ---------------------------------
// HTTP 메소드에 대응하는 라우터
// ---------------------------------
Route::get('/home', function() {
    return view('home');
});
Route::post('/home', function() {
    return 'POST HOME';
});
Route::put('/home', function() {
    return 'PUT HOME';
});
Route::delete('/home', function() {
    return 'delete HOME';
});

// ---------------------------------
// 라우터에서 파라미터 제어
// ---------------------------------
// 파라미터 획득
Route::get('/param', function(Request $request) {
    return 'ID :'.$request->id." name : ".$request->name;
});

// 세그먼트 파라미터 : 파라미터 부분까지 한개의 url로 인식하기 때문 조건에 맞춰서 작성해야한다
Route::get('/segment/{id}/{gender}', function($id, $gender) {
    return $id." : ".$gender;
});
Route::get('/segment2/{id}/{gender}', function(Request $request, $id) {
    return $request->id." : ".$id." : ".$request->gender;
});

// 세그먼트 파라미터를 기본값 설정
Route::get('/segment3/{id?}', function($id = 'base') {
    return $id;
});

// ---------------------------------
// 라우터명 지정
// ---------------------------------
Route::get('/name', function() {
    return view('name');
});
// name(라우터명) 메소드를 이용
Route::get('/name/home/php505/root', function() {
    return 'URL 매우 길다.';
})->name('name.root');

// ---------------------------------
// 뷰에 데이터 전달
// with(키, 값) 메소드를 이용해서 뷰에 전달
// 뷰에서는 $키 로 사용이 가능하다.
// ---------------------------------
Route::get('/send', function() {
    $arr = [
        'id' => 1
        ,'email' => 'aqwe@naver.com'
    ];

    return view('send')
    // ->with(['gender' => '무성', 'name' => '홍길동']); 배열로 한번에 보내는 방법
    // 나눠서 작성하는 방법
    ->with('gender', '무성')
    ->with('name', '홍길동')
    // 배열 데이터 전달
    ->with('data', $arr);
});












// ---------------------------------
// 존재하지 않는 라우터(url) 페이지 정의
// ---------------------------------
// *** 없는 url는 맨 밑으로 배치하는 것이 좋다.[콜백처리는 맨 밑으로 정의하는것이 좋다] ***
Route::fallback(function() {
    return '없는 url 입니다.';
});