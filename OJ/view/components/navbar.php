<?php
    
?>

<nav class="navbar navbar-light bg-light navbar-expand-lg navbar-default">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
			<a class="navbar-brand" href="index.php"><?php echo "0n1in3 Judg3";?></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav mr-auto">
				<li class="nav-item"><a class="nav-link" href="problemset.php"><?php echo "ProblemSet";?></a></li>
				<li class="nav-item"><a class="nav-link"href="status.php"><?php echo "Status";?></a></li>
				<li class="nav-item"><a class="nav-link"href="ranklist.php"><?php echo "RankList";?></a></li>
				<li class="nav-item"><a class="nav-link"href="contestlist.php"><?php echo "Contest";?></a></li>
				
				<?php /*if ($FORUM_ENABLED) {?>
				<li><a href="discuss.php"><?php echo L_FORUM;?></a></li>
				<?php }*/ ?>
				
				<?php /* if ($VJ_ENABLED) {*/?>
				<!-- <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo L_VJ;?> <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="problsemset_vj.php"><?php echo "L_PROB_SET";?></a></li>
						<li><a href="status_vj.php"><?php echo "L_STATUS";?></a></li>
					</ul>
				</li> -->
				<?/*php } */?>
				
			</ul>
			<?php if (isset($_SESSION['user_id'])) { 
				$navUsrName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : $_SESSION['user_id'];?>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="./mail.php"><i class="fa fa-inbox"></i> <?php /* echo L_INBOX." ".checkmail($pdo);*/?></a></li>
				<li class=" nav-item dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> <?php echo $navUsrName;?> <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
                        <li ><a class="dropdown-item" href="./modifyinfo.php"><i class="fa fa-edit"></i> <?php echo "L_MOD_INFO";?></a></li>
                        <li><a class="dropdown-item" href="./userinfo.php"><i class="fa fa-at"></i> <?php echo "User Info";?></a></li>
                        <li><a class="dropdown-item" href="./status.php?uid=<?php echo $_SESSION['user_id'];?>"><i class="fa fa-history"></i> <?php echo "Submit History";?></a></li>
                        <?php if (isset($_SESSION['is_operator']) && $_SESSION['is_operator']) {?>
                        <li class="divider"></li>
                        <li><a class="dropdown-item" href="./admin/index.php"><i class="fa fa-cogs"></i> <?php echo "Control Panel";?></a></li>
                        <?php } ?>
                        <li class="divider"></li>
                        <li><a class="dropdown-item" href="./api/logout.php"><i class="fa fa-sign-out"></i> <?php echo "Logout";?></a></li>
					</ul>
				</li>
			</ul>
			<?php } else { ?>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item"><a class="nav-link"href="./registerpage.php"><i class="fa fa-user-plus"></i> <?php echo "Sign Up";?></a></li>
				<li class="nav-item"><a class="nav-link"href="./login.php"><i class="fa fa-sign-in"></i> <?php echo "Sign In";?></a></li>
			</ul>
			<?php } ?>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>