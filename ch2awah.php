<?php

include 'ch2.php';

$sql = $conn->query("select * from ch2");
$res = array();
while($row=$sql->fetch_assoc())
{
    $res[]=$row;
}
echo json_encode($res);


?>