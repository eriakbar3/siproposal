<?php 
session_start();
require_once ('config/connection.php');
require_once ('config/function.php');
$general    = new General_Default;
$boots    = new General_Bootstrap;
if (isset($_SESSION['id_user']) && isset($_SESSION['level']) ) {
  if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin' ) {
    $general->redirect("auth.php");
  }
}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="<?php echo $base_url; ?>/img/chat-search.png">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

</head>

  <body class="login-body">
<div class="container">

      <form class="form-signin" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">

      

        <h2 class="form-signin-heading">sign in now</h2>
        
        <div class="login-wrap">
        <?php 

        if (isset($_POST['submit'])) {
            $username     = $_POST['username'];
            $password     = md5($_POST['password']);

            $sql = $link->prepare("SELECT * FROM user WHERE username = ? AND password = ? ");
            $sql->bindParam(1, $username);
            $sql->bindParam(2, $password);
            if ($sql->execute()) {
                if ($sql->rowCount() == 1) {
                    $data = $sql->fetch(PDO::FETCH_OBJ);
                    $_SESSION['level'] = $data->level;
                    $_SESSION['id_user'] = $data->id_user;
                    $general->redirect("auth.php");
                }else{
                    echo $boots->alert_css("danger","Account not found");
                }
            }

        }


         ?>
            <input type="text" class="form-control" name="username" placeholder="Username" autofocus required>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <label class="checkbox">
                <span>
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" name="submit" type="submit">Sign in</button>
            

        </div>

          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      </form>

    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>


  </body>

</html>
