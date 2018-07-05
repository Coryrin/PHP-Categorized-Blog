<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>PHP Blog</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include('conf/conf.php'); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container">
		<a class="navbar-brand" href="<?php echo ROOT_URL; ?>">PHP Blog</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
			<ul class="navbar-nav">

				<li class="nav-item active">
				<a class="nav-link" href="<?php echo ROOT_URL ?>">Home <span class="sr-only">(current)</span></a>
				</li>

				<li class="nav-item">
				<a class="nav-link" href="<?php echo ROOT_URL ?>create_post.php">Create Post</a>
				</li>

				<form class="form-inline" action="post_search.php" method="POST">
					<input class="form-control mr-sm-2" type="search" placeholder="Search posts" name="userSearch" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="searchSubmit">Search</button>
				</form>

			</ul>
	</div>
</div>
</nav>


<?php include('filter_nav.php'); ?>