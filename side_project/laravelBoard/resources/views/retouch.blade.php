@extends('inc.layout')
{{-- 타일틀 --}}
@section('title', '회원가입')

{{-- 회원 가입용 JS --}}
@section('script')
    <script src="/js/regist.js" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endsection

{{-- 바디에 vh 클래스 부여 --}}
@section('bodyClassVh', 'vh-100')
{{-- @section('bodyClassVh')
<body class="vh-100">
@endsection --}}

{{-- 메인 --}}
@section('main')
<!-- <main class="position-absolute top-50 start-50 translate-middle w-25"> -->
<main class="d-flex justify-content-center align-items-center h-75">
    <form style="width: 300px;" action="{{route('retouch.store')}}" method="POST">
        <h1>회원 정보 수정</h1>
        <!-- 에러 메시지 -->
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
    
        <label for="name" class="form-label">이름</label>
        <input type="text" class="form-control mb-3" id="name" name="name" required>

        <label for="email" class="form-label">이메일</label>
        <span id="print-chk-email"></span>
        <button id="btn-chk-email" type="button" class="btn btn-secondary mb-2 float-end">중복 확인</button>
        <input type="text" class="form-control mb-3" id="email" name="email" required>
        
        <label for="password" class="form-label">비밀번호</label>
        <input type="password" class="form-control mb-3" id="password" name="password" required>

        <button id="my-btn-complete" type="submit" disabled="disabled" class="btn btn-dark">완료</button>
        <a href="{{route('get.login')}}" class="btn btn-secondary">취소</a>
    </form>
</main>
@endsection