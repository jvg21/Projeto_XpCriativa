<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JS + Form: exemplos básicos</title>
    <link rel="stylesheet" href="estilo/style.css" type="text/css">
    <link rel="stylesheet" href="estilo/layout.css" type="text/css">
</head>

<body>
    <script type="text/javascript" src="JS/formScript.js"></script>
    <?php include 'menu.html'?>
    <div class="content">


        <p class="subTitulo"><b>Dados do Formulário</b></p>
        <table class="tableCSS">
            <tr><th>Chave</th><th>Valor</th></tr>
            <script language=javascript>
                var params = new Array();
                params = getParameters();
                for (let [key, value] of Object.entries(params)) {
                    document.write("<tr><td style='text-align: center;'><b>" + key + "</b></td><td>" + value + "</td></tr>");
                }
            </script>
            <tr><th colspan="2">
                <input type=button name="Retornar" value=" << Retornar" onclick="window. history. back();">
            </th></tr>
        </table>
        

    </div>
    <?php include 'rodape.html'?>
</body>

</html>