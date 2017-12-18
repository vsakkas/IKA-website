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
    $stmt->execute();
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
?>