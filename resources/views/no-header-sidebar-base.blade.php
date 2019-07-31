<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
@include('components.header')

<body>
  <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    @yield('login-page')
  </div>
  <script type="text/javascript" src="{{asset('js/main.cba69814a806ecc7945a.js')}}"></script>
  @if ($pagename == 'login')
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="{{asset('js/login.js')}}"></script>
  <script>
    function login() {
      $.ajax({
          type: "POST",
          url: '{{route("auth.login")}}',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
              username: $('#username').val(),
              password: $('#password').val()
          },
          success: () => {
              console.log("sukses");
          },
          error: () => {
            console.log("bgsd");
          }
      });
    }
  </script>
  <script>
    $.ajaxSetup({
      headers : {
        'csrftoken' : '{{ csrf_token() }}'
      }
    });
  </script>
  @endif
</body>

</html>