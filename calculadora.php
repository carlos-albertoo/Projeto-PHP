<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div style="text-align: center;">
        <ul>
            <li>
                <h1>Calculadora</h1>
            </li>
        </ul>
    </div>
    <button id="theme-toggle" type="button">Mudar Tema</button>
    <form method="post">
        <input class="CaixaTexto" type="text" name="visor" value="<?php if (isset($_POST['visor'])) echo $_POST['visor']; ?>"><br><br>

        <input class="BtnNumb" type="submit" name="botao" value="1">
        <input class="BtnNumb" type="submit" name="botao" value="2">
        <input class="BtnNumb" type="submit" name="botao" value="3">
        <input class="BtnNumb" type="submit" name="botao" value="+"><br>
        <input class="BtnNumb" type="submit" name="botao" value="4">
        <input class="BtnNumb" type="submit" name="botao" value="5">
        <input class="BtnNumb" type="submit" name="botao" value="6">
        <input class="BtnNumb" type="submit" name="botao" value="-"><br>
        <input class="BtnNumb" type="submit" name="botao" value="7">
        <input class="BtnNumb" type="submit" name="botao" value="8">
        <input class="BtnNumb" type="submit" name="botao" value="9">
        <input class="BtnNumb" type="submit" name="botao" value="*"><br>
        <input class="BtnNumb" type="submit" name="botao" value=".">
        <input class="BtnNumb" type="submit" name="botao" value="0">
        <input class="BtnNumb" type="submit" name="botao" value="C">
        <input class="BtnNumb" type="submit" name="botao" value="/"><br>

        <input class="BtnCalcular" type="submit" name="calcular" value="="><br>
    </form>
</body>

</html>