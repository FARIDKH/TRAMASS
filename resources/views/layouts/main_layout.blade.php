<!DOCTYPE html>

<html>

      <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
          <title>TRAMASS</title>
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="csrf_token" content="{{ csrf_token() }}" />
          <link rel="apple-touch-icon" href="apple-touch-icon.png">
          <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
          <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:700|Roboto:900" rel="stylesheet">
  <!--        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>-->
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
          <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
          <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
          <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
          <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
          <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
          <style>
              html,body{
                  font-family: "Montserrat", sans-serif;
              }
          </style>
      </head>
    <body>
     


       @yield('content')

       <!-- footer start -->

        <section id="footer">
          <div class="row">
              <a href="" class="fa fa-facebook" aria-hidden="true"></a>
              <a href="" class="fa fa-pinterest" aria-hidden="true"></a>
              <a href="" class="fa fa-twitter" aria-hidden="true"></a>
              <a href="" class="fa fa-instagram" aria-hidden="true"></a>
              <a href="" class="fa fa-youtube" aria-hidden="true"></a>
          </div>
          <span>
              <i class="fa fa-copyright" aria-hidden="true"></i>
              Copyright
          </span>
        </section>

        <!-- footer ending -->

<!--        <script src="/ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
        <script src="/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="/js/vendor/bootstrap.min.js"></script>
<!--        <script src="/ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
        <script src="/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="/js/vendor/bootstrap.min.js"></script>
        <script src="/js/navbar.js"></script>
        <script src="/js/navbarDetails.js"></script>
        <script src="/js/animate.js"></script>
<!--        <script src="/js/main.js"></script>-->

        <script>
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        </script>

        @yield('script')

    </body>
</html>
