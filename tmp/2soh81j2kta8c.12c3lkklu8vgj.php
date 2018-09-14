<div class="row">
    <div class="col-md-12">
        <p>Nuovo movimento</p>
        <?php foreach (($categoria2?:[]) as $item): ?>
            <a class="btn btn-info btn-block btn-lg" href="<?= (Base::instance()->alias('nuovo')) ?>/<?= ($cat1) ?>/<?= ($item['id']) ?>"><?= ($item['cat1']) ?> / <?= ($item['cat2']) ?></a>
        <?php endforeach; ?>
    </div>
</div>