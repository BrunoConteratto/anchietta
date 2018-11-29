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
    <link href="<?php echo base_url('css/admin/styledefault.css'.'?version='.uniqid()); ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo base_url("js/jquery.js"); ?>"></script>
    <script src="<?php echo base_url("js/admin/bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("js/ajax.js"); ?>"></script>
    <script src="<?php echo base_url('js/admin/effects.js'.'?version='.uniqid()); ?>"></script>
    <script src="<?php echo base_url("js/admin/custom.js"); ?>"></script>
  </head>
  <body>
    <div class="header">
     <div class="container">
        <div class="row">
           <div class="col-md-5">
              <div class="logo">
                 <h1><a href="<?php echo base_url('admin/home'); ?>">Administração Anchietta</a></h1>
              </div>
           </div>
           <div class="col-md-5"></div>
           <div class="col-md-2">
              <div class="navbar navbar-inverse" role="banner">
                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Minha Conta <b class="caret"></b></a>
                        <ul class="dropdown-menu animated fadeInUp">
                          <li><a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Perfil</a></li>
                          <li><a href="<?php echo base_url('admin/user/logout'); ?>"><i class="fa fa-power-off" aria-hidden="true"></i> Deslogar</a></li>
                        </ul>
                      </li>
                    </ul>
                  </nav>
              </div>
           </div>
        </div>
     </div>
    </div>

    <div class="page-content">
        <div class="row">
          <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="<?php echo base_url('admin/home'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <li class="submenu">
                         <a href="#">
                            <i class="fa fa-language" aria-hidden="true"></i> Google
                            <span class="caret pull-right"></span>
                         </a>
                         <ul>
                            <li><a target="_blank" href="https://accounts.google.com/ServiceLogin/signinchooser?service=analytics&passive=1209600&continue=https%3A%2F%2Fanalytics.google.com%2Fanalytics%2Fweb%2F%23&followup=https%3A%2F%2Fanalytics.google.com%2Fanalytics%2Fweb%2F&flowName=GlifWebSignIn&flowEntry=ServiceLogin">Analitycs</a></li>
                            <li><a target="_blank" href="https://accounts.google.com/ServiceLogin/signinchooser?passive=1209600&continue=https%3A%2F%2Fwww.google.com%2Frecaptcha%2Fadmin&followup=https%3A%2F%2Fwww.google.com%2Frecaptcha%2Fadmin&flowName=GlifWebSignIn&flowEntry=ServiceLogin">Recaptcha</a></li>
                            <li><a target="_blank" href="https://accounts.google.com/ServiceLogin/signinchooser?service=sitemaps&passive=1209600&continue=https%3A%2F%2Fwww.google.com%2Fwebmasters%2Ftools%2Fhome&followup=https%3A%2F%2Fwww.google.com%2Fwebmasters%2Ftools%2Fhome&flowName=GlifWebSignIn&flowEntry=ServiceLogin#utm_source=pt-BR-wmxmsg&utm_medium=wmxmsg&utm_campaign=bm&authuser=0">Console</a></li>
                            <li><a target="_blank" href="https://accounts.google.com/ServiceLogin/signinchooser?service=sitemaps&passive=1209600&continue=https%3A%2F%2Fwww.google.com%2Fwebmasters%2Ftools%2Fsubmit-url&followup=https%3A%2F%2Fwww.google.com%2Fwebmasters%2Ftools%2Fsubmit-url&flowName=GlifWebSignIn&flowEntry=ServiceLogin">URL Index</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-cog" aria-hidden="true"></i> Confiurar
                            <span class="caret pull-right"></span>
                         </a>
                         <ul>
                            <li><a href="<?php echo base_url('admin/config/config'); ?>">Portal</a></li>
                            <li><a href="<?php echo base_url('admin/config/Buy'); ?>">Serviços</a></li>                            
                        </ul>
                    </li>
                    <li class="submenu">
                         <a href="#">
                            <i class="fa fa-play-circle-o" aria-hidden="true"></i> Cadastro
                            <span class="caret pull-right"></span>
                         </a>
                         <ul>
                          <li><a href="<?php echo base_url('admin/cine/tv'); ?>">Sala</a></li>
                            <li><a href="<?php echo base_url('admin/cine/alert'); ?>">Turma</a></li>
                            <li><a href="<?php echo base_url('admin/cine/serie'); ?>">Série</a></li>
                            <li><a href="<?php echo base_url('admin/cine/film'); ?>">Disiplina</a></li>
                            <li><a href="<?php echo base_url('admin/cine/novel'); ?>">Funcionario</a></li>
                            <li><a href="<?php echo base_url('admin/cine/anime'); ?>">Professor</a></li>
                            <li><a href="<?php echo base_url('admin/cine/config'); ?>">Aluno</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                         <a href="#">
                            <i class="fa fa-play-circle-o" aria-hidden="true"></i> Comunic@
                            <span class="caret pull-right"></span>
                         </a>
                         <ul>
                            <li><a href="<?php echo base_url('admin/cine/config'); ?>">Eventos</a></li>
                            <li><a href="<?php echo base_url('admin/cine/alert'); ?>">Noticias</a></li>
                            <li><a href="<?php echo base_url('admin/cine/config'); ?>">Galeria</a></li>
                            <li><a href="<?php echo base_url('admin/cine/film'); ?>">MEC</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
          </div>