<!DOCTYPE html>


<?php 
require_once('../php/session.php');
require_once('../php/phpscript.php');

$mostrarFinalizadas = false;
$minhasOs = false;

if(isset($_GET['mostrarfinalizadas'])) {
    $mostrarFinalizadas = true;
} 

if(isset($_GET['minhasos'])) {
    $minhasOs = true;
} 

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
        <br/><br/>
        <div ng-controller="OSController as controller">

            <div class="TelaAdicionar">
                
                <br/><br/>
                <form method="POST" action="../php/novaOS.php">
                    <ul class="list-group">

                        <li class="list-group-item">
                            <label for="ds_servico">Descrição do Serviço </label>
                            <input class="form-control" type="text" id="ds_servico" name="ds_servico" >
                        </li>

                        <li class="list-group-item">
                            <label for="fk_tipo_servico">Tipo do Serviço </label>
                            <select class="form-control" id="fk_tipo_servico" name="fk_tipo_servico">
                                <?php foreach ($tiposDeServico as $tipoDeServico) : ?>
                                    <option value="<?php echo $tipoDeServico['id']; ?>"><?php echo $tipoDeServico['ds_tipo_servico']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </li>

                        <li class="list-group-item">
                            <label for="fk_aplicacao">Aplicação</label>
                            <select class="form-control" id="fk_aplicacao" name="fk_aplicacao">
                                <?php foreach ($aplicacoes as $aplicacao) : ?>
                                    <option value="<?php echo $aplicacao['id']; ?>"><?php echo $aplicacao['nm_aplicacao']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </li>

                        <li class="list-group-item">
                            <label for="fk_prioridade">Prioridade </label>
                            <select class="form-control" id="fk_prioridade" name="fk_prioridade">
                                <?php foreach ($prioridades as $prioridade) : ?>
                                    <option value="<?php echo $prioridade['id']; ?>"><?php echo $prioridade['ds_prioridade']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </li>

                    </ul>                

                    <button type="submit" class="btn btn-primary display-inline">Adicionar</button>
                </form>
                <form action="index.php" method="GET">    
                    <button type="submit" class="btn btn-primary display-inline" >Cancelar</button>
                </form>
            </div>

        </div>
        <footer>
            <h4>Criado por: Thiago Molin, em: 21/03/2017</h4>
            <h4>Editado por: Thiago Molin e Allan em: 15/09/2017</h4>
        </footer>

    </body>   





</html>
