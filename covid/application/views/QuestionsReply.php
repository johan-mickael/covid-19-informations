<div class="accordion" id="accordionExample">
    <?php for ($i = 0; $i < count($qr['question']); $i++) { ?>
        <div class="card">
            <div class="card-header" id="heading<?= $i ?>">
                <h2 class="m-1 my-h2" data-toggle="collapse" data-target="#collapse<?= $i ?>" aria-expanded="true" aria-controls="collapse<?= $i ?>">
                    <?= highlight_keywords($qr['question'][$i], $keywords) ?>
                </h2>
            </div>

            <div id="collapse<?= $i ?>" class="collapse <?php if ($i == 0) echo 'show' ?>" aria-labelledby="heading<?= $i ?>" data-parent="#accordionExample">
                <div class="card-body">
                    <?= highlight_keywords($qr['reply'][$i], $keywords) ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>