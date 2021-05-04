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
        <?php include('Navbar.php') ?>
        <div class="login_form p-3 shadow-sm">
            <?php echo form_open_multipart('News/do_upload'); ?>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Titre</label>
                <textarea name="title" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                <small id="emailHelp" class="form-text text-muted">Ecrivez le titre de l'actualité à publier.</small>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Contenu</label>
                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <small id="emailHelp" class="form-text text-muted">Ecrivez le contenu de l'actualité à publier.</small>
            </div>

            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" name="imagelink" size="20" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choisir une image</label>
                    <small id="emailHelp" class="form-text text-muted">Choisissez l'image (gif|jpg|png|jpeg) pour illustrer la publication.</small>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Date</label>
                <input type="datetime-local" name="date" class="form-control form-control" id="colFormLabelSm" placeholder="Date">
                <small id="emailHelp" class="form-text text-muted">Choisissez la date de publication.</small>
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">Publier</button>

            <?php if ($message['text'] != null) { ?>
                <div class="alert p-1 text-center mt-3 alert-<?= $message['type'] ?>" role="alert">
                    <?= $message['text'] ?>
                </div>
            <?php } ?>

            </form>
        </div>
    </div>
    <script src="<?= base_url('assets/bootstrap/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>

</html>