<?php

include 'dundiin.php';

$sql = $conn->query("select * from tbldundiin");
$res = array();
while($row=$sql->fetch_assoc())
{
    $res[]=$row;
}
echo json_encode($res);


?>