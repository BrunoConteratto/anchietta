<div class="login-bg">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <div class="login-wrapper">
                <div class="row login-logo">
                    <a href="<?php echo base_url(); ?>"><img class="logo" src="<?php echo base_url("assets/images/logo_blank.png"); ?>"></a>
                </div>
                <?php
                    if($this->session->message)
                    {
                        for ($i = 1; $i <= sizeof($this->session->message); $i++) { 
                ?>
                        <div class="alert alert<?php echo $i; ?> alert-<?php echo $this->session->message[$i]['type']; ?>" role="alert">
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
                    <div class="content-wrap">
<!--<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">-->
                    <form action="<?php echo base_url("User/User/login"); ?>" method="post">
                        <h6>Portal do Anuno e Professor</h6>
                        <div class="form-group left-inner-addon">
                            <i class="fa fa-user"></i>
                            <input type="text" class="form-control" name="email" placeholder="Usuário">
                        </div>
                        <div class="form-group left-inner-addon">
                            <i class="fa fa-key"></i>
                            <input type="password" class="form-control" name="password" placeholder="Senha">
                        </div>
                        <div class="action">
                            <button type="button" class="btn btn-Dark" onclick="location.href=baseUrl;"><i class="fa fa-home"></i> Voltar</button>
                            <button class="btn btn-primary signup" type="submit"><i class="fa fa-sign-in"></i> Entrar</button>
                        </div> 
                    </form>
                </div>

                <div class="already">
                    <p>Não possui uma conta?</p>
                    <a href="<?php echo base_url(); ?>">Ativar Usuário</a>
                    <br>
                    <p>Esqueçeu sua senha?</p>
                    <a href="<?php echo base_url(); ?>">Relembrar-me</a>
                </div>
            </div>
        </div>
    </div>
</div>