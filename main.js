function verificar(){
  senhaMain = document.querySelector("#senha_c");
  senhaVerificacao = document.querySelector("#senha_verificar");
  if(senhaMain.value != senhaVerificacao.value)
  {
    window.alert("as senhas estão diferentes")
  }
}