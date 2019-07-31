<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        console.log({{$id}});
        window.user = {
            id : {{$id}},
            name : "lala"
        };
         window.csrfToken = "{{ csrf_token() }}";
    </script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app">

    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>