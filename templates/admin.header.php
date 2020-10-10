<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="admin.dashboard.php"><b>TBOY COMPUTER TECHNOLOGY</b></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<?php if(isset($_SESSION['Admin'])){
?>
<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="admin.dashboard.php"><i class="fa fa-home"></i> Home<span class="sr-only">(current)</span></a>
		</li>
		<li class="nav-item active">
					<a class="nav-link" href="admin.student.php"><i class="fa fa-pen"></i> Students</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="admin.record.php"><i class="fa fa-pen"></i> Records</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="admin.notification.php"><i class="fa fa-pen"></i> Notication</a>
				</li>

				<li class="nav-item active">
					<a class="nav-link" href="admin.logout.php"><i class="fa fa-user"></i> Logout</a>
				</li>
			</ul>
<?php
			}?>
			
			
		</div>
		
	</nav>