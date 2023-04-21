<?php

include 't2.php';

$sql = $conn->query("select * from t2");
$res = array();
while($row=$sql->fetch_assoc())
{
    $res[]=$row;
}
echo json_encode($res);


?>