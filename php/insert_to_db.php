<?php
require_once 'db_connection.php';
function signup($email,$password,$name,$surname,$amka,$type,$id_number)
{
    $conn = OpenCon();
    $stmt = $conn->prepare("INSERT INTO users(email,password,name,surname,amka,type,id_number) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss",$email,$password,$name,$surname,$amka,$type,$id_number);
    $result = $stmt->execute();
    $stmt->close();

    if($result)
	{
		CloseCon($conn);
		return true;
	}
	else
	{
		return $conn->error;
	}
}
function update($email,$password,$name,$surname,$amka,$type,$id_number,$old_email)
{
    $conn = OpenCon();
    $stmt = $conn->prepare("DELETE FROM users WHERE email=?");
    $stmt->bind_param("s",$old_email);
	$result = $stmt->execute();
	CloseCon($conn);
	if(!$result)
		return false;
	$conn = OpenCon();
    $stmt = $conn->prepare("INSERT INTO users(email,password,name,surname,amka,type,id_number) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss",$email,$password,$name,$surname,$amka,$type,$id_number);
    $result = $stmt->execute();
	$stmt->close();
	CloseCon($conn);

    if($result)
	{
		return true;
	}
	else
	{
		return false;
	}
}
function add_pension($email,$password)
{
    $conn = OpenCon();
    $stmt = $conn->prepare("SELECT amka FROM users WHERE (email=? AND password=?)");
    $stmt->bind_param("ss",$email,$password);
	$stmt->execute();
	$amka = "";
	$stmt->bind_result($amka);
	$result = $stmt->fetch();
	CloseCon($conn);

	if($result)
	{
		$conn = OpenCon();
		$stmt = $conn->prepare("INSERT INTO pension_request VALUES (?)");
		$stmt->bind_param("s",$amka);
		$result = $stmt->execute();
		$stmt->close();
        CloseCon($conn);
		return $result;
	}
	else
	{
		return false;
	}
}
function add_employee($email,$password,$name,$surname,$amka,$id_number,$category)
{
    $conn = OpenCon();
    $stmt = $conn->prepare("SELECT amka FROM users WHERE (email=? AND password=?)");
    $stmt->bind_param("ss",$email,$password);
	$stmt->execute();
	$employer_amka = "";
	$stmt->bind_result($employer_amka);
	$result = $stmt->fetch();
	CloseCon($conn);

	if($result)
	{
		$conn = OpenCon();
		$stmt = $conn->prepare("INSERT INTO employees(name,surname,amka,id_number,category,employer_amka) VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss",$name,$surname,$amka,$id_number,$category,$employer_amka);
		$result = $stmt->execute();
		$stmt->close();
        CloseCon($conn);
		return $result;
	}
	else
	{
		return false;
	}
}
?>