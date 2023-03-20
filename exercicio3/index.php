<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style='margin-bottom:30px;'>Pesquisa de Filmes</h1>
    <form class="formulario" method="post">
        <center>

            <!-- <label class="titulo" for="titulo">Título:</label> -->
            <input class="barra" placeholder="Título do filme" type="text" name="titulo" id="titulo">
            <button class="btn" type="submit">Pesquisar</button>
            <br><br><br>
        </form>

        
        <?php
            // Lê o conteúdo do arquivo JSON
            $json = file_get_contents('json.json');
            $filmes = json_decode($json, true);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $titulo = $_POST['titulo'];
                $resultados = array_filter($filmes, function($filme) use ($titulo) {
                    return strpos($filme['titulo'], $titulo) !== false;
                });
                if (count($resultados) == 0) {
                    echo '<p>Nenhum filme encontrado.</p>';
                } else {
                    foreach ($resultados as $filme) {
                        echo '<li>';
                        echo $filme['titulo'] . ' (' . $filme['ano'] . ') - Dirigido por ' . $filme['diretor'];
                        echo '</li>';
                    }
                    echo '</ul>';
                }
            }
            ?>
            </center>
</body>
</html>