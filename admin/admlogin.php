<?php
$con=mysqli_connect('localhost','root','','db_pemira');
session_start();
extract($_POST);


if(isset($login)){
  $query = "select id_admin from admin where username_admin='$user' and password_admin='$pass'";
	if(mysqli_num_rows(mysqli_query($con,$query)))
    {
        $tipe=mysqli_fetch_row(mysqli_query($con,$query));
		    $_SESSION['kosong']=$tipe[0];
        header("location:./");
	}
	else
        $ps="
            <div class='alert alert-danger alert-dismissable' style='margin-top:20px'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='icon glyphicon glyphicon-remove'></i></button>
               Wrong username or password
            </div>
        ";
         echo $ps;

}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
          <a href="#"><b>Login Administrator</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="user" />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="pass" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <input type="submit" class="btn btn-primary btn-block btn-flat pull-right" value="Login" name="login"/>
            </div><!-- /.col -->
          </div>
        </form>

        <a href="lupa.php">Forget Password</a><br>

      </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../assets/js/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>
