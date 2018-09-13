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