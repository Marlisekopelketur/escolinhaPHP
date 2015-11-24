<?php
require_once 'dbconfig.php';
 //verifica se o botão cadastrar foi cadastrado

if(isset($_POST['btn'])){
    


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    //echo "Conectado ao banco $dbname em $host com sucesso.";
} catch (PDOException $pe) {
    die("Não foi possível se conctar ao banco $dbname :" . $pe->getMessage());
}

echo "<h1> $_POST[email] </h1>";

$conn = NULL;
}  else {
    //Botão cadastrar não foi pressionado
    //Rediciona para a página inicial
    header('Location: index.php');
}