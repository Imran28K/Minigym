<!doctype html>
<html lang="en">

<head>
	<title>Mini Gym</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<link rel="stylesheet" href="/web coursework/site.css"/>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<style>
	.button {
		background-color: transparent;
		color: darkslategrey;
		padding: 6px;
		border: 2px solid darkslategray;
	}

	.button:hover {
		background-color: darkslategray;
		color: white;
	}
	.space{
		margin: 10px;
	}
</style>

<body class="bgColor">
	<header>
		<nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
			<div class="container">
				<a class="navbar-brand" href="/web coursework/customerProfile.php"><strong>Your Profile</strong></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="navbar-collapse collapse d-sm-inline-flex flex-sm-row-reverse">
					<ul class="navbar-nav flex-grow-1">
						<li class="space">
							<a class="nav-link text-dark" href="/web coursework/landingPage.php">
								<img border="0" alt="User Icon" src="/web coursework/homeIcon.png" width="30" height="30">
							</a>
						</li>
						<li class="space">
							<form action="customerLogin.php">
								<button class="button">Logout</button>
							</form>
						</li>
						
					</ul>
				</div>
			</div>
		</nav>
	</header>