<?php

$host= "localhost";
$user="root";
$password="";
$database="hello2";

$id="";
$fname="";
$lname="";
$age="";



mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
	$connect= mysqli_connect($host, $user, $password, $database);
} 
catch (Exception $ex) {
	echo 'Error';
}

function getPosts()
{
	$posts = array();
	$posts[0]=$_POST['id'];
	$posts[1]=$_POST['fname'];
	$posts[2]=$_POST['lname'];
	$posts[3]=$_POST['age'];
	return $posts;
}

//search

if(isset($_POST['search']))
{
	$data= getposts();
	
	$search_Query="SELECT * FROM once2 WHERE id =$data[0]";
	
	$search_Result = mysqli_query($connect, $search_Query);
	
	if($search_Result)
	{
		if(mysqli_num_rows($search_Result))
		{
			while($row= mysqli_fetch_array($search_Result))
			{
				$id= $row['id'];
				$fname= $row['fname'];
				$lname= $row['lname'];
				$age= $row['age'];
			}
		}else{
			echo 'No Data For This Id';
		}
			
	}else{
		echo 'Result Error';
	}
}

if(isset($_POST['insert']))
{
	$data = getPosts();
	$insert_Query = "INSERT INTO `once2`(`fname`, `lname`, `age`) VALUES ('$data[1]','$data[2]','$data[3]')";
	try{
		
		$insert_Result= mysqli_query($connect, $insert_Query);
		
		if($insert_Result)
		{
			if(mysqli_affected_rows($connect)>0)
			{
				echo 'Data Inserted';
			}else{
				echo 'Data Not Inserted';
			}
		}
		
	} catch (Exception $ex){
		echo 'Error Insert' .$ex->getMessage();
	}
	}
	
if(isset($_POST['delete']))
{
	$data = getPosts();
	$delete_Query = "DELETE FROM `once2` WHERE `id` = $data[0]";
	try{
		
		$delete_Result = mysqli_query($connect, $delete_Query);
		
		if($delete_Result)
		{
			if(mysqli_affected_rows($connect)>0)
			{
				echo 'Data Deleted';
			}else{
				echo 'Data Not Deleted';
			}
		}
		
	} catch (Exception $ex){
		echo 'Error Delete' .$ex->getMessage();
	}
	}
	
if(isset($_POST['update']))
{
	$data = getPosts();
	$update_Query = "UPDATE `once2` SET `fname`='$data[1]',`lname`='$data[2]',`age`='$data[3]' WHERE =$data[0]";
	try{
		
		$update_Result= mysqli_query($connect, $update_Query);
		
		if($update_Result)
		{
			if(mysqli_affected_rows($connect)>0)
			{
				echo 'Data Updated';
			}else{
				echo 'Data Not Updated';
			}
		}
		
	} catch (Exception $ex){
		echo 'Error Update' .$ex->getMessage();
	}
	}
?>

<!DOCTYPE Html>
<html>
<head>
<title>EDIT PAGE</title>
<style>
input[type=text], input[type=number] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid rgb(141, 137, 137);
    border-radius: 4px;
    box-sizing: border-box;
	
}

input[type=submit]{
    width: 10%;
    background-color: #123C2F;
    color:#8FCFBB;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

#logButton
{
width:130px;
height:45px;
border:none;
border-radius:10px;
padding-left:7px;
color:blue;
font-family:"Roboto" ,sans-serif;
font-size:18px;
background: #8F6C57;
text-align:center;
text-decoration: none;
cursor:pointer;
box-shadow: 0 0 10px rgba(0,0,0,0.1);
-webkit-tranition-duration: 0.3s;
transition-duration:0.3s;
-webkit-transition-property: box-shadow, transform;
transition-property:box-shadow, transform;
}

#logButton:hover, #logButton:focus, #logButton:active{
    box-shadow:0 0 20px rgba(0,0,0,0.5);
    -webkit-transform:scale(1.1);
    transform:scale(1,1);
}



</style>
</head>
<body style="background-color:#CA8054;">
	<form action="edit3.php" method="post"><center>
	<input type="number" name="id" placeholder="Id" value="<?php echo $id;?>"><br><br>
	<input type="text" name="fname" placeholder="First Name" value="<?php echo $fname;?>"><br><br>
	<input type="text" name="lname" placeholder="Last Name" value="<?php echo $lname;?>"><br><br>
	<input type="number" name="age" placeholder="Age" value="<?php echo $age;?>"><br><br>
	<div>
	<input type="submit" name="insert" value="Add" id="logButton">
	<input type="submit" name="update" value="Update" id="logButton">
	<input type="submit" name="delete" value="Delete" id="logButton">
	<input type="submit" name="search" value="Find" id="logButton">
	</div></center>
</body>
</html>
