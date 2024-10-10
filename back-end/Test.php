<?php

    header("Content-Type:application/json");

    require'vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $host= getenv('DB_HOST');
    $db_name= getenv('DB_NAME');
    $db_user= getenv('DB_USER'); 
    $db_pass= getenv('DB_PASSWORD');

    try{
        $dsn = "mysql:host=$host; dbname=$db_name";
        $pdo = new PDO($dsn, $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        echo "connexion réussie à la base de données";
    } catch (PDOException $e){
        echo "Echec de la connexion : " . $e->getMessage(); 
    }

?>