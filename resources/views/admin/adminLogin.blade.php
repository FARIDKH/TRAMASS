<head>
  <meta charset="utf-8">
  <meta>
  <title>|</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/app.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
          <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<section id="signin">
        <div  class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <h2>Sign in</h2>
                    <p>Please enter your username and password</p>
                    <form role="form" method="POST" action="">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            <!--                            <label for="inputEmail1">Username or Email</label>-->
<!--                            <input type="email" class="form-control" id="inputEmail1" placeholder="">-->
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
<!--
                            <label for="inputPassword1">Password</label>
                            <input type="password" class="form-control" id="inputPassword1" placeholder="">

-->
                           <label for="password" class="col-md-4 control-label">Password</label>
                           <input id="password" type="password" class="form-control" name="password">
                               @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <a href="{{ url('/password/reset') }}">Forgot Password?</a><br>
                        <input type="submit" value="SIGN IN" class="btn btn-success btn-lg text-center col-md-12 btn-2">

<!--                        <p class="text-center">OR</p>-->

                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>