<?php

$dl = 'test.db';
$db = new pdo("sqlite:$dl");

if(isset($_GET["username"]))
{
    $username=$_GET["username"];
    if($username == "")
    {
        $sql = "select * from workspace";
        $dh = $db->query($sql);
    } 
    else
    {
        $query = "SELECT * FROM workspace WHERE username = :username";
     
        $dh = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $dh->bindParam(":username", $username, PDO::PARAM_STR, 10);
        $dh->execute();
    }
}
else
{
    
    $sql = "select * from workspace";
    $dh = $db->query($sql);
}
$rs = $dh->fetchall();
echo json_encode($rs)
?>
