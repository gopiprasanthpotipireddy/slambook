<?php
$user=$_SESSION['user'];
if(isset($_POST['send']))
{
	$to=$_POST['to'];
	$sub=$_POST['sub'];
	$msg=$_POST['msg'];
	if(file_exists("User_Data/$to"))
	{
	//for recever
	$subj=$user." ".$sub;
	$fo=fopen("User_Data/$to/inbox/$subj","w");
	fwrite($fo,$msg);
	//for sender
	$subj1=$to." ".$sub;
	$fo1=fopen("User_Data/$user/sent/$subj1","w");
	fwrite($fo1,$msg);
	$err="<font color='green'>Massege Successfully Send</font>";
	}
	else
	{
	// for recever
	//for recever
	$subj=$to." ".$sub."Massege Failed";
	$fo=fopen("User_Data/$user/inbox/$subj","w");
	fwrite($fo,$msg);
	// for sender
	$subj1=$to." ".$sub;
	$fo1=fopen("User_Data/$user/sent/$subj1","w");
	fwrite($fo1,$msg);
	$err="<font color='green'>Massege Failed</font>";
	}
}
if(isset($_POST['save']))
{
	$sub=$_POST['sub'];
	$msg=$_POST['msg'];
	$subj=$user." ".$sub;
	$fo=fopen("User_Data/$user/draft/$subj","w");
	fwrite($fo,$msg);
	$err="<font color='blue'>Massege Successfully Save</font>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>User Free Write Your massage</title>
<style>
input{width:500px;border-radius:10px;background-color:#ffffff;color:#0000FF}
textarea{border-radius:10px;background-color:#FFFFFF;color:#0000FF}
input[type=submit]:hover{background:green}
input[type=reset]:hover{background:green}
input[type=submit]{width:100px}
input[type=reset]{width:100px}
.btn {
	padding: 8px 15px;
	font-size: 14px;
	line-height: 1.42857143;
	min-width: 160px;
	text-align: center;
	border-radius: 0;
	text-transform: uppercase;
	color:#FFFFFF;
	border: 1px solid #cccccc;
background-color: #339BEB;

	-webkit-transition: all 0.2s ease-in-out;
	-moz-transition: all 0.2s ease-in-out;
	-ms-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
}
.btn-default {
	color:#FFFFFF;
	border: 1px solid #cccccc;
	background-color:#00CC33;

	
}
.btn-default:hover {
	color: #ffffff;
background-color: #339BEB;	
	border-color: #00CC33;
}
.d{
background-image:url(theme/capture.jpg);
background-repeat:no-repeat;

}

</style>
</head>
<body>
<table border="0" width="100%" height="100%" align="center" class="d">
<form method="post">
			<tr>
				<td colspan="2" align="center"><?php echo @$err;?></td>
			</tr>
			<tr>
				<td width="57"><font color="white">To :</font></td>
				<td width="447"><input type="number" placeholder="20125060xy" name="to"></td>
			</tr>
			<tr>
				<td><font color="white">Enter your comments :</font></td>
				<td><textarea placeholder="Write Your Comments" rows="25" cols="70" name="msg"></textarea></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="Send" name="send" class="btn btn-default"/>
				<input type="submit" value="Save" name="save" class="btn btn-default">
				</td>
			</tr>
</form>
</table>			
</body>
</html>
