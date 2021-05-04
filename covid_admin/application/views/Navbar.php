<nav class="navbar navbar-expand-lg  p-3 mb-3" style="border-bottom: 2px solid">
    <h4 class="navbar-brand" href="<?= base_url('informations-covid-19/pandemie-covid-19-informations-sur-la-maladie-coronavirus') ?>">Covid-19-Gestion</h4>
    <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('admin/gestion-evolution-covid-19') ?>">
                    <h4>Statistiques <span class="sr-only">(current)</span></h4>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('admin/gestion-actualites-covid-19') ?>">
                    <h4>Actualités <span class="sr-only">(current)</span></h4>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('admin/deconnexion') ?>">
                    <h4>Déconnexion <span class="sr-only">(current)</span></h4>
                </a>
            </li>
        </ul>
    </div>
</nav>