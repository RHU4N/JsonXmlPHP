<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nota.css">
    <title>nota</title>
</head>
<body>
    <?php
    if (isset($_GET['v'])) {
        $v = $_GET['v'];
       
    } else {
        echo "Houve algum erro";
    }

    $xml = simplexml_load_file('xml.xml');

    if (isset($v) && is_numeric($v)) {
        $index = intval($v);
        if (isset($xml->empresa[$index])) {
            $empresa = $xml->empresa[$index];
            
        } else {
            echo "Índice inválido: $v";
        }
    } else {
        echo "Valor inválido para o índice: $v";
    }
    
        echo"<div class='nota nota-1'>
        <div class='logo'>
        <img src='../img/". $empresa->img ."' alt='logo'>'
        </div>
        <div class='info'>
          <h2>" . $empresa->nomeF . "</h2>
          <p>CNPJ:" . $empresa->cnpj . "</p>
          <div class='dados'>
          </div>
        </div>
      </div>
    
      <div class='info'>
        <p>Data de emissão:" . $empresa->dtE . "</p>
        <p>Valor:R$" . $empresa->valor . "</p>
      </div>
    
      <div class='nota nota-2'>
          <div class='dados'>
            <p><strong>Nome:</strong>" . $empresa->nome . "</p>
            <p><strong>Endereço:</strong>" . $empresa->end . "</p>
            <p><strong>CPF:</strong>" . $empresa->cpf . "</p>
            <p><strong>Telefone:</strong>" . $empresa->fone . "</p>
          </div>
        </div>
      </div>";

    ?>
</body>
</html>