<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php 
if(isset($_POST['save']))
{
	
	$e=$_POST['e'];
	$p=$_POST['p'];
	if(file_exists('User_Data/$e'))
	{
	$msg="<font color='green' face='cursive'>User Already Exists</font>";
	}
	else
	{
	mkdir("User_Data/$e");
	mkdir("User_Data/$e/inbox");
	mkdir("User_Data/$e/sent");
	mkdir("User_Data/$e/draft");
	mkdir("User_Data/$e/spam");
	mkdir("User_Data/$e/trash");
	//mkdir("User_Data/$e/password");
	//echo $_FILES['img']['name'];
	$fo=fopen("User_Data/$e/$p","w");
	$fo1=fopen("User_Data/$e/profile","w");
	fwrite($fo1,"Email:$e Password:$p");
	$msg="<font color='green' face='cursive'>You Are Registered please log in..........</font>";
	}
}

?>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
	<table border="0" align="center" cellpadding="3">
	<caption><h2>Fill This Form.......</h2></caption>
		<form method="post" enctype="multipart/form-data">
			<tr>
				<td colspan="2"><?php echo @$msg;?></td>
			</tr>
			
			<tr>
				<td>Your Reg.No</td>
				<td><input type="number" placeholder="20135060xx" name="e" required></td>
			</tr>
			<tr>
				<td>Your Password</td>
                <td><input type="password" placeholder="Enter Your Password" name="p" required></td>
            </tr> 
         <tr>
                <td colspan="2" align="center"><input type="submit" value="Save" name="save">
                                               <input type="reset" value="reset"></td>
            </tr>
        </form>
    </table>
</body>
</html>