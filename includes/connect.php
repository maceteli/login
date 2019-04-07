<?php
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=login','root','');
    }catch(PDOException $e){
        echo"The following errors occurred during database connection ".$e;
        exit();
    }
?>