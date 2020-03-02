<?php
	session_start();
	if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }

	include ("../conexao.php");
	


 $id=$_GET['id'];

 $findAll="SELECT * FROM usuarios where id='$id'";

  $query=mysqli_query($con, $findAll);

  $rows=mysqli_num_rows($query);

  if($rows>0){

  	foreach($query as $usuarios){


  		$nome=$usuarios['nome'];
      $email=$usuarios['email'];
      $telefone=$usuarios['telefone'];
  		$usuario=$usuarios['usuario'];
  		$senha=$usuarios['senha'];
  		$id=$usuarios['id'];
  		$status=$usuarios['status'];
      $permissao=$usuarios['permissao'];

      switch ($permissao){

        case "1":

        $permissao="Administrador";
        $permnum="1";
        break;

        case "0":

        $permissao="Editor";
        $permnum="0";
        break;
      }

      switch ($status){

        case "1":

        $status="Ativo";
        $statusnum="1";
        break;

        case "0":

        $status="Inativo";
        $statusnum="0";
        break;
      }

      	
  }
}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<script type="text/javascript">
		
		function voltar(){
			setTimeout("window.location='usuarios.php'",2000);
		}
	</script>
	<title>Usuários</title>
</head>
<body>
	<div id="interface">

	<a href="usuarios.php">Voltar</a>
	<h1>Alterar Usuário</h1>

	<form method="post" action="processa_alteracao.php">
    <input type="hidden" name="id" value="<?php echo $id;?>">
      <fieldset><legend>Novo Usuário</legend>
    Nome:
    <input type="text" name="nome" placeholder="Nome" title="Nome e Sobrenome" size="34" value="<?php echo $nome?>" ><br><br>
     E-mail:
    <input type="mail" name="email"  title="Email" size="34" value="<?php echo $email?>" readOnly><br><br>
     Telefone:
    <input type="text" name="fone"  title="Telefone" size="34" value="<?php echo $telefone?>" ><br><br>
    Usuário:
    <input type="text" title="Usuario que fará login" name="usuario" size="32" value="<?php echo $usuario?>" readOnly><br><br>
    
    </fieldset>
    <fieldset>
      
      Status: <select name="status" value="">
        <option value='<?php echo $statusnum;?>'><?php echo $status;?></option>
        <option value='1'>Ativo</option>
        <option value='0'>Inativo</option>
      </select>
    </fieldset>
     <fieldset>
      
      Permissão: <select name="permissao" value="">
        <option value='<?php echo $permnum;?>'><?php echo $permissao;?></option>
        <option value='1'>Administrador</option>
        <option value='0'>Editor</option>
      </select>
    </fieldset>

    <input type="submit" name="" Value="Alterar" id="btn">

  

  </form>
</div>
</body>
</html>