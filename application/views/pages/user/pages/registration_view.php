        <div class="row breadcrumb user-breadcrumb">
            <ul>
                <li><a href="<?php echo base_url("User"); ?>">Início</a></li>
                <li><i class="fa fa-angle-right breadcrumb-icon-space"></i> Minha matricula.</li>
            </ul>
        </div>
        <br>

        <div class="row user-panel">
            <div class="col-md-4 col-lg-3"></div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
                <div class="row btn-group gallery-year" role="group">
                    <button type="button" class="btn btn-primary" onclick="printDiv('user-registration');"><i class="fa fa-print"></i> Imprimir</button>
                    <button type="button" class="btn btn-info" onclick="savePDF('user-registration', this, 1.3, 1.7, 1);"><i class="fa fa-file-pdf-o"></i> Salvar PDF</button>
                </div>
                <div id="user-registration">
                     <form id="user-registration-form">
                        <h3>Dados da matricula escolar</h3>
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Número da Matrícula</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" value="# <?php echo $this->session->userdata('id'); ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Data da Matrícula</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" value="<?php echo $this->session->userdata('date_entry'); ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nome Completo</label>
    					    <div class="col-sm-5">
    					      <input type="text" class="form-control" value="<?php echo $this->session->userdata('name'); ?>" disabled>
    					    </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Data de Nascimento</label>
    					    <div class="col-sm-5">
    					      <input type="text" class="form-control" value="<?php echo $this->session->userdata('date_birth'); ?>" disabled>
    					    </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Sexo</label>
                            <div class="col-sm-5">
                              <input class="form-control" value="<?php echo $this->session->userdata('sex') == "M" ? "Masculino" : "Femenino"; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" value="<?php echo $this->session->userdata('email'); ?>">
                            </div>
                        </div>
                        <?php
                        if($this->session->userdata('access_level') == 0)
                        {
                        ?>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Turno</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" value="<?php echo $this->session->userdata('shift') == "M" ? "Manhã" : $this->session->userdata('shift') == "T" ? "Tarde" : "Noite"; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Série</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" value="<?php echo $this->session->userdata('serie_school'); ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nome do Responsável</label>
    					    <div class="col-sm-5">
    					      <input type="text" class="form-control" value="<?php echo $this->session->userdata('responsible'); ?>" disabled>
    					    </div>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Telefone</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" value="<?php echo $this->session->userdata('fone'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Telefone Fixo</label>
    					    <div class="col-sm-5">
    					      <input type="text" class="form-control" value="<?php echo $this->session->userdata('fone_fix'); ?>">
    					    </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Endereço</label>
    					    <div class="col-sm-5">
    					      <input type="text" class="form-control" value="<?php echo $this->session->userdata('address'); ?>">
    					    </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Ativo</label>
    					    <div class="col-sm-5">
    					      <input type="text" class="form-control" value="<?php echo $this->session->userdata('active') ? "SIM" : "NÃO"; ?>" disabled>
    					    </div>
                        </div>
                        <button type="button" class="btn btn-default" onclick="saveUserRegistration();"><i class="fa fa-refresh"></i> Atualizar</button>
                    </form>
                </div>
                <br><br><br>



                <!-- save for admin page
<form name="f-cliente" id="f-cliente" method="post" action="">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Número da Matrícula</label>
                        <div class="col-sm-5">
                          <input type="email" class="form-control" id="name" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Data da Matrícula</label>
                        <div class="col-sm-5">
                          <input type="email" class="form-control" id="name" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nome Completo:</label>
                        <div class="col-sm-5">
                          <input type="email" class="form-control" id="name" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Data de Nascimento</label>
                        <div class="col-sm-5">
                          <input type="email" class="form-control" id="name" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Sexo</label>
                        <div class="col-sm-5">
                             <select class="form-control">
                                <option value="">Selecione o sexo</option>
                                <option value="29">Femenino</option>
                                <option value="31">Masculino</option>
                             </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-5">
                          <input type="email" class="form-control" id="name" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Turno</label>
                        <div class="col-sm-5">
                             <select class="form-control">
                                <option value="">Selecione um turno</option>
                                <option value="29">Manhã</option>
                                <option value="31">Noite</option>
                                <option value="30">Tarde</option>
                             </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Serie</label>
                        <div class="col-sm-5">
                             <select class="form-control">
                                <option value="">Selecione uma serie</option>
                                <option value="29">1</option>
                                <option value="31">2</option>
                                <option value="30">3</option>
                             </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nome do Responsável</label>
                        <div class="col-sm-5">
                          <input type="email" class="form-control" id="name" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Telefone Fixo</label>
                        <div class="col-sm-5">
                          <input type="email" class="form-control" id="name" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Endereço</label>
                        <div class="col-sm-5">
                          <input type="email" class="form-control" id="name" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Ativo</label>
                        <div class="col-sm-5">
                          <input type="email" class="form-control" id="name" placeholder="">
                        </div>
                    </div>
                    <button class="btn btn-default"><i class="fa fa-refresh"></i> Atualizar</button>
                </form>
                -->