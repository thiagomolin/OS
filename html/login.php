<!DOCTYPE html>


<html>
    <head>
        <title>OS Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>    
        <br/>
        <h1>OS Login</h1>
        <br/><br/><br/>

        <form method="POST" action="../php/sessionlogin.php" class="center-block" style="width: 50%;">
            <ul class="list-group">

                <li class="list-group-item">
                    <label for="nm_usuario">Usuario </label>
                    <input class="form-control" type="text" id="nm_usuario" name="nm_usuario" >
                </li>

                <li class="list-group-item">
                    <label for="senha">Senha </label>
                    <input class="form-control" type="password" id="senha" name="senha" >
                </li>

            </ul>     

            <br/>

            <button type="submit" class="btn btn-primary center-block btn-lg">Login</button>
        </form>
       
        <br/><br/><br/>
        
        <br/><br/><br/>
        <br/><br/><br/>
        <footer>
            <h4>Criado por: Thiago Molin, em: 21/03/2017</h4>
            <h4>Editado por: Thiago Molin e Allan em: 15/09/2017</h4>
        </footer>

    </body>   
</html>
