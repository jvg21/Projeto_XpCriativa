function roomList(){
    window.location.href = 'http://localhost/xp/Projeto_XpCriativa/RoomCrud/roomList.php';
}

function popUp(texto){
    alert(texto);
}

function gravar_quarto(){
    var form = document.getElementById("cod");
    var dados = new FormData(form);
    fetch("roomInsert.php",{
        method:"Post",
        body:dados
    }).then( async function(response){
        var resposta = await response.json();
        console.log(resposta);
        alert(resposta);
        
        
    })
}