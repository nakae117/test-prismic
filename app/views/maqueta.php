<?php include_once 'header.php' ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary-secondary active">
                        <input type="radio" name="options" value="Todos" id="option1" autocomplete="off" checked> Todos
                    </label>
                    <label class="btn btn-secondary-secondary">
                        <input type="radio" name="options" value="Categoria 1" id="option2" autocomplete="off"> Categoria 1
                    </label>
                    <label class="btn btn-secondary-secondary">
                        <input type="radio" name="options" value="Categoria 2" id="option3" autocomplete="off"> Categoria 2
                    </label>
                    <label class="btn btn-secondary-secondary">
                        <input type="radio" name="options" value="Categoria 3" id="option3" autocomplete="off"> Categoria 3
                    </label>
                </div>
            </div>
        </div>
        <div class="row" id="items"></div>
    </div>
    <script src="/js/maqueta.js"></script>
<?php include_once 'footer.php' ?>