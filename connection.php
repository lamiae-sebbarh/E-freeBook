<?php
$servername="localhost";
$username="root";
$password="";
$dbname="newdb";

//Create Connection
$conn=new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//get values from form
if (isset($_POST['bookname'])) {
$booknameVar=$_POST['bookname'];
}
if (isset($_POST['bookdescription'])) {
$bookdescVar=$_POST['bookdescreption'];
}
if (isset($_POST['bookauthor'])) {
$bookauthorVar=$_POST['bookauthor'];
}
if (isset($_POST['booklanguage'])) {
$booklangVar=$_POST['booklanguage'];
}

//File Upload
if(isset($_FILES['bookfile']))
{
	$allowed = array ('application/pdf' , 'application/doc' , 'application/docx');
	if (in_array($_FILES['bookfile']['type'], $allowed))
	{
			//Move File
			if(move_uploaded_file($_FILES['bookfile']['tmp_name'], "files/{$_FILES['bookfile']['name']}"))
			{
			$bookfileVar="{$_FILES['bookfile']['name']}";
			}
	}
		else{
		echo "Wrong File Type";
			}
}

if (isset($_POST['uploadername'])) {
$uploadernameVar=$_POST['uploadername'];
}
if (isset($_POST['uploaderemail'])) {
$uploaderemailVar=$_POST['uploaderemail'];
}

//Insert Values
$sql = "INSERT INTO bookdb (bookname, bookdescription, bookauthor, booklanguage, bookfile, uploadername, uploaderemail) 
VALUES ('$booknameVar', '$bookdescVar', '$bookauthorVar', '$booklangVar', '$bookfileVar', '$uploadernameVar', '$uploaderemailVar')";

//To check whether data is inserted properly or not
if ($conn->query($sql) === TRUE) {
	echo '<script type="text/javascript">'; 
	echo 'alert("New record created successfully. Click OK to go to Book Display Section.");'; 
	echo 'window.location.href = "displaydata.php";';
	echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
