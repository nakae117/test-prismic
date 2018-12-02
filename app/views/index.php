	
<?php
$items = $WPGLOBAL['items'];
?>
<?php include_once 'header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary-secondary active">
                        <input type="radio" name="options" value="Todos" id="option1" autocomplete="off" checked> Todos
                    </label>
                    <label class="btn btn-secondary-secondary">
                        <input type="radio" name="options" value="PHP" id="option2" autocomplete="off"> PHP
                    </label>
                    <label class="btn btn-secondary-secondary">
                        <input type="radio" name="options" value="Desarrollo" id="option3" autocomplete="off"> Desarrollo
                    </label>
                    <label class="btn btn-secondary-secondary">
                        <input type="radio" name="options" value="Web" id="option3" autocomplete="off"> Web
                    </label>
                    <label class="btn btn-secondary-secondary">
                        <input type="radio" name="options" value="Laravel" id="option3" autocomplete="off"> Laravel
                    </label>
                    <label class="btn btn-secondary-secondary">
                        <input type="radio" name="options" value="Diseño" id="option3" autocomplete="off"> Diseño
                    </label>
                    <label class="btn btn-secondary-secondary">
                        <input type="radio" name="options" value="JavaScript" id="option3" autocomplete="off"> JavaScript
                    </label>
                    <label class="btn btn-secondary-secondary">
                        <input type="radio" name="options" value="Sistema" id="option3" autocomplete="off"> Sistema
                    </label>
                </div>
            </div>
        </div>
        <div class="row" id="items">
            <?php foreach ($items as $item): ?>
                <a class="col-xs-12 col-sm-6 col-md-3 col-lg-3 categoria" href="/item/<?= $item->id ?>">
                    <div>
                        <?= $item->data->title[0]->text ?>
                    </div>
                    <div>
                        <i>
                            <strong>
                                <?php
                                    foreach($item->tags as $key => $tag){
                                        if($key)
                                            echo ', ';
                                        echo $tag;
                                    }
                                ?>
                            </strong>
                        </i>
                    </div>
                    <div class="picture">
                        <img src="<?= isset($item->data->image->url) ? $item->data->image->url : '/images/star.png' ?>" class="img-fluid rounded-circle" alt="Logo">
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="/js/main.js"></script>
<?php include_once 'footer.php'; ?>