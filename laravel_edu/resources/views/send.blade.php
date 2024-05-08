<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <h1>{{ $gender." : ".$name }}</h1> : 한번에 작성하는 방법 --}}
    <h1>{{ $gender }}</h1>
    <h2>{{ $name }}</h2>
    {{-- 배열 출력 --}}
    <h1>{{ $data['id'] }}</h1>
</body>
</html>