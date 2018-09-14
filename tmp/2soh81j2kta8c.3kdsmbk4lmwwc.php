<div class="row">
    <div class="col-md-12">
        <ul>
            <?php foreach (($categoria4?:[]) as $item): ?>
                <li><?= ($item['cat1']) ?>/<?= ($item['cat2']) ?>/<?= ($item['cat3']) ?>/<?= ($item['cat4']) ?> (<?= ($item['id']) ?>) </li>
            <?php endforeach; ?>
        </ul>

        <hr>
        <ul>
            <?php foreach (($categoria1?:[]) as $item): ?>
                <li><?= ($item['descrizione']) ?> (<?= ($item['id']) ?>)</li>
            <?php endforeach; ?>
        </ul>

        <ul>
            <?php foreach (($categoria2?:[]) as $item): ?>
                <li><?= ($item['madre']) ?>/<?= ($item['descrizione']) ?> (<?= ($item['id']) ?>) </li>
            <?php endforeach; ?>
        </ul>

        <ul>
            <?php foreach (($categoria3?:[]) as $item): ?>
                <li><?= ($item['cat1']) ?>/<?= ($item['cat2']) ?>/<?= ($item['descrizione']) ?> (<?= ($item['id']) ?>) </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>