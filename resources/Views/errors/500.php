<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Error 500">
    <title>Error 500</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link rel="stylesheet" href="<?= assets('app.css') ?>">
</head>
<body>
    <?php include layout('partials.header'); ?>

    <main>
        <div class="flex min-h-[100dvh] flex-col items-center justify-center bg-background px-4 py-12 sm:px-6 lg:px-8">
            <div class="mx-auto flex max-w-md flex-col items-center justify-center text-center">
                <div class="flex items-center justify-center">
                <span class="text-9xl font-bold text-primary">500</span>
                <div class="ml-8 flex h-20 w-20 items-center justify-center rounded-full bg-black">
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
                    class="h-10 w-10 text-white"
                    >
                    <path d="m8 2 1.88 1.88"></path>
                    <path d="M14.12 3.88 16 2"></path>
                    <path d="M9 7.13v-1a3.003 3.003 0 1 1 6 0v1"></path>
                    <path d="M12 20c-3.3 0-6-2.7-6-6v-3a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v3c0 3.3-2.7 6-6 6"></path>
                    <path d="M12 20v-9"></path>
                    <path d="M6.53 9C4.6 8.8 3 7.1 3 5"></path>
                    <path d="M6 13H2"></path>
                    <path d="M3 21c0-2.1 1.7-3.9 3.8-4"></path>
                    <path d="M20.97 5c0 2.1-1.6 3.8-3.5 4"></path>
                    <path d="M22 13h-4"></path>
                    <path d="M17.2 17c2.1.1 3.8 1.9 3.8 4"></path>
                    </svg>
                </div>
                </div>
                <p class="mt-4 text-3xl font-bold tracking-tight text-foreground sm:text-4xl">Oops, Algo salió mal! </p>
                <p class="mt-2 text-negro-600">
                Lo sentimos, pero se ha producido un error inesperado por nuestra parte. Inténtelo de nuevo más tarde o comuníquese con nuestro 
                equipo de soporte.
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
                <a
                    href="/"
                    class="inline-flex items-center rounded-md border border-input bg-white px-4 py-2 text-sm font-medium text-negro-600 shadow-sm transition-inline hover:bg-negro-50 hover:text-negro-800 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2"
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
                    <path d="M12 2v10"></path>
                    <path d="M18.4 6.6a9 9 0 1 1-12.77.04"></path>
                    </svg>
                    Contactar con Soporte</a>
                </div>
            </div>
        </div>
    </main>

    <?php include layout('partials.footer'); ?>

    <script src="<?= media_js(); ?>/bootstrap.bundle.min.js"></script>
    <script src="/js/scripts.js"></script>
</body>
</html>
