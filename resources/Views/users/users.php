<div class="w-full max-w-6xl mx-auto px-4 md:px-6 py-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-negro-900"><?= $tag ?></h1>
        <p class="text-negro-400"><?= $description ?></p>
    </div>

    <div class="border border-negro-200 rounded-lg overflow-hidden shadow-md">
        <header class="bg-white px-4 py-3 flex items-center justify-between">
            <div class="relative w-full max-w-md">
                <div class="absolute left-2.5 top-2.5 h-4 w-4 text-negro-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                </div>
                <input class="flex h-10 border border-negro-300 px-3 py-2 text-sm placeholder:text-negro-400 focus:outline-none focus:ring-2 focus:ring-negro-500 w-full rounded-lg pl-10" placeholder="Buscar..." type="search" />
            </div>

            <div class="flex items-center gap-2">
                <div class="hs-dropdown relative inline-flex">
                    <button id="hs-dropdown-default" type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-negro-200 bg-white text-negro-700 shadow-sm hover:bg-negro-50 focus:outline-none focus:bg-negro-50" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                            <polyline points="7 10 12 15 17 10" />
                            <line x1="12" x2="12" y1="15" y2="3" />
                        </svg>
                        Actions
                        <svg class="hs-dropdown-open:rotate-180 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>
                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-1 space-y-0.5 mt-2 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-default">
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-negro-800 hover:bg-negro-50 focus:outline-none focus:bg-negro-50" href="#">
                            Newsletter
                        </a>
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-negro-800 hover:bg-negro-50 focus:outline-none focus:bg-negro-50" href="#">
                            Purchases
                        </a>
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-negro-800 hover:bg-negro-50 focus:outline-none focus:bg-negro-50" href="#">
                            Downloads
                        </a>
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-negro-800 hover:bg-negro-50 focus:outline-none focus:bg-negro-50" href="#">
                            Team Account
                        </a>
                    </div>
                </div>
                <button class="justify-center whitespace-nowrap rounded-md text-sm font-medium bg-negro-950 text-white hover:bg-negro-900 focus:outline-none focus:ring-2 focus:ring-negro-500 focus:ring-offset-2 h-10 px-4 py-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                        <path d="M5 12h14"></path>
                        <path d="M12 5v14"></path>
                    </svg>
                    Agregar Usuario
                </button>
            </div>
        </header>
        <div class="relative w-full overflow-auto">
            <table class="w-full caption-bottom text-sm">
                <thead class="">
                    <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                        <th class="h-12 px-4 text-left align-middle font-medium text-negro-600 w-[50px]">Item</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-negro-600 w-[150px]">Nro. Documento</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-negro-600">Nombres y Apellidos</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-negro-600">Teléfono</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-negro-600">Email</th>
                        <th class="h-12 px-4 text-left align-middle font-medium text-negro-600">Estado</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <?php foreach ($users as $user) : ?>
                        <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle"><?= $user['idpersona'] ?></td>
                            <td class="p-4 align-middle"><?= $user['identificacion'] ?></td>
                            <td class="p-4 align-middle"><?= $user['nombres']?> <?= $user['apellidos'] ?></td>
                            <td class="p-4 align-middle"><?= $user['telefono'] ?></td>
                            <td class="p-4 align-middle"><?= $user['email_user'] ?></td>
                            <td class="p-4 align-middle"><?= $user['status'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>