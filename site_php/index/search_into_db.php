<?php
require_once 'db_connection.php';
function signin($email,$password)
{
    $conn = OpenCon();
    $stmt = $conn->prepare("SELECT email FROM users WHERE (email=? AND password=?)");
    $stmt->bind_param("ss",$email,$password);
    $stmt->execute();
    $stmt->bind_result($result);
    $result = $stmt->fetch();
    $stmt->close();

	if($result)
	{
        CloseCon($conn);
		return $result;
	}
	else
	{
		return false;
	}
}
function exists($name,$surname,$amka,$id_number)
{
    $conn = OpenCon();
    $stmt = $conn->prepare("SELECT email FROM users WHERE (id_number=? AND amka=? AND name=? AND surname=?)");
    $stmt->bind_param("ssss",$id_number,$amka,$name,$surname);
    $stmt->execute();
    $stmt->bind_result($result);
    $stmt->fetch();
    $stmt->close();

	if($result)
	{
        CloseCon($conn);
		return $result;
	}
	else
	{
		return false;
	}
}
function all_info(&$email,&$password,&$name,&$surname,&$amka,&$id_number,&$type)
{
    $conn = OpenCon();
    $stmt = $conn->prepare("SELECT * FROM users WHERE (email=? AND password=?)");
    $stmt->bind_param("ss",$email,$password);
    $stmt->execute();
    $stmt->bind_result($email,$password,$name,$surname,$amka,$type,$id_number);
    $result = $stmt->fetch();
    $stmt->close();

	if($result)
	{
        CloseCon($conn);
		return $result;
	}
	else
	{
		return false;
	}
}
?>