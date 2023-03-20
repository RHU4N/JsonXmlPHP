<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Carrega o arquivo XML
$xml = simplexml_load_file('xml.xml');

// Cria a tabela HTML
echo "<table border='1'>
      <div class='bd'>
      <tr>
        <th>Nome Fantasia</th>
        <th>Logo</th>
        <th>CNPJ</th>
        <th>Data de Emissão</th>
        <th>Valor</th>
        <th>Responsável</th>
        <th>Endereço</th>
        <th>CPF</th>
        <th>Telefone</th>
        <th>Nota</th>
      </tr>
      </div>";

foreach ($xml->empresa as $empresa) {
  echo "<tr>";
  echo "<td>" . $empresa->nomeF . "</td>";
  echo "<td> <img src='../img/". $empresa->img ."' alt='logo'>" . "</td>";
  echo "<td>" . $empresa->cnpj . "</td>";
  echo "<td>" . $empresa->dtE . "</td>";
  echo "<td>R$" . $empresa->valor . "</td>";
  echo "<td>" . $empresa->nome . "</td>";
  echo "<td>" . $empresa->end . "</td>";
  echo "<td>" . $empresa->cpf . "</td>";
  echo "<td>" . $empresa->fone . "</td>";
  echo "<td> <a href='nota.php?v=".urldecode($empresa->cod)."'>" . $empresa->nomeF . "_Nota</a> </td>";
  echo "</tr>";
}


echo "</table>";

?>

</body>
</html>