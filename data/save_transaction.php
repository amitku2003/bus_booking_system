<?php 
require_once('../class/Book.php');
require_once('../class/Transaction.php');
if(isset($_POST['bid']) && isset($_POST['disc'])){
	$bid = $_POST['bid'];
	$disc = $_POST['disc'];

	$data = $book->selectBook($bid);
	$pass = $data['book_name'];
	$age = $data['book_age'];
	$gen = $data['book_gender'];
	$departure = $data['book_departure'];
	$dest_id = $data['dest_id'];
	$acc_id = $data['acc_id'];
	$orig_id = $data['origin_id'];
	$price = $data['acc_price'];
	
	$pay = $price * $disc;
	$insertTrans = $transaction->addTransaction($pay, $pass, $age, $gen, $acc_id, $orig_id, $dest_id);
	$return['pay'] = $pay;

	$book->deleteBookByID($bid);

	echo json_encode($return);

}

$book->Disconnect();