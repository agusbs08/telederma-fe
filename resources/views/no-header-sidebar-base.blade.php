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
  <script>
    function login() {
      $.ajax({
          type: "POST",
          url: '{{route("auth.login")}}',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          data: {
              username: $('#username').val(),
              password: $('#password').val()
          },
          success: (data) => {
            console.log(data)
            if (data.hasOwnProperty('msg')){
              $('.login-message').show()
              if (data.msg === "user not found"){
                console.log("User Tidak Ditemukan")
                $('.login-message').text("User Tidak Ditemukan")
              }
              else if (data.msg === "wrong password"){
                console.log("Password Salah")
                $('.login-message').text("Password Salah")
              }
            } else {
              window.location = data;
            }
          },
          error: (error) => {
            console.log(error)
          }
      });
    }
  </script>
  @endif
</body>

</html>