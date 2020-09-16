<?php
$con = mysqli_connect('parkerites.c1gpnmhb7ka6.ap-south-1.rds.amazonaws.com', 'root', 'parkerites123', 'parkerites');

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$lot_id=$_POST['id'];
if (isset($_POST['booked'])) {
  $status = 'booked';
    $stmt = $con->prepare("INSERT INTO status_table (id, status) VALUES (?, ?)");
    $stmt->bind_param('ds',$lot_id, $status);
    $stmt->execute();
}elseif (isset($_POST['park'])) {
  $stmt = $con->prepare("update status_table set status='parked' where id=?");
  $stmt->bind_param('d',$lot_id);
  $stmt->execute();
}else {
  $stmt = $con->prepare("DELETE FROM status_table where id= ?");
  $stmt->bind_param('d',$lot_id);
  $stmt->execute();
}
$con->close();
?>
