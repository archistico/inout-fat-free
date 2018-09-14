<div class="row">
    <div class="col-md-12">
        <p>Nuovo movimento</p>
        <?php foreach (($categoria1?:[]) as $item): ?>
            <a class="btn btn-info btn-block btn-lg" href="<?= (Base::instance()->alias('nuovo')) ?>/<?= ($item['id']) ?>"><?= ($item['descrizione']) ?></a>
        <?php endforeach; ?>
    </div>
</div>