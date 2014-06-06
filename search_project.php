<?php

$dl = 'test.db';
$db = new pdo("sqlite:$dl");

$query = "SELECT * FROM projects WHERE projects.project_id not in (SELECT PROJECT_ID FROM UserOwnsProject)";

//..$dh = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$dh = $db->prepare($query);

/*$dh->bindParam(PDO::PARAM_STR, 10);*/
$dh->execute();
$rs = $dh->fetchall();
echo json_encode($rs)
?>
