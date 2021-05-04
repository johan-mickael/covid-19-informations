<!DOCTYPE html>
<html lang="en">
<?= $token ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/bootstrap/css/bootstrap.min.css") ?>">
    <title>Gestion des évolutions du covid-19</title>
</head>

<body>
    <div class="container p-4">
        <?php include('Navbar.php') ?>
        <div class="form-div p-3 shadow-sm">
            <h1>Gestion des évolutions du covid-19</h1>
            <h3>Entrez dans ce formulaire les chiffres de <a href="https://covid-1010.herokuapp.com/informations-covid-19/statistique-du-covid-19-a-madagascar-et-dans-le-monde">l'évolution des statistiques du Covid-19</a></h3>
            <hr class="mb-4">
            <?= form_open('admin/inserer-evolution-covid-19') ?>
            <input type="hidden" name="token" value="<?= $token ?>" />
            <div class="form-group row">
                <label class="col-sm-2 col-form-label col-form-label">Pays</label>
                <div class="col-sm-10">
                    <select class="custom-select form-control text-capitalize" name="country_id">
                        <?php for ($i = 0; $i < count($country); $i++) { ?>
                            <option value="<?= $country[$i]['id'] ?>"><?= $country[$i]['country_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Nouveaux cas</label>
                <div class="col-sm-10">
                    <input type="number" name="new" class="form-control form-control" id="colFormLabelSm" placeholder="Nombre de nouveaux cas">
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Décès</label>
                <div class="col-sm-10">
                    <input type="number" name="death" class="form-control form-control" id="colFormLabelSm" placeholder="Nombre de décès">
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Guérison</label>
                <div class="col-sm-10">
                    <input type="number" name="recovered" class="form-control form-control" id="colFormLabelSm" placeholder="Nombre de guérison">
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label">Date</label>
                <div class="col-sm-10">
                    <input type="datetime-local" name="date" class="form-control form-control" id="colFormLabelSm" placeholder="Date">
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Valider</button>

            <?= form_close() ?>

            <div class="alert alert-<?= $message['type'] ?> mt-2 p-1 text-center" role="alert">
                <?= $message['text'] ?>
            </div>
        </div>

    </div>

    <script src="<?= base_url('assets/bootstrap/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>

</html>