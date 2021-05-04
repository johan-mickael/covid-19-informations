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
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/chart/Chart.min.css") ?>">
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

	.card-body {
		padding: 0.5rem;
	}

	.card {
		border: 2px solid;
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
					<h3 class="mb-5">Cette <strong>statistique</strong> montre le nombre de personnes infectées par le <strong>coronavirus</strong> <strong>Covid-19</strong> dans le monde entier.</h3>
					<div class="table-data shadow-sm p-4">
						<div class="sum mb-5" style="display: flex;flex-wrap: wrap;justify-content: space-around;">
							<div class="card shadow mb-3" style="width: 10rem; border-color:#ad29ff">
								<div class="card-body" style="color:#ad29ff;">
									<h2 class="card-title text-center"><?= $data_sum['active_case'] ?></h2>
									<h6 class="card-subtitle mb-2 text-muted text-center">Total cas actifs</h6>
								</div>
							</div>

							<div class="card shadow mb-3" style="width: 10rem; border-color:#f76868">
								<div class="card-body" style="color:#f76868">
									<h2 class="card-title text-center"><?= $data_sum['death'] ?></h2>
									<h6 class="card-subtitle mb-2 text-muted text-center">Total décès</h6>
								</div>
							</div>

							<div class="card shadow mb-3" style="width: 10rem; border-color:#2e9e2e">
								<div class="card-body" style="color:#2e9e2e">
									<h2 class="card-title text-center"><?= $data_sum['recovered'] ?></h2>
									<h6 class="card-subtitle mb-2 text-muted text-center">Total guérison</h6>
								</div>
							</div>

							<div class="card shadow mb-3" style="width: 10rem; border-color:gray">
								<div class="card-body" style="color:gray">
									<h2 class="card-title text-center"><?= $data_sum['confirmed'] ?></h2>
									<h6 class="card-subtitle mb-2 text-muted text-center">Total confirmés</h6>
								</div>
							</div>
						</div>
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th scope="col">Pays</th>
									<th scope="col">Cas actifs</th>
									<th scope="col">Décès</th>
									<th scope="col">Guéris</th>
									<th scope="col">Cas confirmés</th>
								</tr>
							</thead>
							<tbody>
								<?php for ($i = 0; $i < count($data); $i++) { ?>
									<tr>
										<th scope="row"><?= $data[$i]['country_name'] ?></th>
										<td><?= $data[$i]['active_case'] ?></td>
										<td><?= $data[$i]['death'] ?></td>
										<td><?= $data[$i]['recovered'] ?></td>
										<td><?= $data[$i]['confirmed'] ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						<?php include("charts/global.php"); ?>
					</div>

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