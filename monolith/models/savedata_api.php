<?php
include('db.php');

$data = $_POST;
$save = update($data, 'bookings', 'ID', $_POST['ID']);
if($save){
  print_r(json_encode($save));
}