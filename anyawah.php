<?php

include 'any.php';

$sql = $conn->query("select * from any");
$res = array();
while($row=$sql->fetch_assoc())
{
    $res[]=$row;
}
echo json_encode($res);


?>