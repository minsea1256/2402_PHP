@extends('inc.layout')
{{-- 타일틀 --}}
@section('title', '게시판')

{{-- 자바스크립트 파일 --}}
@section('script')
    <script src="/js/board.js" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endsection

{{-- 메인 --}}
@section('main')
<!-- <main class="position-absolute top-50 start-50 translate-middle w-25"> -->
<div class="text-center mt-5 mb-5">
    <h1>{{$boardNameInfo->name}}</h1>
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16" data-bs-toggle="modal" data-bs-target="#modal-insert">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
    </svg>
</div>

<main>
    <!-- 카드 -->
    @foreach ($data as $item)
    <div class="card" id="card{{$item->id}}">
        <img src="{{$item->img}}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">{{$item->title}}</h5>
            <p class="card-text">{{$item->content}}</p>
            <button class="btn btn-primary my-btn-detail" data-bs-toggle="modal" data-bs-target="#modal-detail" value="{{$item->id}}">상세</button>
        </div>
    </div>
    @endforeach
</main>

{{-- 상세 모달 --}}
<div class="modal" tabindex="-1" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="">
                <div class="modal-header">
                    <h5 class="card-title">집사 어디가냥!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="card-text">날 버리고 어디가냥 집사냥 추르 내놔라!!!!!</p>
                    <br>
                    <img src="./img/7SO2FDuNnzmK_kE68K_wceSKJqoW8-E4vQnJE3uAItSdqFbjbwHMgITRfWLnssiT7MLWzTz3n6nBedGTFFC1EA.webp" class="card-img-top" alt="우는 고양이">
                </div>
                <div class="modal-footer justify-content-between">
                    <div>
                        <button type="button" class="btn btn-dark " data-bs-dismiss="modal">수정</button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">닫기</button>
                        <button id="my-btn-report" type="button" class="btn btn-warning " data-bs-dismiss="modal">신고</button>
                        <button id="my-btn-delete" type="button" class="btn btn-danger" data-bs-dismiss="modal">삭제</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- 작성 모달 --}}
<div class="modal" tabindex="-1" id="modal-insert">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('board.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- TODO: type 설정 필요 --}}
                <input type="hidden" name="type" value="{{$boardNameInfo->type}}">
                <div class="modal-header">
                    <input type="text" class="form-control" name="title" placeholder="제목을 입력하세요.">
                </div>
                <div class="modal-body">
                    <textarea class="form-control" name="content" placeholder="내용을 입력하세요." rows="10"></textarea>
                    <br>
                    <input class="form-control" name="file" type="file" accept="image/*">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
                    <button type="submit" class="btn btn-primary">작성</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection