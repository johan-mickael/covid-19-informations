<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/bootstrap/css/bootstrap.min.css") ?>">
    <title>Gestion des statistiques du Covid-19</title>
</head>

<body>
    <div class="container p-4">
        <div class="login_form p-3 shadow-sm">
        <h1>Gestion des statistiques du Covid-19</h1>
        <h3>Connectez-vous en tant que super utilisateur pour gérer les <a href="https://covid-1010.herokuapp.com/informations-covid-19/statistique-du-covid-19-a-madagascar-et-dans-le-monde">contenus</a>.</h3>
        <hr class="mb-4">
            <?= form_open('Login/login') ?>

            <div class="form-group">
                <label for="exampleInputEmail1">Nom d'utilisateur</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="exemple: admin">
                <small id="emailHelp" class="form-text text-muted">Entrez votre nom d'utilisateur.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="********">
                <small id="emailHelp" class="form-text text-muted">Entrez votre mot de passe.</small>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>

            <?= form_close() ?>
            <?php if ($message['text'] != null) { ?>
                <div class="alert alert-<?= $message['type'] ?> p-2 mt-3 text-center" role="alert">
                    <?= $message['text'] ?>
                </div>
            <?php } ?>
        </div>

    </div>
    <script src="<?= base_url('assets/bootstrap/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>

</html>