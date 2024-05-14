@extends('inc.layout')
{{-- 타일틀 --}}
@section('title', '회원가입')

{{-- 바디에 vh 클래스 부여 --}}
@section('bodyClassVh', 'vh-100')
{{-- @section('bodyClassVh')
<body class="vh-100">
@endsection --}}

{{-- 메인 --}}
@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
    <div>
        <h2>500 에러</h2>
        <p>이미지 없어요! 이미지 넣어주세요!!!</p>
        <a href="{{route('board.index')}}">메인 페이지로 돌아가기</a>
    </div>
</main>
@endsection