<html>

<head>
    <title>Tele-Conference Patient</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/video-call.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.cba69814a806ecc7945a.css') }}">
    <script>
        window.csrfToken = "{{ csrf_token() }}";
            var user_id = "{{ $id }}"
    </script>
</head>

<body>
    <div class="video-container">
        <video id="selfview" class="my-video" src="" autoplay="true" muted="muted"></video>
        <video id="remoteview" class="user-video" src="" autoplay="true"></video>
    </div>
    <h1>{{ $id }}</h1>
    <span id="myid"> </span>
    <button id="endCall" style="display: none;" onclick="endCurrentCall()">End Call </button>
    <canvas id="canvas-sc" width="640" height="480"></canvas>
    <button id="takeSc" onclick="snap()">snapshot</button>
    <div id="list">
        <ul id="users">

        </ul>
    </div>
</body>
<script src="{{ asset('js/main.cba69814a806ecc7945a.js') }}"></script>
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
<script src="{{ asset('js/video-call.js') }}"></script>

</html>