<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url("assets/images/faveicon.ico"); ?>" type="image/ico" sizes="16x16">
    <title class="notranslate">Administração Anchietta</title>

    <link href="<?php echo base_url("css/admin/bootstrap.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("css/fontawesome-all.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/admin/styles.css'.'?version='.uniqid()); ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo base_url("js/jquery.js"); ?>"></script>
    <script src="<?php echo base_url("js/admin/bootstrap.js"); ?>"></script>
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <div class="logo">
	                 <h1><a href="<?php echo base_url("admin/Login"); ?>">Administração Anchietta</a></h1>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
							<?php
							    if($this->session->message)
							    {
							        for ($i = 1; $i <= sizeof($this->session->message); $i++) { 
							?>
							        <div class="alert alert<?php echo $i; ?> alert-<?php echo $this->session->message[$i]['type']; ?> alert-dismissable fade in" role="alert">
							          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
							          </button>
							          <strong><?php echo $this->session->message[$i]['title']; ?></strong> <?php echo $this->session->message[$i]['message']; ?>
							        </div>
							            <script type="text/javascript">
							                <?php
							                    if($this->session->message[$i]['timeClose'] > 0)
							                    {
							                ?>
							                      fadeOutItem('.alert<?php echo $i; ?>', <?php echo $this->session->message[$i]['timeClose']; ?>);
							                <?php
							                    }
							                ?>
							            </script>
							<?php
							        }
							    }
							    $this->session->message = null;
							?>
			            	<form action="<?php echo base_url("admin/user/login"); ?>" method="post">
				                <h6>Logar-se</h6>
				                <div class="social">
		                            <a class="face_login" href="<?php echo base_url("admin/user/loginFacebook"); ?>">
		                                <span class="face_icon">
		                                    <img src="<?php echo base_url("assets/images/facebook_logo.png"); ?>" alt="fb">
		                                </span>
		                                <span class="text">Logar-se com Facebook</span>
		                            </a>
		                            <div class="division">
		                                <hr class="left">
		                                <span>or</span>
		                                <hr class="right">
		                            </div>
		                        </div>
				                <input class="form-control" type="text" name="email" placeholder="Endereço de e-mail">
				                <input class="form-control" type="password" name="password" placeholder="Senha ****">
				                <div class="action">
				                    <button class="btn btn-primary signup" type="submit">Entrar</button>
				                </div> 
			                </form>
			            </div>
			        </div>

			        <div class="already">
			            <p>Esqueçeu sua senha de administrador?</p>
			            <a href="#">Relembrar-me</a>
			            <br>
			            <p>Voltar para</p>
			            <a href="<?php echo base_url(); ?>">Website</a>
			        </div>
			    </div>
			</div>
		</div>
	</div>
  </body>
</html>