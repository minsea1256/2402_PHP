<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
</head>
<body>
    <h1>Home</h1>
    <form action="/home" method="post">
        {{-- CSRF-TOKEN 추가 --}}
        @csrf 
        <button type="submit">POST</button>
    </form>
    <br>
    <form action="/home" method="post">
        @csrf 
        {{-- PUT : 대량[여러개]의 정보를 [업데이트]수정시 사용한다 --}}
        @method('PUT')
        <button type="submit">PUT</button>
    </form>
    <br>
    <form action="/home" method="post">
        @csrf 
        @method('DELETE')
        <button type="submit">DELETE</button>
    </form>
    
    {{-- PATCH : 일부의[한개] 정보를 [업데이트]수정시 사용한다 --}}
</body>
</html>