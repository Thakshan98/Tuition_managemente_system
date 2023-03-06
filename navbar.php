
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button  class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span  class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">     
		<div class="navbar-nav ms-auto">			
			<?php
				if(isset($_SESSION["TID"]))
				{
					echo'
					<a class="nav-link active" aria-current="page" href="home.php">Home</a>
					<a class="nav-link" href="change_pass.php">Settings</a>
					<a class="nav-link" href="logout.php">Logout</a>
					';
				}				
			?>
		</div>
    </div>
  </div>
</nav>
