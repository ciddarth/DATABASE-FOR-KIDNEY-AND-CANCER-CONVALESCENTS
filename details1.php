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
  border: 1px solid #FFFAF0;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #A9A9A9;}

#customers tr:hover {background-color:#F0E68C;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #FFA07A;
  color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
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
$conn = mysqli_connect("localhost", "root" ,"", "database2");
if ($conn-> connect_error){
	die("Connection failed:". $conn-> connect_error);
}
$sql= "SELECT*FROM entry1";
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