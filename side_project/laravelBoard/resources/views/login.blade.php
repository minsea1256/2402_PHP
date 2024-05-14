@extends('inc.layout')
{{-- 타일틀 --}}
@section('title', '로그인')

{{-- 바디에 vh 클래스 부여 --}}
@section('bodyClassVh', 'vh-100')
{{-- @section('bodyClassVh')
<body class="vh-100">
@endsection --}}

{{-- 메인 --}}
@section('main')
<!-- <main class="position-absolute top-50 start-50 translate-middle w-25"> -->
<main class="d-flex justify-content-center align-items-center h-75">
    <form action="{{route('post.login')}}" style="width: 300px;" method="post">
        @csrf
        {{-- 에러 메세지 표시 --}}
        @if($errors->any()) {{-- 참/거짓 결과를 가져온다  --}}
        <div class="form-text text-danger">
            {{-- 에러 메세지 루프 처리 --}}
            @foreach ($errors->all() as $error)
            <span>{{$error}}</span>
            <br>
            @endforeach
        </div>
        @endif
        
        <label for="email" class="form-label">아이디</label>
        <input type="text" class="form-control mb-3" name="email" id="email">
        <label for="password" class="form-label">비밀번호</label>
        <input type="password" class="form-control mb-3" name="password" id="password">
        <button type="submit" class="btn btn-dark">로그인</button>
    </form>
</main>
@endsection