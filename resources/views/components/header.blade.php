<head>
  <meta charset="utf-8">
  <html lang="en">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Language" content="en">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>{{ $pagetitle }} | Teledermatology</title>
  <meta name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
  <meta name="description" content="T">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{asset('css/main.cba69814a806ecc7945a.css')}}" rel="stylesheet">
  <link href="{{asset('css/custom.css')}}" rel="stylesheet">
  <link rel="shortcut icon" type="image/png" href="{{asset('images/t-logo.png')}}" />
  <script>
    window.csrfToken = "{{ csrf_token() }}";
  </script>
  @if ($pagename == 'get-doctor-live-interactive-view')
  <script>
    var submission_id = "{{ $data['liveSubmissionId'] }}"
  </script>
  @endif
  @if ($pagename == 'get-doctor-live-interactive-view' || $pagename == 'puskesmas.main-live-interactive')
  <link rel="stylesheet" href="{{ asset('css/video-call.css') }}">
  <script>
    window.csrfToken = "{{ csrf_token() }}";
    var user_id = "{{ Session::get('name') }}";
  </script>
  @endif
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,900&display=swap" rel="stylesheet">
  @if ($pagename == 'login')
  <script src='https://www.google.com/recaptcha/api.js?onload=reCaptchaCallback' async defer></script>
  @endif
</head>