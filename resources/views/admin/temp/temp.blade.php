<!doctype html>
<html lang="jn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/vue"></script>
    <script src="js/admin/@yield('js').js"></script>
    <link rel="stylesheet" href="css/admin/@yield('css').css">
    <title>@yield('title')</title>
</head>
<body>

@include('admin/temp/head')
@yield('content')
@include('admin/temp/foot')

</body>
</html>