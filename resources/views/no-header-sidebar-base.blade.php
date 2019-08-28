<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
{!! NoCaptcha::renderJs() !!}
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
      if (!this.validateLogin()) return
      $.ajax({
          type: "POST",
          url: '{{ route("auth.login") }}',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          data: {
              username: $('#username').val(),
              password: $('#password').val()
          },
          success: (data) => {
            console.log(data)
            $('#username,#password').removeClass('is-invalid')
            $('#username,#password').removeAttr('aria-describedby aria-invalid')
            $('.login-message').hide()
            if (data.hasOwnProperty('msg')){
              $('.login-message').show()
              if (data.msg === "user not found"){
                $('.login-message').text("User Tidak Ditemukan")
              }
              else if (data.msg === "wrong password"){
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
    function validateLogin() {
      if ($('#username').val() === ""){
        $('#username').addClass('is-invalid')
        $('#username').attr('aria-describedby', 'firstname-error')
        $('#username').attr('aria-invalid', 'true')
        $('#username-error').show()
        return false
      }
      if ($('#password').val() === ""){
        $('#password').addClass('is-invalid')
        $('#password').attr('aria-describedby', 'firstname-error')
        $('#password').attr('aria-invalid', 'true')
        $('#password-error').show()
        return false
      }
      return true
    }
  </script>
  @endif
</body>

</html>