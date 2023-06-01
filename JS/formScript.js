function getParameters() {

  var params    = new Array();
  var paramsRet = new Array();
  var url = window.location.href;     // Obtém a URL
  var paramsStart = url.indexOf("?"); // Procura ? na URL

  if(paramsStart != -1){ 
   // Encontrou ? na URL
    var paramString = url.substring(paramsStart + 1); // Retorna parte da URL após ?
    paramString = decodeURIComponent(paramString);    // Decodifica código de URI da URL
    var params = paramString.split("&"); // Retorna trechos da String separados por &
    for(var i = 0 ; i < params.length ; i++) {
      var pairArray = params[i].split("="); // Retorna trechos da String separados por =
      if(pairArray.length == 2){
        paramsRet[pairArray[0]] = pairArray[1];
      }

    }
    return paramsRet;
  }
  return null; // Não encontrou ? na URL
}

function MostrarSenha(id){
    var campo = document.getElementById(id);
    if(campo.type == "password"){
        campo.type = "text";
    }else{
        campo.type = "password"
    }
}
function mascaraTelefone(event) {
    let tecla = event.key;
    // Regex: 
    // g = não termina verificação enquanto não houver combinação para todos os elementos da Regex
    // \D+ = troca qualquer caractere que não seja um dígito por caracter vazio
    let telefone = event.target.value.replace(/\D+/g, "");
  
    // Regex: i = case insensitive
    // Se Tecla é número, concatena com telefone
    if (/^[0-9]$/i.test(tecla)) {
      telefone = telefone + tecla;
      let tamanho = telefone.length;
  
      if (tamanho >= 12) { // Se telefone com 12 ou mais caracteres, não faz mais nada
        return false;
      }
  
      if (tamanho > 10) { 
        telefone = telefone.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
      } else if (tamanho > 5) { 
        telefone = telefone.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
      } else if (tamanho > 2) { 
        telefone = telefone.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
      } else {
        telefone = telefone.replace(/^(\d*)/, "($1");
      }
  
      event.target.value = telefone;
    }

    if (!["Backspace", "Delete", "Tab"].includes(tecla)) {
      return false;
    }
}


function mascaraCpf(i){

    var v = i.value;
    if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
        i.value = v.substring(0, v.length-1);
        return;
    }

    i.setAttribute("maxlength", "14");
    if (v.length == 3 || v.length == 7) i.value += ".";
    if (v.length == 11) i.value += "-";

}
function dataMax(id){
    var hoje = new Date();
    var dia = hoje.getDate();
    var mes = hoje.getMonth() + 1; //January is 0!
    var ano = hoje.getFullYear()-18;

    if (dia < 10) {
    dia = '0' + dia;
    }

    if (mes < 10) {
    mes = '0' + mes;
    } 
        
    hoje = ano + '-' + mes + '-' + dia;
    document.getElementById(id).setAttribute("max", hoje);
}

function confirmaSenha() {
    const password = document.querySelector('input[name=password]');
    const confirm = document.querySelector('input[name=confirm_password]');

    if(password.value != ""){
        if (confirm.value === password.value) {
            confirm.setCustomValidity('');
          } else {
            confirm.setCustomValidity('A Senha Não Confere');
          }

    }
   
  }

function validaImagem(input) {
  var caminho = input.value;

  if (caminho) {
      var comecoCaminho = (caminho.indexOf('\\') >= 0 ? caminho.lastIndexOf('\\') : caminho.lastIndexOf('/'));
      var nomeArquivo = caminho.substring(comecoCaminho);

      if (nomeArquivo.indexOf('\\') === 0 || nomeArquivo.indexOf('/') === 0) {
          nomeArquivo = nomeArquivo.substring(1);
      }

      var extensaoArquivo = nomeArquivo.indexOf('.') < 1 ? '' : nomeArquivo.split('.').pop();

      if (extensaoArquivo != 'gif' &&
          extensaoArquivo != 'png' &&
          extensaoArquivo != 'jpg' &&
          extensaoArquivo != 'jpeg') {
          input.value = '';
          alert("É preciso selecionar um arquivo de imagem (gif, png, jpg ou jpeg)");
      }
  } else {
      input.value = '';
      alert("Selecione um caminho de arquivo válido");
  }
  if (input.files && input.files[0]) {
      var arquivoTam = input.files[0].size / 1024 / 1024;
      if (arquivoTam < 16) {
          var reader = new FileReader();
          reader.onload = function(e) {
              document.getElementById('imagemSelecionada').setAttribute('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
      } else {
          input.value = '';
          alert("O arquivo precisa ser uma imagem com menos de 16 MB");
      }
  } else{
      document.getElementById('imagemSelecionada').setAttribute('src', '#');
  }
}