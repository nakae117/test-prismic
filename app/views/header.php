<?php
if (!isset($title)) {
    $title = SITE_TITLE;
}
if (!isset($description)) {
    $description = SITE_DESCRIPTION;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?= $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?= $description; ?>">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
        <link href="/stylesheets/reset.css" rel="stylesheet">
        <!-- <link href="/stylesheets/style.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
        <link href="/stylesheets/estilo.css" rel="stylesheet">
        <link href="/images/punch.png" rel="icon" type="image/png">
        <script src="/vendor/jQuery/jquery-3.2.1.js"></script>
        <? /* Required for previews and experiments */ ?>
        <script>
            window.prismic = {
                endpoint: '<?= PRISMIC_URL ?>'
            };
        </script>
        <!-- <script src="https://static.cdn.prismic.io/prismic.js"></script> -->
        <script src="/vendor/popper/popper.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>