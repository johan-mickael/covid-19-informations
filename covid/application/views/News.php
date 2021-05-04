<?php
defined('BASEPATH') or exit('No direct script access allowed');
$kw = array_to_string($keywords);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?= $description ?>">
	<meta name="keyword" content="<?= $kw ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/bootstrap/css/bootstrap.min.css") ?>">
	<title><?= $title ?></title>
</head>

<style>
	.btn-link {
		font-weight: bold;
	}

	.card-header {
		background-color: #fdfdfd;
	}

	.my-h2 {
		font-size: 1.2rem;
		cursor: pointer;
	}
</style>

<body>
	<div class="container-fluid">
		<?php include('Navbar.php') ?>
		<div class="row-content">
			<h1><?= $heading ?></h1>
			<hr class="mb-5">
			<div class="row">
				<div class="col-md-8">
                    <?php include('New.php') ?>
				</div>
				<div class="col-md">
					<h2 class="">Focus</h2>
					<hr class="mb-5">
					<?php for ($i = 0; $i < count($focus['label']); $i++) { ?>
						<p class="font-weight-bold"><a href="<?= base_url($focus['link'][$i]) ?>"><?= $focus['label'][$i] ?></a></p>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url('assets/bootstrap/js/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>

</html>