

<div class="container">
    <div class="row">
    <div class="col-lg-12 text-center">
        <h1 class="mt-5">Glossary</h1>
    </div>
    </div>
    <div class="row">
        <table class="table table-striped">
        <?php foreach ($model as $item) : ?>
            <tr>
                <td><?= $item->term ?></td>
                <td><?= $item->definition ?></td>
                
            </tr>
        <?php endforeach; ?>
    </div>
</div>
