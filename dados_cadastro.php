<?php
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha_v = $_POST['senha_v'];
$dia_de_hoje = date('d/m/Y');
$hora = date('H:i:s');

$conn = new mysqli('localhost', 'root', '', 'login');//server, usuario, senha, nome_do_banco
if ($senha != $senha_v) {
  echo 'As senhas estão diferentes';
}
else
{
  if($conn -> connect_error){
    die("falha ao se conectar ao banco".$conn -> connect_error);
  }

  $smtp = $conn->prepare("INSERT INTO entrada_de_dados (usuario, email, senha, data, hora) VALUES(?,?,?,?,?)");
  $smtp->bind_param("sssss", $usuario, $email, $senha, $dia_de_hoje, $hora);

  if($smtp->execute()){
    echo "mensagem enviada com sucesso";
  }
  else{
    echo "Erro no envio da mensagem:".$smtp->error;
  }

  $smtp->close();
  $conn->close();
}
?>