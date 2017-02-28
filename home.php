<?php
session_start();
$user=$_SESSION['user'];
if($_SESSION['user']=="")
{
header('location:index.php');
}
else
{
error_reporting(0);
$pExt=array('jpg','png','jpeg','bmp','gif');
$sc=opendir("User_Data/$user");
while($file=readdir($sc))
{	
	if($file!='.' && $file!='..')
	{
		$filedata=pathinfo($file);
		if(in_array($filedata['extension'], $pExt))
		{
		$img=$filedata['basename'];
		//print_r($filedata);
		}
		
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Slam book</title>
<style>
body{margin-top:-2px}
table{margin:auto}
a{border-radius:8px;text-decoration:none;margin-left:2%;font-size:16px}
a:hover{color:#00FF00;background:#FF0000;padding:5px}
img{margin-top:-1px;margin-bottom:-5px}
</style>
</head>
<body style="background-image:url('theme/<?php
		@$conTheme=$_REQUEST['thm'];
		if($conTheme)
		{
			$fo=fopen("User_Data/$user/theme","w");
			fwrite($fo,$conTheme);
		}
		@$f=fopen("User_Data/$user/theme","r");
		@$fr=fread($f, filesize("User_Data/$user/theme"));
		echo $fr;
		?>');
		">
<form method="post">
<table width="100%" height="100%" border="0" bordercolor="#CCCCCC" cellpadding="0" cellspacing="0" align="left">
  <tr style="background-color:#660066">
    <td height="30" colspan="2">
        <span style="color:#FFFF00">Welcome <?php echo @$_SESSION['user'];?></span>



<a href="logout.php"style="color:#FF0000">Logout</a> 
</td>		
		
  </tr>
  <tr>
  <td style="background-color:#CCCCCC"></td>
  
    <td height="119" colspan="2" style="background-color:#CCCCCC">
	<span><a href="home.php?option=pass">Change_Password</a> 
	<a href="home.php?option=theme">Change_Theams</a>	
	</span>

	</td>
  </tr>
  <tr>
    <td width="198" align="center" valign="top" style="background-color:#FFFF80;padding:10px">
	<a href="home.php?option=compose">COMMENTS</a><br/><br/>
<hr>
	<a href="home.php?option=inbox">INBOX</a><br/><br/>
	<hr>
	<a href="home.php?option=sent">SENT</a><br/><br/>
	<hr>
		<a href="home.php?option=draft">SAVED COMMENTS</a><br/><br/>
		
	</td>
	<td width="878" height="516" valign="top" style="background-color:#CCFFFF">
	<?php
	@$opt=$_GET['option'];
	switch($opt)
	{
	
	case 'pass';
	include('changepassword.php');
	break;
	case 'theme';
	include('changetheme.php');
	break;
	case 'admin';
	include('admin.php');
	break;
	case 'compose';
	include('compose.php');
	break;
	case 'inbox';
	include('inbox.php');
	break;
	case 'sent';
	include('sent.php');
	break;
	case 'draft';
	include('draft.php');
	break;	
	}
	//for inbox
	$coninb=$_GET['coninb'];
		if(isset($coninb))
		{
		$fo=fopen("User_Data/$user/inbox/$coninb","r");
		$filesize=filesize("User_Data/$user/inbox/$coninb");
		$msg=fread($fo,$filesize);
		echo $msg;
		}
	//for sent
		$consent=$_GET['consent'];
		if(isset($consent))
		{
		$fo=fopen("User_Data/$user/sent/$consent","r");
		$filesize=filesize("User_Data/$user/sent/$consent");
		$msg=fread($fo,$filesize);
		echo $msg;
		}
		//for trash
		$contrsh=$_GET['contrs'];
		if(isset($contrsh))
		{
		$fo=fopen("User_Data/$user/trash/$contrsh","r");
		$filesize=filesize("User_Data/$user/trash/$contrsh");
		$msg=fread($fo,$filesize);
		echo $msg;
		}
		
		$condrft=$_GET['condrft'];
		if(isset($condrft))
		{
		$fo=fopen("User_Data/$user/draft/$condrft","r");
		$filesize=filesize("User_Data/$user/draft/$condrft");
		$msg=fread($fo,$filesize);
		echo $msg;
		}

		
	?>	</td>
  </tr>
  <tr>
    <td colspan="2" align="center">Developed By ITA </td>
  </tr>
  </form>
</table>
</body>
</html>
<?php
}
?>
