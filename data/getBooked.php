<?php 
require_once('database/Database.php');
if(session_status() == PHP_SESSION_NONE)
{
	session_start();
}
$db = new Database();
$tracker = $_SESSION['tracker'];

$sql = "SELECT *
		FROM booked b 
		INNER JOIN accomodation a 
		ON b.acc_id = a.acc_id
		WHERE book_tracker = ?;
";
$bookPass = $db->getRows($sql, [$tracker]);

$sqlBookBy = "SELECT * 
			  FROM booked
			  WHERE book_tracker = ?
			  LIMIT 1;
";
$bookByInfo = $db->getRow($sqlBookBy, [$tracker]);


$db->Disconnect();