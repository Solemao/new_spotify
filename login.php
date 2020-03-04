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
<title>Spotify - Login</title>
<link rel="icon" href="imagens/favicon.png">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="estilo.css" rel="stylesheet">
</head>
<body>
<h1>Logue Para Viver Esta Emoção</h1>
<form class="form" action="login.php" method="POST">
			<p>
				<label for="Email">E-mail:</label>
				<input type="email" name="Email" id="email">
				<br>
				<label for="Password">Senha:</label>
				<input type="password" name="Password" id="password">
			</p>
			<p>
			  <input type="submit" name="button" id="button" value="Cadastrar" class="btn btn-primary">
			</p>
</form>
<?php
if(empty($_POST['Email'])|| empty($_POST['Password'])) {
	print("Preencha os Campos");
	exit();
}

$Email = mysqli_real_escape_string($conn, $_POST['Email']);
$Password = mysqli_real_escape_string($conn, $_POST['Password']);

$query = "select*from users where Email = '{$Email}' and Password = '{$Password}'";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['Email'] = $Email;
	header('Location: home.php');
	exit();
}else {
	$_SESSION['nao_autenticado'] = true;
	print("Usuário ou Senha Incorretos");
	exit();
}
?> 