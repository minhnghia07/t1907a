<?php
require_once ('config.php');

/**
 * insert, update, delete -> su dung function
 */
function execute($sql) {
	//create connection toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

	//query
	mysqli_query($conn, $sql);

	//dong connection
	mysqli_close($conn);
}

/**
 * su dung cho lenh select => tra ve ket qua
 */
function executeResult($sql) {
	//create connection toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

	//query
	$resultset = mysqli_query($conn, $sql);
	$list      = [];
	while ($row = mysqli_fetch_array($resultset, 1)) {
		$list[] = $row;
	}
	
	//dong connection
	mysqli_close($conn);

	return $list;
}


function getOneProduct($id) {
	//create connection toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	$sql_select_one = "SELECT * FROM product WHERE id = $id LIMIT 1";
	$result_one = mysqli_query($conn, $sql_select_one);
	$product = mysqli_fetch_assoc($result_one);

	return $product;
}
function checkUserLogin($username, $password) {
	//create connection toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	//tạo câu truy vấn
	$sql_select_one = "SELECT * FROM userr WHERE `username` = '$username' AND `password` = '$password' LIMIT 1";
	//thực thi truy vấn
	$result_one = mysqli_query($conn, $sql_select_one);

	$userr = mysqli_fetch_assoc($result_one);

	return $userr;
}