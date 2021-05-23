<!DOCTYPE html>
<html>
<head>
<title>CUSTOMER DETAILS</title>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #8B4513;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #00FF7F;}

#customers tr:hover {background-color:#F0E68C;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #F5DEB3;
  color: white;
}
tr:nth-child(even) {background-color: #9ACD32}
</style>
</head>
<body style="background-color:powderblue;">
<center>
<table border=2 bordercolor="#ff00ff" id="customers">
<tr>
	<th>id</th>
	<th>fname</th>
	<th>lname</th>
	<th>age</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root" ,"", "hello2");
if ($conn-> connect_error){
	die("Connection failed:". $conn-> connect_error);
}
$sql= "SELECT*FROM once2";
$result = $conn-> query($sql);

if ($result->num_rows> 0) {
	while($row = $result->fetch_assoc()) {
		echo "<tr><td>". $row["id"] ."</td><td>". $row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["age"]."</td></tr>";
	}
echo "</table>";
}
else{
	echo "0 result";
}
$conn->close();
?>
</table>
</center>
</body>
</html>