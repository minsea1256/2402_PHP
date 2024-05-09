{{-- 상속 : 상속문법은 마지막에 출력이 된다 --}}
@extends('layout.layout')

{{-- @section : 부모템플릿에 해당하는 @yield 부분에 삽입--}}
@section('title', '에듀윌')

{{-- @section ~ @endsection : 처리해야할 코드가 많을 경우 범위를 지정해서 삽입 --}}
@section('main')
<main>
    <h2>자식 템플릿 메인입니다.</h2>
</main>
@endsection

@section('show')
<h2>자식 show 입니다.</h2>
<h3>자식자식</h3>
@endsection

{{-- @if : 조건문 --}}
{{-- if문은 안 묶여있으면 상속문법 보다 먼저 실행 한다 --}}
@if($gender === 'F') 
    <span>성별 : 여자</span>
@elseif($gender === 'M')
    <span>성별 : 남자</span>
@else
    <span>성별 : 기타</span>
@endif
<hr>
{{-- 반복문 --}}
{{-- @for ~ @endfor : for 반복문 --}}
@for($i=2; $i < 9; $i++)
    <span>for : {{$i}}</span>
@endfor
<hr>
{{-- @foreach ~ @endforeach : foreach 반복문 --}}
<h3>foreach문</h3>
{{-- $loop : foreach, forelse에서 루프의 정보를 담고 있는 자동으로 생성되는 객체 --}}

{{-- @foreach($date as $key => $val)
    <h4>남은 루프 횟수 : {{$loop->remaining}}</h4>
    <span>{{$key." : ".$val}}</span>
    <br>
@endforeach --}}

{{-- 홀수로 색상 변경 --}}
@foreach($data as $key => $val)
    @if($loop->odd) 
    <span>{{$key." : ".$val}}</span>
    @else
    <span style="color: red">{{$key." : ".$val}}</span>
    @endif
    <br>
@endforeach
<hr>

{{-- @forelse ~ @empty ~ @endforelse : 루프를 할 데이터가 길이가 1이상이면 @forelse의 처리,
    배열의 길이가 0이면 @empty의 처리를 합니다.
--}}
<h2>forelse 문</h2>
@forelse($data2 as $key =>$val)
<span>{{$key." : ".$val}}</span>
<br>
@empty
<span>빈 배열 입니다.</span>
@endforelse
<hr>

