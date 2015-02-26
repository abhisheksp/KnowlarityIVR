<?php
include('connect.php');
try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password); /*** echo a message saying we have connected ***/
    echo 'Connected to database<br />';
    $count = $dbh->exec("UPDATE users SET phone='918147286765' WHERE id=7");
    echo $count;
    $dbh = null;
    }
catch(PDOException $e){
    echo $e->getMessage();
}
?>