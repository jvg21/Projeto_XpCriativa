function trocarCrud1(){
    document.getElementById('lista-tipo-quartos').style.display = 'none';
    document.getElementById('lista-quartos').style.display = 'block';
}
function trocarCrud2(){
    document.getElementById('lista-tipo-quartos').style.display = 'block';
    document.getElementById('lista-quartos').style.display = 'none';
}

function voltarMenuAdm(){
    window.location.href = 'http://localhost/xp/Projeto_XpCriativa/Adm/menuAdm.php';
}

function removeGetParams() {
    var url = window.location.href;
    var cleanUrl = url.split('?')[0];
    return cleanUrl;
}

function updateURL(id) {
    var url = removeGetParams();;
    url += '?atv='+id;

    window.location.href = url;
}
function redirectCleanUrl(){
    var url = removeGetParams();
    window.location = url;

}
