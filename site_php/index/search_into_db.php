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

function all_employees($employer_amka)
{
    $conn = OpenCon();
    $stmt = $conn->prepare("SELECT name,surname,amka,id_number,category FROM employees WHERE (employer_amka=?)");
    $stmt->bind_param("s",$employer_amka);
    $stmt->execute();
    $stmt->bind_result($name,$surname,$amka,$id_number,$category);
    
    $employees_details = array();  
    while($stmt->fetch())
    {           
        $temp = array();
        $temp["name"] = $name;
        $temp["surname"] = $surname;
        $temp["amka"] = $amka;
        $temp["id_number"] = $id_number;
        $temp["category"] = $category;
        $employees_details[] = $temp;
    }

    $stmt->close();
    CloseCon($conn);

	return $employees_details;
}

function get_type($email,$password)
{
    $conn = OpenCon();
    $stmt = $conn->prepare("SELECT type FROM users WHERE (email=? AND password=?)");
    $stmt->bind_param("ss",$email,$password);
    $stmt->execute();
    $stmt->bind_result($type);
    $result = $stmt->fetch();
    $stmt->close();

	return $type;
}