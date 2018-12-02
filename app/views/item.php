<?php
$item = $WPGLOBAL['item'];
?>
<?php include_once 'header.php' ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <a href="/" class="btn ">Regresar</a>
                <hr>
                <div>
                    <img src="<?= $item['img'] ?>" width="60px" class="img-fluid rounded-circle" alt="Logo">
                    <strong>Item:</strong> <?= $item['name'] ?> <br>
                </div>
                <div>
                    <p>
                        <strong>Categorias:</strong>&nbsp;
                        <?php
                            foreach($item['category'] as $key => $tag){
                                if($key)
                                    echo ', ';
                                echo $tag;
                            }
                        ?>
                    </p>
                    <strong>Descripción:</strong>
                    <p>
                        <?= $item['description'] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php include_once 'footer.php' ?>