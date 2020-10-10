<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="sub.dashboard.php"><b>TBOY COMPUTER TECHNOLOGY</b></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav" >
			<?php if(isset($_SESSION['Sub_Admin'])){
?>
<ul class="navbar-nav" >
				<li class="nav-item active">
					<a class="nav-link" href="sub.dashboard.php"><i class="fa fa-home"></i> Home<span class="sr-only">(current)</span></a>
		</li>
		
				<li class="nav-item active">
					<a class="nav-link" href="sub.record.php"><i class="fa fa-pen"></i> Records</a>
				</li>
				

				<li class="nav-item active">
					<a class="nav-link" href="sub.logout.php"><i class="fa fa-user"></i> Logout</a>
				</li>
			</ul>
<?php
			}?>
			
			
		</div>
		
	</nav>