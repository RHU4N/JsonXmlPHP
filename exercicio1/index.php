<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de Dados</title>
</head>
<body>  
    <h1>Dados</h1>
    <br>
    <?php
        $host = "localhost";
        $user = "root";
        $pass = "root";
        $banco = "jsonapi";
        $conexao = mysqli_connect($host,$user,$pass,$banco)or die("Problemas com a conexão do Banco de Dados");

        $infoSa = mysqli_query($conexao,"select * from salao");
        if(!$infoSa){
            die("Query invalida: ". mysqli_error($conexao));

        }

        $infoSe = mysqli_query($conexao,"SELECT * FROM jsonapi.servico inner join jsonapi.salao on salao.salao_id=servico.fk_salao_id;");
        if(!$infoSe){
            die("Query invalida: ". mysqli_error($conexao));
        }

        mysqli_close($conexao);

        $xml = '<?xml version="1.0" encoding="ISO-8859-1"?>';
        $xml .= '<array>';
        $xml .= '<salao>';

        while($dados=mysqli_fetch_array($infoSe)){
            $xml .='<infos>';
            $xml .= '<nome>'.$dados['salao_nome'].'</nome>';
            $xml .= '<endereco>'.$dados['salao_endereco'].'</endereco>';
            $xml .= '<tel>'.$dados['salao_telefone'].'</tel>';
            $xml .= '<email>'.$dados['salao_email'].'</email>';
            $xml .= '<nomeser>'.$dados['servico_nome'].'</nomeser>';
            $xml .= '<valor>'.$dados['servico_valor'].'</valor>';
            $xml .='</infos>';
        }
        $xml .='</salao>';
        // $xml .='<servico>';
        // while($dados=mysqli_fetch_array($infoSe)){
        //     $xml .= '<funcao>';
        //     $xml .= '<nome>'.$dados['servico_nome'].'</nome>';
        //     $xml .= '<valor>'.$dados['servico_valor'].'</valor>';
        //     $xml .= '</funcao>';
        // }
        // $xml .='</servico>';
        $xml .='</array>';

        $xml = simplexml_load_string($xml);

        echo "<div class='daddy'>";
        foreach($xml -> salao -> infos as $infos){
            echo "<div class='container'>";
            echo "<strong>Nome:</strong>".utf8_decode($infos -> nome)."<br />";
            echo "<strong>Endereço:</strong>".utf8_decode($infos -> endereco)."<br />";
            echo "<strong>Telefone:</strong>".utf8_decode($infos -> tel)."<br />";
            echo "<strong>Email:</strong>".utf8_decode($infos -> email)."<br />";
            // echo "<br />";
        // }
        // foreach($xml -> servico -> infos as $infos){
            echo "<strong>Serviço:</strong>".utf8_decode($infos -> nomeser)."<br />";
            echo "<strong>Valor:</strong>".utf8_decode($infos -> valor)."<br />";
            echo "<br />";
            echo "</div>";
        }
        echo "</div>";
    ?>
</body>
</html>