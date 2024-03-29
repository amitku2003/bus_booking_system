<?php 
require_once('database/Database.php');
if(session_status() == PHP_SESSION_NONE)
{
	session_start();
}

$db = new Database();

$sqlGetSit = "SELECT * 
			   FROM accomodation
			   WHERE acc_id = ?;
";

$getSit = $db->getRow($sqlGetSit, [1]);

$date = $_SESSION['departure_date'];
$sqlBookedSit = "SELECT COUNT(*) as sit
				 FROM booked 
				 WHERE acc_id = ?
				 AND book_departure = ? 
";
$totalSit = $db->getRow($sqlBookedSit, [1, $date]);

$sqlEcoA = "SELECT * 
			   FROM accomodation
			   WHERE acc_id = ?;
";
$getEcoA = $db->getRow($sqlEcoA, [2]);

$sqlBookedEcoA = "SELECT COUNT(*) as ecoA
				 FROM booked 
				 WHERE acc_id = ?
				 AND book_departure = ?; 
	";
$totalEcoA = $db->getRow($sqlBookedEcoA, [2, $date]);	


$sqlEcoB = "SELECT * 
			   FROM accomodation
			   WHERE acc_id = ?;
";
$getEcoB = $db->getRow($sqlEcoB, [3]);

$sqlBookedEcoB = "SELECT COUNT(*) as ecoB
				 FROM booked 
				 WHERE acc_id = ?
				 AND book_departure = ?; 
	";
$totalEcoB = $db->getRow($sqlBookedEcoB, [3, $date]);	

$sqlTour = "SELECT * 
			   FROM accomodation
			   WHERE acc_id = ?;
";
$getTour = $db->getRow($sqlTour, [4]);
$sqlBookedTour = "SELECT COUNT(*) as ecoT
				 FROM booked 
				 WHERE acc_id = ?
				 AND book_departure = ?; 
	";
$totalTour = $db->getRow($sqlBookedTour, [4, $date]);	

$sqlCab = "SELECT * 
			   FROM accomodation
			   WHERE acc_id = ?;
";
$getCab = $db->getRow($sqlCab, [5]);
$sqlBookedCab = "SELECT COUNT(*) as ecoC
				 FROM booked 
				 WHERE acc_id = ?
				 AND book_departure = ?; 
	";
$totalCab = $db->getRow($sqlBookedCab, [5, $date]);	

//ika 6  delux
$sqlDel = "SELECT * 
			   FROM accomodation
			   WHERE acc_id = ?;
";
$getDel = $db->getRow($sqlDel, [6]);
$sqlBookedDel = "SELECT COUNT(*) as ecoD
				 FROM booked 
				 WHERE acc_id = ?
				 AND book_departure = ?; 
	";
$totalDel = $db->getRow($sqlBookedDel, [6, $date]);	



$db->Disconnect();