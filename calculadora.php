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
    
    <?php
    if (isset($_POST["botao"])) {
    $visor   = $_POST["visor"]; 
    $valor   = $_POST["botao"];   
    
    if ($valor == "C") {
        $visor = "";
    } else {
        $visor .= $valor;
    }
    
    echo "<script>document.getElementsByName('visor')[0].value='$visor';</script>";

    } 
    elseif (isset($_POST["calcular"])) {
    $visor = $_POST["visor"]; 
    
    $visor_limpo = str_replace(' ', '', $visor);
    $regex_segura = '/^[\d\.\+\-\*\/\(\)]+$/';

    
    if (str_contains($visor_limpo, '/0')) {
        $resultado = "Cálculo inválido";

    // 2. Se não houver "/0", verificamos se a string é segura (só números/operadores)
    } elseif (preg_match($regex_segura, $visor_limpo)) {
        
        // 3. Só agora tentamos calcular
        // (Ainda usamos o @ por segurança, caso algo como (5/(2-2)) aconteça)
        $resultado = @eval("return $visor_limpo;"); 
        
        if ($resultado === false) {
            $resultado = "Erro de Sintaxe";
        
        // 4. Verificação final para casos como 0/0 ou 5/(2-2)
        } elseif (is_infinite($resultado) || is_nan($resultado)) {
            $resultado = "Cálculo inválido";
        }
        
    // 5. Se a string não passou na regex (tinha letras, etc.)
    } else {
        $resultado = "Cálculo inválido";
    }
    
    echo "<script>document.getElementsByName('visor')[0].value='$resultado';</script>";
    }
    ?>
    <script>

    var visorInput = document.getElementsByName('visor')[0];
    var calcularButton = document.getElementsByName('calcular')[0];

    visorInput.addEventListener('keydown', function(event) {
        
        if (event.key === 'Enter') {
            event.preventDefault(); 
            calcularButton.click(); 
        }
    });
    </script>

    <script>
    // 1. Pega os elementos
    const themeButton = document.getElementById('theme-toggle');
    // MUDANÇA AQUI: Pegamos o <html> (documentElement) em vez do <body>
    const htmlElement = document.documentElement; 

    // 2. Função para aplicar o tema salvo
    function aplicarTemaSalvo() {
        const temaSalvo = localStorage.getItem('theme');
        if (temaSalvo === 'light') {
            htmlElement.classList.add('light-mode'); // Aplica no <html>
        } else {
            htmlElement.classList.remove('light-mode'); // Remove do <html>
        }
    }

    // 3. Função para alternar o tema
    function alternarTema() {
        htmlElement.classList.toggle('light-mode'); // Alterna no <html>
        
        // 4. Salvar a escolha no localStorage
        if (htmlElement.classList.contains('light-mode')) {
            localStorage.setItem('theme', 'light');
        } else {
            localStorage.setItem('theme', 'dark');
        }
    }

    // 5. Adiciona o clique ao botão
    themeButton.addEventListener('click', alternarTema);

    // 6. Aplica o tema salvo assim que a página carrega
    document.addEventListener('DOMContentLoaded', aplicarTemaSalvo);
    </script>

</body>

</html>