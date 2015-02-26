<?php

include('connect.php');
try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $sql = "SELECT id FROM users WHERE phone = ".$_GET['patient_phone'];
    $rows = $dbh->query($sql);
    $row = $rows->fetch();
    $user_id = $row[0];
    $docSql = "SELECT * FROM claims WHERE user_id = ".$user_id;
    $claims = '';
    $i=1;
    $text='';
    foreach ($dbh->query($docSql) as $row)
    {
        if($_GET['patient_choice']==$i)
    	   {
            $claim_id = $row['claimsid'];
            }  
            $i++;
    }
    $clSql = "SELECT status FROM claims WHERE claimsid = ".$claim_id;
     $rows = $dbh->query($clSql);
     $row = $rows->fetch();
     $st= $row[0];

     echo "Current status is ".$st;
}
catch(PDOException $e)    {
    echo $e->getMessage();
}
?>