<!DOCTYPE html>
<html>
<head>
	<?php require_once("./view/components/header.php"); ?> 
	<title><?php echo "0n1in3 Judg3";?></title>
</head>	
<body style="background:url(./resource/pic/loginbg.png);">

    <div class="container" style="max-width:400px; padding-top:61px;">
		<div class="panel" style="padding:20px 20px;">
			<form action="./api/user_login.php" method="post">
			<h2><?php echo "Please Login";?></h2>
			<label class="control-label">User ID</label>
			<input name="username" class="form-control" placeholder="user ID" autofocus="" type="text"><br/>
			<label class="control-label">Password</label>
			<input name="password" class="form-control" placeholder="password" type="password"><br/>
			
			<?php //require_once('./include/pageauth_post.php'); ?>
		
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
			</form>
		</div>
    </div> <!-- /container -->
  
</body>
</html>