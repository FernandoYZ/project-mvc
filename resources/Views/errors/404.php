<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Error 404">
    <title>Error 404</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="<?= media_js('tailwind.js') ?>"></script>
    <link href="<?= media_css('tailwind.css') ?>" type="text/tailwindcss" rel="stylesheet">
</head>
<body>
    <?php include layout('partials.header'); ?>
    <main>
        <div class="flex min-h-[100dvh] flex-col items-center justify-center bg-background px-4 py-12 sm:px-6 lg:px-8">
            <div class="mx-auto flex max-w-md flex-col items-center justify-center text-center">
                <div class="flex items-center justify-center">
                <span class="text-9xl font-bold text-primary">404</span>
                <div class="ml-8 flex h-20 w-20 items-center justify-center rounded-full bg-black">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 1 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="mx-auto h-12 w-12 text-white"
                >
                <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"></path>
                <path d="M12 9v4"></path>
                <path d="M12 17h.01"></path>
                </svg>
                </div>
                </div>
                <p class="mt-4 text-3xl font-bold tracking-tight text-foreground sm:text-4xl">Oops, Algo salió mal! </p>
                <p class="mt-2 text-negro-600">
                Lo sentimos, pero se ha producido un error inesperado en nuestro sitio web. Inténtelo de nuevo más tarde.
                </p>
                <div class="mt-6 flex gap-4">
                <a
                    href="/"
                    class="inline-flex items-center rounded-md bg-black px-4 py-2 text-sm font-medium text-white shadow-sm transition-inline hover:bg-negro-900 focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2"
                >
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="mr-2 h-4 w-4"
                    >
                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    Regresar al Inicio
                </a>
                </div>
            </div>
        </div>
    </main>

    <?php include layout('partials.footer'); ?>

    <script src="<?= media_js(); ?>/bootstrap.bundle.min.js"></script>
    <script src="/js/scripts.js"></script>
</body>
</html>
