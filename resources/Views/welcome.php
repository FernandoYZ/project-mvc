<!DOCTYPE html>
<html lang="<?= config('language') ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Welcome">

        <title>Proyecto - Bienvenido</title>
        
        <!--================================= Fonts: Roboto ====================================-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <!--====================================================================================-->
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <!--======================== Integración de Tailwind con CND ===========================-->
        <script src="https://cdn.tailwindcss.com"></script>
        <!--====================================================================================-->
        <script src="<?= media_js('tailwind.js') ?>"></script>
        <!--====================================================================================-->
        <link href="<?= media_css('tailwind.css') ?>" type="text/tailwindcss" rel="stylesheet">
        <!--====================================================================================-->
    </head>
<body>
    <?php include layout('partials.header'); ?>
    <div class="container mt-5">
        <?= $content ?? '' ?>
    </div>
    <?php include layout('partials.footer'); ?>
    <script src="<?= media_js('main.js') ?>" type="module"></script>
</body>
</html>
