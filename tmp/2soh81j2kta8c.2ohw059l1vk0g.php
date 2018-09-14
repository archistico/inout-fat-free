<div class="row">
    <div class="col-md-12">
        <p>Nuovo movimento</p>
        <?php foreach (($categoria3?:[]) as $item): ?>
            <a class="btn btn-info btn-block btn-lg" href="<?= (Base::instance()->alias('nuovo')) ?>/<?= ($cat1) ?>/<?= ($cat2) ?>/<?= ($item['id']) ?>"><?= ($item['cat1']) ?> / <?= ($item['cat2']) ?> / <?= ($item['cat3']) ?></a>
        <?php endforeach; ?>
    </div>
</div>