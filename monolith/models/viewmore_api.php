<?php

include('db.php');

$rowID = $_POST['id'];

$rowData = dbGetWhere('bookings', array('ID'=>$rowID));
print_r(json_encode($rowData));