<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "change";
	
//Criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
?>
<html lang="pt-br">
<head>
<title>Spotify - Cadastro</title>
<link rel="icon" href="imagens/favicon.png">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="estilo.css" rel="stylesheet">
</head>
<body>
<h1>Cadastre-se Para Viver Esta Emoção</h1>
<form class="form" action="cadastro.php" method="POST">
			<p>
				<label for="Name">Nome:</label>
				<input type="text" name="Name" id="name">
				<br>
				<label for="Email">E-mail:</label>
				<input type="email" name="Email" id="email">
				<br>
				<label for="Password">Senha:</label>
				<input type="password" name="Password" id="password">
				<br>
				<label for="Conf_senha">Confirme a Senha:</label>
				<input type="password" name="Conf_senha" id="conf_senha">
          </p>
			<p>
			  <input type="submit" name="button" id="button" value="Cadastrar" class="btn btn-primary">
			</p>
</form>
<?php
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Password = $_POST['Password'];
$Conf_senha = $_GET['Conf_senha'];
if($Password == $Conf_senha){
	$result_cadastro = "INSERT INTO users(Name, Email, Password) VALUES ('$Name', '$Email', '$Password')";
	$resultado_cadastro= mysqli_query($conn, $result_cadastro);
	header('Location: home.php');
}else{
	print("As senhas não batem");
}
	
?>

</body>