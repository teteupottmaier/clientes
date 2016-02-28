<?php  
$id = $_GET['id'];
try {
          $conexao = new \PDO('mysql:host=localhost;dbname=clientes', 'root', 'admin');
    } catch (Exception $e) {
          echo $e->getMessage();  
      }
        require_once 'cliente.php';

        
        $cliente = new Cliente($conexao);

        $cliente->setId($id);

        $cli = $cliente->getCliente();


        
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>CRUD com Bootstrap 3</title>

 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
</head>
<body>

 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
   <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
     <span class="sr-only">Toggle navigation</span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Web Dev Academy</a>
   </div>
   <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
     <li><a href="#">In&iacute;cio</a></li>
     <li><a href="#">Op&ccedil;&otilde;es</a></li>
     <li><a href="#">Perfil</a></li>
     <li><a href="#">Ajuda</a></li>
    </ul>
   </div>
  </div>
 </nav>
 
 <div id="main" class="container-fluid">

  <h3 class="page-header">Editar Item</h3>
  
  <form action="#" method="post">
  <?php

 if (!empty($_POST['id'])) {

  $cliente->setId($_POST['id']);
  $cliente->setNome($_POST['nome']);
  $cliente->setEmail($_POST['email']); 
  $cliente->alterar();
  echo "<script>location.href='index.php';</script>"; 

 }
  ?>

  	<div class="row">
  	  <div class="form-group col-md-4">
  	  	<label for="exampleInputEmail1">Id</label>
  	  	<input type="text" name="id" class="form-control" disabled="true" id="exampleInputIdEmail1" placeholder="Digite o valor" value="<?=$cli['id']?>">
  	  </div>
	  <div class="form-group col-md-4">
  	  	<label for="exampleInputEmail1">Nome</label>
  	  	<input type="text" name="nome" class="form-control" id="exampleInputEmail1" placeholder="Digite o valor" value="<?=$cli['nome']?>">
  	  </div>
	  <div class="form-group col-md-4">
  	  	<label for="exampleInputEmail1">Email</label>
  	  	<input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o valor" value="<?=$cli['email']?>">
  	  </div>
      <input type="hidden" name="id" value = "<?=$cli['id']?>">
	</div>
	
	</div>
	
	<hr />
	
	<div class="row">
	  <div class="col-md-12">
	  	<button type="submit" class="btn btn-primary">Atualizar</button>
		<a href="template.html" class="btn btn-default">Cancelar</a>
    
	  </div>
	</div>

  </form>
 </div>
 

 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
</body>
</html>