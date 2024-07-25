<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto - <?= $title ?? 'My Application' ?></title>
    <meta name="description" content="<?= $description ?? '' ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <?php if (!empty($css)) : ?>
        <?php foreach ($css as $stylesheet) : ?>
            <link href="<?= media_css('/' . $stylesheet) ?>" rel="stylesheet">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <?php include layout('partials.header'); ?>
    <div class="container mt-5">
        <?= $content ?>
    </div>
    <?php include layout('partials.footer'); ?>
    <script src="<?= media_js('bootstrap.bundle.min.js') ?>"></script>
    <?php if (!empty($js)) : ?>
        <?php foreach ($js as $script) : ?>
            <script src="<?= media_js($script) ?>" type="module"></script>
        <?php endforeach; ?>
    <?php endif; ?>
    <script src="<?= media_js('main.js') ?>" type="module"></script>
</body>
</html>

