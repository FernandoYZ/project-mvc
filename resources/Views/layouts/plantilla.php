<!DOCTYPE html>
<html lang="<?= config('language') ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto - <?= $title ?? config('name') ?></title>
    <meta name="description" content="<?= $description ?? '' ?>">

    <!-------------- Integración de Tailwind con CND --------------->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="<?= media_js('tailwind.js') ?>" type="module"></script>
    <link href="<?= media_css('tailwind.css') ?>" type="text/tailwindcss" rel="stylesheet">
    <!-------------------------------------------------------------->

    <?php if (!empty($css)) : ?>
        <?php foreach ($css as $stylesheet) : ?>
            <link href="<?= media_css($stylesheet) ?>" rel="stylesheet">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <?php include layout('partials.header'); ?>
    <div class="container mt-5">
        <?= $content ?? '' ?>
    </div>
    <?php include layout('partials.footer'); ?>

    <?php if (!empty($js)) : ?>
        <?php foreach ($js as $script) : ?>
            <script src="<?= media_js($script) ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
    <script src="<?= media_js('main.js') ?>" type="module"></script>
</html>
