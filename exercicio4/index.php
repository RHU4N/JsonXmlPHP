<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Github</title>
</head>
<body>
<center>
<h1 style='margin-bottom:30px;'>Pesquisa de perfil do Github</h1>
<form class="formulario" action="<?php 
    echo $_SERVER['PHP_SELF']; 
    ?>" method="GET" style='margin-bottom:30px;'>
	<input class="barra" placeholder="Digite o user do Github" type="text" name="username" id="username">
	<input class="btn"  type="submit" value="Pesquisar">
</form>

<?php
if(isset($_GET['username'])) {

	$url = "https://api.github.com/users/" . $_GET['username'];
	$options = array(
	    'http' => array(
	    'header'  => "User-Agent: request\r\n",
	    'method'  => 'GET'
	)
	);
	$context = stream_context_create($options);
	$response = file_get_contents($url, false, $context);
	$data = json_decode($response, true);

	if(isset($data['message']) && $data['message'] == "Not Found") {
		echo "<p>O usuário do Github '" . $_GET['username'] . "' não foi encontrado.</p>";
	} else {
?>
		<h2 style='color:white;'>Perfil do Github de <?php echo $data['login']; ?></h2>
		<img src="<?php echo $data['avatar_url']; ?>">
		<p style='color:white;'><?php echo $data['bio']; ?></p>
<?php
	}
}
?>
</center>


</body>
</html>