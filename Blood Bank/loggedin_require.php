
        <title>Blood Bank</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,zoom:1.0">
    		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" style="color:black;padding:15px 30px 15px 20px;">Warangal Donars</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li><a class="active" href="index.html">Home</a></li>
						<li><a href="bank_login.php">Blood Bank Login</a></li>
            <li>
              <a href="#" data-toggle="dropdown">More Help  <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a class="help" href="view_needs.php">View Needs</a></li>
                <li><a class="help" href="post_need.php">Post a need</a></li>
                <li><a class="help" href="contact.php">Contact Us</a></li>
              </ul>
            </li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li style="padding-top:8px;padding-left:10px;">
							<form method="get" action="http://www.google.com/search">
								<input type="search" class="form-control header-search" name="q" size="31" maxlength="255" value="" placeholder="Search…" tabindex="1"/> <input type="submit" value="Google Search" hidden/>
							</form>
						</li>
            <li><a href="user_profile.php"><span class="glyphicon glyphicon-user"></span><?php echo "  ".$user;?></a></li>
						<li><a href="user_loggedout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
