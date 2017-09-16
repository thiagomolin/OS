<!DOCTYPE html>


<?php 
require_once('../php/session.php');
require_once('../php/phpscript.php');

?>


<html>
    <head>
        <title>OS</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>   
        <br/>

        <?php if(isset($_GET['assumida'])) : ?>
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sucesso!</strong> OS assumida com sucesso.
            </div>
        <?php endif; ?> 

        <?php if(isset($_GET['finalizada'])) : ?>
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sucesso!</strong> OS finalizada com sucesso.
            </div>
        <?php endif; ?> 

        

        <br/>
        <span class="pull-right">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Bem vindo <?php echo $usuario['nm_usuario']; ?>
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="index.php">Tela principal</a></li>
                    <li class="divider"></li>
                    <li><a href="../php/logout.php">Sair</a></li>
                </ul>
            </div>
        </span>
        <br/><br/>
        <div >

            <div class="TelaOS">
                <form action="adicionar.php" method="GET">                    
                    <button type="submit" class="btn btn-primary" style="float: left;">+ Adicionar Servico</button>
                </form>
                
        <br/><br/>
        <br/><br/>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 7%;">
                                <form method="GET" action="index.php">
                                    <button class="btn btn-primary btn-xs dropdown-toggle" type="submit">Limpar filtros</button>
                                </form>
                            </th>
                            <th style="width: 17%;">                                
                            </th>
                            <th style="width: 8%;">
                                <div class="dropdown">
                                <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Filtro
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <?php foreach($usuarios as $usu) : ?>
                                        <li><a href="index.php?filtrousuario=<?php echo $usu['id']; ?>"><?php echo $usu['nm_usuario']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                                </div>                            
                            </th>
                            <th style="width: 10%;">
                                <div class="dropdown">
                                <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Filtro
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <?php foreach($aplicacoes as $aplicacao) : ?>
                                        <li><a href="index.php?filtroaplicacao=<?php echo $aplicacao['id']; ?>"><?php echo $aplicacao['nm_aplicacao']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                                </div>
                            </th>
                            <th style="width: 10%;">
                                <div class="dropdown">
                                <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Filtro
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <?php foreach($tiposDeServico as $tipoDeServico) : ?>
                                        <li><a href="index.php?filtrotiposervico=<?php echo $tipoDeServico['id']; ?>"><?php echo $tipoDeServico['ds_tipo_servico']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                                </div>                            
                            </th>
                            <th style="width: 8%;">
                                <div class="dropdown">
                                <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Filtro
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <?php foreach($prioridades as $prioridade) : ?>
                                        <li><a href="index.php?filtroprioridade=<?php echo $prioridade['id']; ?>"><?php echo $prioridade['ds_prioridade']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                                </div>
                            </th>
                            <th style="width: 10%;">
                                <div class="dropdown">
                                <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Filtro
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <?php foreach($status as $st) : ?>
                                        <li><a href="index.php?filtrostatus=<?php echo $st['id']; ?>"><?php echo $st['ds_status']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                                </div>
                            </th>
                            <th style="width: 10%;"></th>
                            <th style="width: 10%;"></th>
                            <th style="width: 10%;"></th>   
                        </tr>

                        <tr>
                            <th style="width: 7%;">Ass/Conc</th>
                            <th style="width: 17%;">Serviço</th>
                            <th style="width: 8%;">Usuário</th>
                            <th style="width: 10%;">Aplicação</th>
                            <th style="width: 10%;">Tipo Serv.</th>
                            <th style="width: 8%;">Prioridade</th>
                            <th style="width: 10%;">Status</th>
                            <th style="width: 10%;">Criação</th>
                            <th style="width: 10%;">Inicio ativ.</th>
                            <th style="width: 10%;">Fim ativ.</th>   
                        </tr>
                    </thead>

                    <tbody>   
                        <?php foreach ($OSs as $OS) : ?>
                            <?php if(isset($_GET['filtroaplicacao']) && ($_GET['filtroaplicacao'] != $OS['fk_aplicacao'])) : ?>
                                <?php continue; ?>
                            <?php endif; ?>

                            <?php if(isset($_GET['filtrotiposervico']) && ($_GET['filtrotiposervico'] != $OS['fk_tipo_servico'])) : ?>
                                <?php continue; ?>
                            <?php endif; ?>

                            <?php if(isset($_GET['filtrousuario']) && ($_GET['filtrousuario'] != $OS['fk_usuario'])) : ?>
                                <?php continue; ?>
                            <?php endif; ?>

                            <?php if(isset($_GET['filtroprioridade']) && ($_GET['filtroprioridade'] != $OS['fk_prioridade'])) : ?>
                                <?php continue; ?>
                            <?php endif; ?>

                            <?php if(isset($_GET['filtrostatus']) && ($_GET['filtrostatus'] != $OS['fk_status'])) : ?>
                                <?php continue; ?>
                            <?php endif; ?>


                            <tr>
                                <td style="width: 7%;">                                        
                                    <?php if($OS['fk_status'] == 1) : ?>                                            
                                        <form method="POST" action="../php/assumirOS.php">    
                                            <input type="hidden" name="id" value="<?php echo $OS['id']; ?>">
                                            <input type="hidden" name="id_usuario" value="<?php echo $usuario['id']; ?>">
                                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-wrench"></span></button>
                                        </form>
                                    <?php elseif(($OS['fk_status'] == 2) && ($OS['fk_usuario'] == $usuario['id'])) : ?>
                                        <form method="POST" action="../php/finalizarOS.php">    
                                            <input type="hidden" name="id" value="<?php echo $OS['id']; ?>">
                                            <button type="submit" class="btn btn-primary"><span class="	glyphicon glyphicon-ok"></span></button>
                                        </form>
                                    <?php elseif(($OS['fk_status'] == 3)) : ?>
                                        <span class="	glyphicon glyphicon-ok"></span>
                                    <?php endif; ?>
                                </td>
                                <td style="width: 17%;"><?php echo $OS['ds_servico']; ?></td>                  
                                <td style="width: 8%;"><?php echo $OS['nm_usuario']; ?></td>                               
                                <td style="width: 10%;"><?php echo $OS['nm_aplicacao']; ?></td>
                                <td style="width: 10%;"><?php echo $OS['ds_tipo_servico']; ?></td>
                                <td style="width: 8%;"><?php echo $OS['ds_prioridade']; ?></td>
                                <td style="width: 10%;"><?php echo $OS['ds_status']; ?></td>
                                <td style="width: 10%;"><?php echo $OS['dt_registro']; ?></td>
                                <td style="width: 10%;"><?php echo $OS['dt_assumida']; ?></td>
                                <td style="width: 10%;"><?php echo $OS['dt_conclusao']; ?></td>                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <footer>
            <h4>Criado por: Thiago Molin, em: 21/03/2017</h4>
            <h4>Editado por: Thiago Molin e Allan em: 15/09/2017</h4>
        </footer>

    </body>   





</html>
