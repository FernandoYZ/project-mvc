<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404</title>
    <link rel="stylesheet" href="<?= media_js(); ?>/bootstrap.min.css">
    <link href="<?= media_css('main.css') ?>" rel="stylesheet">
</head>
<body>
    <?php include layout('partials.header'); ?>

    <main>
        <div class="container">
            <h1>Error 404 - Página no encontrada</h1>
            <p>Lo sentimos, la página que buscas no existe.</p>
            <a href="/">Volver a la página de inicio</a>
        </div>
    </main>

    <?php include layout('partials.footer'); ?>

    <script src="<?= media_js(); ?>/bootstrap.bundle.min.js"></script>
    <script src="/js/scripts.js"></script>
</body>
</html>
