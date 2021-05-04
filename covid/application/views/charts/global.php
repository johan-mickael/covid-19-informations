<script src="<?= base_url('assets/chart/Chart.min.js') ?>"></script>
<script src="<?= base_url('assets/chart/utils.js') ?>"></script>

<div id="container" style="width: 100%;">
    <canvas id="canvas"></canvas>
</div>

<?php
$country = extract_from_array($data, 'country_name');
$active = extract_from_array($data, 'active_case');
$death = extract_from_array($data, 'death');
$recovered = extract_from_array($data, 'recovered');
$confirmed = extract_from_array($data, 'confirmed');
?>

<script>
    var color = Chart.helpers.color;
    var horizontalBarChartData = {
        labels: <?= $country ?>,
        datasets: [{
            label: 'Cas actifs',
            backgroundColor: "#ad29ff73",
            borderColor: window.chartColors.violet,
            borderWidth: 1,
            data: <?= $active ?>
        }, {
            label: 'Décès',
            backgroundColor: "#f768687a",
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: <?= $death ?>
        }, {
            label: 'Guéris',
            backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
            borderColor: window.chartColors.green,
            borderWidth: 1,
            data: <?= $recovered ?>
        }, {
            label: 'Confirmés',
            backgroundColor: color(window.chartColors.gray).alpha(0.5).rgbString(),
            borderColor: window.chartColors.gray,
            borderWidth: 1,
            data: <?= $confirmed ?>
        }]

    };

    window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myHorizontalBar = new Chart(ctx, {
				type: 'horizontalBar',
				data: horizontalBarChartData,
				options: {
					elements: {
						rectangle: {
							borderWidth: 2,
						}
					},
					responsive: true,
					legend: {
						position: 'right',
					},
					title: {
						display: true,
						text: 'Statistiques du covid-19 dans le monde entier'
					}
				}
			});

		};
</script>