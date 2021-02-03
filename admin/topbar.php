
	<nav class="navbar navbar-default navbar-fixed-top box-shadow">
		<div class="navbar-header">
			<button  style="background-color:yellow"class="navbar-toggle btn btn-warning " data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                       
			</button>
			<div  class="navbar-brand" >
				<span style="text-shadow: 1px 1px red;color:white;text-align:center;"class="hidden-xs hidden-sm"><img class="img-circle"src="../images/system/logo.png"><?php echo $college_name;?> <?php echo $system_name;?> </span>
				<span style="text-shadow: 1px 1px red;color:white;text-align:left;"class="hidden-md hidden-lg"><img class="img-circle"src="../images/system/logo.png"> <?php echo $college;?> <?php echo $system;?> </span>
				<span style="color:white;text-align:right;font-size:12px;"class="hidden-md hidden-lg"><a href="logout.php" ><i class=" fa fa-sign-out"></i> <span>Logout</span></a></span>
			</div>
        </div>
				<!-- User information, the dropdown menu, going full screen -->

        <div style="padding-right:10px;"class="collapse navbar-collapse pull-right">
			<span  style="color:white;font-family:verdana;"> <?php echo $slogan;?> </span>&nbsp &nbsp &nbsp
			<span style="color:yellow" class="dropdown-toggle" id="user_dropdown" data-toggle="dropdown">
				<img class="img-circle hidden-sm hidden-xs" src="../images/admin/super-admin.jpg" style="width:50px;height:50px">
						 <?php echo $admin_fetch['name'];?>
					<a href="admin-dashboard?admin-profile" class="user-info-handle  pull-right"></a>
			</span>
					
			<div class="well dropdown-menu" role="menu" aria-labelledby="user_dropdown">
				<a style="background-color:	#006699"href="profile.php" class=" list-group-item text-center"><i class="fa fa-user"></i> Profile</a>
				<a style="background-color:	#006699"href="messages.php" class=" list-group-item text-center"><i class="fa fa-user"></i> Messages</a>
				<a style="background-color:	#006699"href="logout.php" class="list-group-item text-center"><i class="fa fa-sign-out"></i> Logout</a>
			</div>
        </div>
					<!--Logout section -->
        
	</nav>