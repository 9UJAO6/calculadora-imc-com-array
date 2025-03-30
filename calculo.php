<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calculo IMC</title>
  </head>
  <body>
    <?php


    function calculaIMC($peso, $altura) { 
        if ($peso > 0 && $altura > 0) {
            $imc = $peso / pow($altura, 2);
            return number_format($imc, 2, '.', '');
        } else {
            return "Valores Inválidos";
        }
    }
    
    // Definição das faixas de IMC
    $faixasIMC = [
        ["min" => 1.0, "max" => 18.5, "classificacao" => "Magreza"],
        ["min" => 18.51, "max" => 24.9, "classificacao" => "Saudável"],
        ["min" => 25.0, "max" => 29.9, "classificacao" => "Sobrepeso"],
        ["min" => 30.0, "max" => 34.9, "classificacao" => "Obesidade Grau I"],
        ["min" => 35.0, "max" => 39.9, "classificacao" => "Obesidade Grau II"],
        ["min" => 40.0, "max" => INF, "classificacao" => "Obesidade Grau III"]
    ];
    
    function classificaIMC($imc, $faixas) {
        foreach ($faixas as $faixa) {
            if ($imc >= $faixa["min"] && $imc <= $faixa["max"]) {
                return $faixa["classificacao"];
            }
        }
        return "Classificação não encontrada";
    }
    
    $peso = $_POST['peso'] ?? 0;
    $altura = $_POST['altura'] ?? 0;
    $imc_formado = calculaIMC($peso, $altura);
    
    echo "<h1 class='text-center'>Resultado</h1>";
    
    if ($imc_formado === "Valores Inválidos") {
        echo "<h3 class='text-center'>Erro: Informe valores válidos para peso e altura.</h3>";
    } else {
        $classificacao = classificaIMC($imc_formado, $faixasIMC);
        echo "<input type='text' class='form-control col-6 mx-auto' value='$imc_formado'>";
        echo "<h3 class='text-center'>Atenção, seu IMC é $imc_formado, e você está classificado como $classificacao.</h3>";
    }

    echo "<br><a href='index.html'>Voltar</a>";
    ?>
  </body>
</html>







