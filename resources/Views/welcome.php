<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    
    <!-- Tailwind CND -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="<?= media_css('input.css') ?>" type="text/tailwindcss" rel="stylesheet">
    <script src="<?= media_js('tailwind.config.js') ?>" type="module"></script>
    
    <!-- css y js personalizados -->
    <link href="<?= media_css('main.css') ?>" rel="stylesheet">
    <script src="<?= media_js('main.js') ?>"></script>
</head>
<body>
    <?php include layout('partials.header'); ?>
    <main>
    <div class="flex flex-col bg-red-500">
        <div class="mt-16 bg-black text-primary-foreground py-12 md:py-16 lg:py-20">
            <div class="mx-auto px-6 max-w-7xl sm:px-6 lg:px-2">
            <div class="grid gap-8 md:grid-cols-2 md:gap-12">
                <div>
                <h1 class="text-white text-4xl font-bold tracking-tighter sm:text-5xl md:text-6xl lg:text-7xl">
                    Backend PHP
                </h1>
                <p class="mt-4 text-lg text-gray-200 md:text-xl">
                    Explore the comprehensive documentation for our project, covering everything from installation to
                    advanced usage.
                </p>
                <div class="mt-8">
                    <a
                    class="inline-flex h-10 items-center justify-center rounded-md bg-white px-6 py-2 text-sm font-medium text-black shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all duration-300"
                    href="#"
                    >
                    Ver Documentación
                    </a>
                </div>
                </div>
                <div class="flex items-center justify-center">
                <img
                    src="https://kinsta.com/es/wp-content/uploads/sites/8/2022/02/wp-php-benchmarks-8.1-8.2-8.3-1.jpg"
                    width="400"
                    height="300"
                    alt="Project Illustration"
                    class="rounded-lg object-cover"
                    style="aspect-ratio:400/300;object-fit:cover"
                />
                </div>
            </div>
            </div>
        </div>
    </div>
    
    <section class="py-12 md:py-24 lg:py-32">
      <div class="container mx-auto px-4 md:px-6">
        <div class="space-y-8 text-center">
          <div>
            <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl">Key Features</h2>
            <p class="mt-2 text-muted-foreground md:text-xl">
              Discover the powerful features that make our project stand out.
            </p>
          </div>
          <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3">
            <div class="rounded-lg border bg-background p-6 shadow-sm">
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
                class="mb-4 h-8 w-8 text-primary"
              >
                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                <circle cx="12" cy="12" r="4"></circle>
              </svg>
              <h3 class="text-lg font-medium">Fast and Reliable</h3>
              <p class="mt-2 text-muted-foreground">
                Our project is designed to be lightning-fast and rock-solid reliable, ensuring a seamless user
                experience.
              </p>
            </div>
            <div class="rounded-lg border bg-background p-6 shadow-sm">
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
                class="mb-4 h-8 w-8 text-primary"
              >
                <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path>
                <circle cx="12" cy="12" r="3"></circle>
              </svg>
              <h3 class="text-lg font-medium">Highly Customizable</h3>
              <p class="mt-2 text-muted-foreground">
                Tailor our project to your specific needs with our extensive customization options.
              </p>
            </div>
            <div class="rounded-lg border bg-background p-6 shadow-sm">
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
                class="mb-4 h-8 w-8 text-primary"
              >
                <path d="M19.439 7.85c-.049.322.059.648.289.878l1.568 1.568c.47.47.706 1.087.706 1.704s-.235 1.233-.706 1.704l-1.611 1.611a.98.98 0 0 1-.837.276c-.47-.07-.802-.48-.968-.925a2.501 2.501 0 1 0-3.214 3.214c.446.166.855.497.925.968a.979.979 0 0 1-.276.837l-1.61 1.61a2.404 2.404 0 0 1-1.705.707 2.402 2.402 0 0 1-1.704-.706l-1.568-1.568a1.026 1.026 0 0 0-.877-.29c-.493.074-.84.504-1.02.968a2.5 2.5 0 1 1-3.237-3.237c.464-.18.894-.527.967-1.02a1.026 1.026 0 0 0-.289-.877l-1.568-1.568A2.402 2.402 0 0 1 1.998 12c0-.617.236-1.234.706-1.704L4.23 8.77c.24-.24.581-.353.917-.303.515.077.877.528 1.073 1.01a2.5 2.5 0 1 0 3.259-3.259c-.482-.196-.933-.558-1.01-1.073-.05-.336.062-.676.303-.917l1.525-1.525A2.402 2.402 0 0 1 12 1.998c.617 0 1.234.236 1.704.706l1.568 1.568c.23.23.556.338.877.29.493-.074.84-.504 1.02-.968a2.5 2.5 0 1 1 3.237 3.237c-.464.18-.894.527-.967 1.02Z"></path>
              </svg>
              <h3 class="text-lg font-medium">Modular Design</h3>
              <p class="mt-2 text-muted-foreground">
                Our modular design allows you to easily integrate our project into your existing infrastructure.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="bg-muted py-12 md:py-24 lg:py-32">
      <div class="container mx-auto px-4 md:px-6">
        <div class="space-y-8 text-center">
          <div>
            <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl">Getting Started</h2>
            <p class="mt-2 text-muted-foreground md:text-xl">
              Follow these simple steps to get up and running with our project.
            </p>
          </div>
          <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3">
            <div class="rounded-lg border bg-background p-6 shadow-sm">
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
                class="mb-4 h-8 w-8 text-primary"
              >
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="7 10 12 15 17 10"></polyline>
                <line x1="12" x2="12" y1="15" y2="3"></line>
              </svg>
              <h3 class="text-lg font-medium">Download</h3>
              <p class="mt-2 text-muted-foreground">
                Start by downloading our project from the official repository.
              </p>
              <a
                href="#"
                class="mt-4 inline-flex h-8 items-center justify-center rounded-md bg-primary px-4 text-sm font-medium text-primary-foreground shadow transition-colors hover:bg-primary/90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50"
              >
                Learn More
              </a>
            </div>
            <div class="rounded-lg border bg-background p-6 shadow-sm">
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
                class="mb-4 h-8 w-8 text-primary"
              >
                <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path>
                <circle cx="12" cy="12" r="3"></circle>
              </svg>
              <h3 class="text-lg font-medium">Configure</h3>
              <p class="mt-2 text-muted-foreground">Customize your installation to fit your specific needs.</p>
              <a
                href="#"
                class="mt-4 inline-flex h-8 items-center justify-center rounded-md bg-primary px-4 text-sm font-medium text-primary-foreground shadow transition-colors hover:bg-primary/90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50"
              >
                Learn More
              </a>
            </div>
            <div class="rounded-lg border bg-background p-6 shadow-sm">
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
                class="mb-4 h-8 w-8 text-primary"
              >
                <path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path>
                <path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path>
                <path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path>
                <path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path>
              </svg>
              <h3 class="text-lg font-medium">Launch</h3>
              <p class="mt-2 text-muted-foreground">Deploy your project and start using our powerful features.</p>
              <a
                href="#"
                class="mt-4 inline-flex h-8 items-center justify-center rounded-md bg-primary px-4 text-sm font-medium text-primary-foreground shadow transition-colors hover:bg-primary/90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50"
              >
                Learn More
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="py-12 md:py-24 lg:py-32">
      <div class="container mx-auto px-4 md:px-6">
        <div class="space-y-8 text-center">
          <div>
            <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl">Documentation Pages</h2>
            <p class="mt-2 text-muted-foreground md:text-xl">
              Explore our comprehensive documentation to learn more about our project.
            </p>
          </div>
          <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3">
            <a
              class="rounded-lg border bg-background p-6 shadow-sm hover:bg-accent hover:text-accent-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring"
              href="#"
            >
              <h3 class="text-lg font-medium">Introduction</h3>
              <p class="mt-2 text-muted-foreground">Get an overview of our project and its key features.</p>
            </a>
            <a
              href="#"
              class="rounded-lg border bg-background p-6 shadow-sm hover:bg-accent hover:text-accent-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring"
            >
              <h3 class="text-lg font-medium">Installation</h3>
              <p class="mt-2 text-muted-foreground">Learn how to set up our project on your system.</p>
            </a>
            <a
              href="#"
              class="rounded-lg border bg-background p-6 shadow-sm hover:bg-accent hover:text-accent-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring"
            >
              <h3 class="text-lg font-medium">Configuration</h3>
              <p class="mt-2 text-muted-foreground">Customize our project to fit your specific needs.</p>
            </a>
            <a
              href="#"
              class="rounded-lg border bg-background p-6 shadow-sm hover:bg-accent hover:text-accent-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring"
            >
              <h3 class="text-lg font-medium">Usage</h3>
              <p class="mt-2 text-muted-foreground">
                Discover how to use our project's features and functionality.
              </p>
            </a>
            <a
              class="rounded-lg border bg-background p-6 shadow-sm hover:bg-accent hover:text-accent-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring"
              href="#"
            >
              <h3 class="text-lg font-medium">Deployment</h3>
              <p class="mt-2 text-muted-foreground">Learn how to deploy our project in your environment.</p>
            </a>
            <a
              class="rounded-lg border bg-background p-6 shadow-sm hover:bg-accent hover:text-accent-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring"
              href="#"
            >
              <h3 class="text-lg font-medium">API Reference</h3>
              <p class="mt-2 text-muted-foreground">Explore our project's API and integration options.</p>
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>
  
</div>
    </main>
    <?php include layout('partials.footer'); ?>
</body>
</html>
