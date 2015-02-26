<?php
include('connect.php');
try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $sql = "SELECT id FROM users WHERE phone = ".$_GET['patient_phone'];
    $rows = $dbh->query($sql);
    $row = $rows->fetch();
    $user_id = $row[0];
    $docSql = "SELECT * FROM doctors WHERE department_id = ".$_GET['department_choice'];
    $doctor_id = '';
    $i=1;
    $text='';
    foreach ($dbh->query($docSql) as $row)
    {
        if($_GET['doctor_id']==$i)
    	{
            $doctor_id = $row['id'];
            break;
        }  
            $i++;
    }
    $clSql = "SELECT * FROM schedule WHERE doctor_id = ".$doctor_id." AND flag =0 AND start > NOW() ORDER BY start ASC LIMIT 4";
    $schedule_id = '';
    $i=1;
    $text='';
    foreach ($dbh->query($clSql) as $row)
    {
        if($_GET['schedule_choice']==$i)
    	{
            $schedule_id = $row['id'];
            break;
        }  
            $i++;
    }
    $sql = "UPDATE schedule SET flag = 1, user_id=".$user_id." WHERE id =".$schedule_id;
    $rows = $dbh->query($sql);
    $row = $rows->fetch();
catch(PDOException $e){
    echo $e->getMessage();
}


?>