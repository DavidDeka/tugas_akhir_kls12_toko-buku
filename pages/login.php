<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition login-page">
  <div class="container ">
    <div class="row">
      <div class="login-container col-lg-4 col-md-6 col-sm-8 col-xs-12">
        <div class="login-title text-center">
          <h2><span>Komik<strong> Makmur</strong></span></h2>
        </div>
        <div class="login-content">
          <div class="login-header ">
            <h3><strong>Haloo!!</strong></h3>
            <h5><strong>Silahkan login terlebih dahulu</strong></h5>
          </div>
          <div class="login-body">
            <form role="form" action="login_process.php" method="post" class="login-form">
              <div class="form-group ">
                <div class="pos-r">
                  <input id="form-username" type="text" name="username" placeholder="Username..."
                    class="form-username form-control">
                  <i class="fa fa-user"></i>
                  <span></span>
                </div>
              </div>
              <div class="form-group">
                <div class="pos-r">
                  <input id="form-password" type="password" name="password" placeholder="Password..."
                    class="form-password form-control">
                  <i class="fa fa-lock"></i>
                  <span></span>
                </div>
              </div><br>

              <div class="form-group">
                <button type="submit" class="btn btn-warning form-control"><strong>Sign in</strong></button>
              </div>

            </form>
          </div> <!-- end  login-body -->
        </div><!-- end  login-content -->
      </div> <!-- end  login-container -->

    </div>
  </div><!-- end container -->
  <!-- /.login-box -->
  <!-- jQuery 2.2.3 -->
  <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>

</html>

<style>
  .login-container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .login-container .login-content {
    background: #605ca8;
    -moz-box-shadow: -1px 1px 4px rgba(88, 51, 33, 0.8);
    -webkit-box-shadow: -1px 1px 4px rgba(88, 51, 33, 0.8);
    box-shadow: -1px 1px 4px rgba(88, 51, 33, 0.8);
  }

  .pos-r {
    position: relative;
  }

  .login-container .login-header {
    padding: 10px 30px;
  }

  .login-container,
  .login-container a,
  .login-container input {
    color: #ffffff;
  }

  .login-container .login-title span {
    padding: 10px 20px;
    display: inline-block;
    margin-bottom: 20px;
    text-shadow: -1px 1px 1px rgba(108, 83, 54, 0.3);
  }

  .login-container .login-title span strong {
    color: #5727A3;
  }

  .login-container .login-body {
    padding: 30px 30px;
  }

  .login-container .login-body input.form-control {
    background: #1B0044;
    height: 50px;
    border-radius: 0;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    border: none;
    border-bottom: 2px solid transparent;
    font-size: 16px;
    -o-transition: all .5s;
    -webkit-transition: all .5s;
    transition: all .5s;
  }

  .login-container .login-body input.form-control~span {
    position: absolute;
    bottom: 0;
    display: inline-block;
    height: 2px;
    width: 0;
    background: #a60ced;
    -o-transition: width .3s;
    -webkit-transition: width .3s;
    transition: width .3s;
    left: 50%;
    -webkit-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%);

  }

  .login-container .login-body input.form-control:focus~span {
    width: 100%;
  }

  .login-container .login-body input.form-control+i {
    position: absolute;
    right: 15px;
    top: 15px;
    font-size: 20px;
    color: #5c0cad;
    -o-transition: all .5s;
    -webkit-transition: all .5s;
    transition: all .5s;
  }

  .login-container .login-body input.form-control:focus+i {
    color: #a60ced;
  }

  .login-container .login-body button {
    height: 50px;
    -moz-border-radius: 0px;
    -webkit-border-radius: 0px;
    border-radius: 0px;
    font-size: 20px;
  }

  .login-container .login-footer {
    padding: 20px 0;
  }

  .template h5 a {
    color: #5c0cad;
  }

  @media only screen and (max-width: 600px),
  screen and (max-height: 610px) {

    .login-container {
      padding: 0px;
    }

    .login-container .login-title span {
      padding: 0px;
      margin-bottom: 10px;
    }

    .login-container .login-content {
      background: none;
      -moz-box-shadow: none;
      -webkit-box-shadow: none;
      box-shadow: none;
    }

    .login-header {
      display: none;
    }

    .login-container .login-body {
      padding: 10px 10px;
    }

    .login-container .login-footer {
      padding: 0;
    }
  }

  @media only screen and (max-height: 400px) {
    .login-container {
      position: static;
      transform: none;
      padding: 0;
    }
  }
</style>