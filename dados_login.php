<?php
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$conn = new mysqli('localhost', 'root', '', 'login'); // servidor, usuário, senha, nome_do_banco

if($conn -> connect_error){
  die("falha ao se conectar ao banco".$conn -> connect_error);
}

// Consulta SQL para verificar se o usuário e senha correspondem a alguma entrada na tabela
$sql = "SELECT usuario,senha,email FROM entrada_de_dados WHERE usuario=? and senha=?;";//
$stmt = mysqli_prepare($conn,$sql);
	if (!$stmt) {
		die("Não foi possível preparar a consulta!");
	}
	if (!mysqli_stmt_bind_param($stmt,"ss",$usuario,$senha)) {
		die("Não foi possível vincular parâmetros!");
	}
	if (!mysqli_stmt_execute($stmt)) {
		die("Não foi possível executar busca no Banco de Dados!");
	}
	if (!mysqli_stmt_bind_result($stmt,$Usuario,$Senha,$Email)) {
		die("Não foi possível vincular resultados");
	}
  $fetch=mysqli_stmt_fetch($stmt);
	mysqli_stmt_close($stmt);
// Executa a consulta
echo "$Usuario, $Senha, $Email";
echo "login sucedido";
?>


