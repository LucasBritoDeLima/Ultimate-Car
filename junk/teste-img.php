<?php
if(isset($_POST['submit'])) {
	$DB_host = "localhost";
	$DB_user = "root";
	$DB_pass = "";
	$DB_name = "testing";
 
	try
	{
	 $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
	 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
	 $name = $_POST['name'];
	 $temp = explode(".", $_FILES["avatar"]["name"]);
	 $newfilename = round(microtime(true)) . '.' . end($temp);
	 move_uploaded_file($_FILES["avatar"]["tmp_name"], "images/" . $newfilename);
		$avatar = "/images/" . $newfilename;
		$stmt = $DB_con->prepare("INSERT INTO avatars(name, avatar) VALUES(:name, :avatar)");
		$stmt->bindparam(":name",$name);
		$stmt->bindparam(":avatar",$avatar);
		$stmt->execute();
	}
	catch(PDOException $e)
	{
	 echo $e->getMessage();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload with PDO </title>
<style type="text/css">
	.container {
		width: 960px;
		margin : 0 auto;
	}
	.container fieldset { padding: 40px;  }
	.container fieldset legend { font-size: 25px; font-weight: bold;  }
	.container fieldset table { font-size: 20px; width: 100%; float: left;  }
	.container fieldset table .text.file { padding: 0;  }
	.container fieldset table .text {     width: 100%;
    padding: 5px;
    font-size: 18px; }
    .myButton { font-size: 20px;
    padding: 5px 20px;
    background: #0cacb7;
    border-radius: 5px;
}
</style>
</head>
	<body>
		<div class="container">
		<fieldset>
		<legend>Image Upload with PDO</legend>
                <form method="post"  action="teste-img.php" enctype="multipart/form-data">
	        <table>
	            <tr><td>Name</td><td>:</td><td><input type="text" name="name" class="text" required="required" value=""/></td></tr>
	             <tr><td>Avatar</td><td>:</td><td><input type="file" name="avatar"  class="text file" required="required" value=""/></td></tr>
	            <tr><td></td><td></td><td><input type="submit" class="myButton" value="Save" name="submit" /></td></tr>
	     </table>
	  </form>
	  </fieldset>
		</div>
	  </body>
  </html>