<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>vuestagram</title>
</head>
<body>
    <div id="app">
        {{-- <App-Component></App-Component> 불려오는 양식이 정해져있다 단어와 단어사이에 - 넣어준다--}}
        <App-Component></App-Component>
    </div>
</body>
</html>