<?php 
require_once('../class/Book.php');
if(isset($_POST['tracker'])){
	$tracker = $_POST['tracker'];
	$result = $book->deleteBook($tracker);
	$return['valid'] = true;
	$return['msg'] = "Reservation Deleted Successfully!";
	echo json_encode($return);
}
	
$book->Disconnect();