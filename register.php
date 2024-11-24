<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Komik Makmur | Registrasi</title>
  <!-- Responsive Design -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme Style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
</head>

<body class="hold-transition login-page">
  <div class="container">
    <div class="row">
      <div class="login-container col-lg-4 col-md-6 col-sm-8 col-xs-12">
        <div class="login-title text-center">
          <h2><span>Komik<strong> Makmur</strong></span></h2>
        </div>
        <div class="login-content">
          <div class="login-header">
            <h3><strong>Selamat Datang!</strong></h3>
            <h5><strong>Silahkan isi form untuk registrasi</strong></h5>
          </div>
          <div class="login-body">
            <form role="form" action="register_process.php" method="post" class="login-form">
              <!-- Nama Lengkap -->
              <div class="form-group">
                <div class="pos-r">
                  <input id="form-nama" type="text" name="nama" placeholder="Nama Lengkap..." class="form-control"
                    required>
                  <i class="fa fa-user"></i>
                  <span></span>
                </div>
              </div>
              <!-- Alamat -->
              <div class="form-group">
                <div class="pos-r">
                  <input id="form-alamat" type="text" name="alamat" placeholder="Alamat..." class="form-control"
                    required>
                  <i class="fa fa-map-marker"></i>
                  <span></span>
                </div>
              </div>
              <!-- No Handphone -->
              <div class="form-group">
                <div class="pos-r">
                  <input id="form-telepon" type="text" name="telepon" placeholder="No Handphone..." class="form-control"
                    required>
                  <i class="fa fa-phone"></i>
                  <span></span>
                </div>
              </div>
              <!-- Status (Admin/Pegawai) -->
              <div class="form-group">
                <div class="pos-r">
                  <select id="form-status" name="status" class="form-control" required>
                    <option value="" disabled selected>Pilih Status...</option>
                    <option value="admin">Admin</option>
                    <option value="pegawai">Pegawai</option>
                  </select>
                  <i class="fa fa-user-tag"></i>
                  <span></span>
                </div>
              </div>
              <!-- Username -->
              <div class="form-group">
                <div class="pos-r">
                  <input id="form-username" type="text" name="username" placeholder="Username..." class="form-control"
                    required>
                  <i class="fa fa-user-circle"></i>
                  <span></span>
                </div>
              </div>
              <!-- Password -->
              <div class="form-group">
                <div class="pos-r">
                  <input id="form-password" type="password" name="password" placeholder="Password..."
                    class="form-control" required>
                  <i class="fa fa-lock"></i>
                  <span></span>
                </div>
              </div>
              <!-- Level (Admin/Pegawai) -->
              <div class="form-group">
                <div class="pos-r">
                  <select id="form-level" name="level" class="form-control" required>
                    <option value="" disabled selected>Pilih Level...</option>
                    <option value="admin">Admin</option>
                    <option value="pegawai">Pegawai</option>
                  </select>
                  <i class="fa fa-layer-group"></i>
                  <span></span>
                </div>
              </div><br>

              <!-- Tombol Registrasi -->
              <div class="form-group">
                <button type="submit" class="btn btn-success form-control"><strong>Registrasi</strong></button>
              </div>

              <!-- Kembali ke Login -->
              <div class="form-group text-center">
                <small>
                  Sudah punya akun?
                  <a href="login.php" class="text-warning"><strong>Login di sini</strong></a>
                </small>
              </div>
            </form>
          </div> <!-- end login-body -->
        </div><!-- end login-content -->
      </div> <!-- end login-container -->
    </div>
  </div>
</body>

</html>

<style>
  /* Gunakan CSS yang sama dengan halaman login untuk keseragaman */
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
</style>