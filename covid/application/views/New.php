<?php for ($i = 0; $i < count($news); $i++) { ?>
    <div class="card mb-3">
        <div class="card-body">
            <h3 class="card-title"><?= $news[$i]['title'] ?></h3>
            <h6 class="card-subtitle mb-2 text-muted"><?= $news[$i]['date'] ?></h6>
            <p class="card-text"><?= highlight_keywords($news[$i]['content'], $keywords); ?></p>
        </div>
    </div>
<?php } ?>