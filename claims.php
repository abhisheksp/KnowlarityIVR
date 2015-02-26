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
			$text .= 'Press '. $i++ .'  for claim id of '.$row['claimsid'].'. ' ;
			$claims .= '&&'.$row['claimsid']; 
		}
		echo $text;
}
catch(PDOException $e){
		echo $e->getMessage();
    }
?>