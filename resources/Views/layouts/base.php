<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My Application' }}</title>
    <meta name="description" content="{{ $description ?? '' }}">
    <link href="<?= media_css('bootstrap.min.css') ?>" rel="stylesheet">
    @if (!empty($css))
        @foreach ($css as $stylesheet)
            <link href="<?= media_css('/' . $stylesheet) ?>" rel="stylesheet">
        @endforeach
    @endif
</head>
<body>
    <?php include layout('partials.header'); ?>
    <div class="container mt-5">
        @yield('content')
    </div>
    <?php include layout('partials.footer'); ?>
    <script src="<?= media_js('bootstrap.bundle.min.js') ?>"></script>
    @if (!empty($js))
        @foreach ($js as $script)
            <script src="<?= media_js($script) ?>" type="module"></script>
        @endforeach
    @endif
    <script src="<?= media_js('main.js') ?>" type="module"></script>
</body>
</html>
