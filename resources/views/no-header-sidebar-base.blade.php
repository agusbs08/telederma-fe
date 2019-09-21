<!doctype html>
@include('components.header')

<body>
  <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    @yield('login-page')
  </div>
  <script type="text/javascript" src="{{asset('js/main.cba69814a806ecc7945a.js')}}"></script>
  @if ($pagename == 'login')
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script>
    function reCaptchaCallback() {
      $('#login-button').removeAttr('disabled')
    }
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
            $('#username,#password').removeClass('is-invalid')
            $('#username,#password').removeAttr('aria-describedby aria-invalid')
            $('.login-message').hide()
            if (data.hasOwnProperty('msg')){
              $('.login-message').show().text(data.msg)
            } else {
              if (grecaptcha.getResponse() == "")
                $('.login-message').show().text("Captcha harus diisi!");
              else
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