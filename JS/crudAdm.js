function voltarMenuAdm(){
    window.location.replace('../menuAdm.php');
}

function trocarCrud2(){
    //alert('chato');
    if(document.getElementById('lista-tipo-quartos').style.display == 'none'){
        document.getElementById('lista-quartos').style.display = 'none';
        document.getElementById('lista-tipo-quartos').style.display='block';
    }
}