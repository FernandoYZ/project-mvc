<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto - Usuarios</title>
    <meta name="description" content="Lista de todos los usuarios">

    <!------------------ Integración de fuentes ------------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-------------- Integración de Tailwind con CND --------------->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/js/tailwind.js" type="module"></script>
    <link href="/css/tailwind.css" type="text/tailwindcss" rel="stylesheet">
    <!-------------------------------------------------------------->

                        <link href="/css//pages/user.css" rel="stylesheet">
            </head>
<body>
        <div class="container mt-5">
        <div class="w-full max-w-6xl mx-auto px-4 md:px-6 py-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-negro-900">Lista de usuarios</h1>
        <p class="text-negro-400">Lista de todos los usuarios</p>
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
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">1</td>
                            <td class="p-4 align-middle">1234567</td>
                            <td class="p-4 align-middle">Jorge Enrique Caceres Hernandez</td>
                            <td class="p-4 align-middle">921737608</td>
                            <td class="p-4 align-middle">admin@admin.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">2</td>
                            <td class="p-4 align-middle">1234560</td>
                            <td class="p-4 align-middle">Jose Gil</td>
                            <td class="p-4 align-middle">936811239</td>
                            <td class="p-4 align-middle">gil@djr.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">3</td>
                            <td class="p-4 align-middle">87654321</td>
                            <td class="p-4 align-middle">Nayzeth Bautista</td>
                            <td class="p-4 align-middle">923506216</td>
                            <td class="p-4 align-middle">nayzeth@djr.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">4</td>
                            <td class="p-4 align-middle">3156166</td>
                            <td class="p-4 align-middle">Fernando Yovera</td>
                            <td class="p-4 align-middle">940466753</td>
                            <td class="p-4 align-middle">fer@djr.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">5</td>
                            <td class="p-4 align-middle">236574</td>
                            <td class="p-4 align-middle">Carlos Moran Tello</td>
                            <td class="p-4 align-middle">916277310</td>
                            <td class="p-4 align-middle">moran@djr.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">6</td>
                            <td class="p-4 align-middle">3333333</td>
                            <td class="p-4 align-middle">María José Martínez López</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">maria.martinez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">7</td>
                            <td class="p-4 align-middle">4444444</td>
                            <td class="p-4 align-middle">Javier Alejandro Hernández Sánchez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">javier.hernandez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">8</td>
                            <td class="p-4 align-middle">5555555</td>
                            <td class="p-4 align-middle">Carolina Gómez Fernández</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">carolina.gomez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">9</td>
                            <td class="p-4 align-middle">6666666</td>
                            <td class="p-4 align-middle">Gabriel Pérez González</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">gabriel.perez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">10</td>
                            <td class="p-4 align-middle">7777777</td>
                            <td class="p-4 align-middle">Valeria Rodríguez Martínez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">valeria.rodriguez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">11</td>
                            <td class="p-4 align-middle">8888888</td>
                            <td class="p-4 align-middle">Martín López Hernández</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">martin.lopez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">12</td>
                            <td class="p-4 align-middle">9999999</td>
                            <td class="p-4 align-middle">Lucía Fernández Pérez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">lucia.fernandez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">13</td>
                            <td class="p-4 align-middle">1010101</td>
                            <td class="p-4 align-middle">Diego González Rodríguez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">diego.gonzalez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">14</td>
                            <td class="p-4 align-middle">1111110</td>
                            <td class="p-4 align-middle">Sofía Martínez Gómez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">sofia.martinez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">15</td>
                            <td class="p-4 align-middle">1212121</td>
                            <td class="p-4 align-middle">Alejandro Hernández López</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">alejandro.hernandez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">16</td>
                            <td class="p-4 align-middle">1313131</td>
                            <td class="p-4 align-middle">Camila Sánchez Fernández</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">camila.sanchez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">17</td>
                            <td class="p-4 align-middle">1414141</td>
                            <td class="p-4 align-middle">Sebastián Gómez Martínez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">sebastian.gomez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">18</td>
                            <td class="p-4 align-middle">1515151</td>
                            <td class="p-4 align-middle">Isabella Pérez Rodríguez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">isabella.perez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">19</td>
                            <td class="p-4 align-middle">1616161</td>
                            <td class="p-4 align-middle">Juan Rodríguez Hernández</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">juan.rodriguez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">20</td>
                            <td class="p-4 align-middle">1717171</td>
                            <td class="p-4 align-middle">Valentina López Gómez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">valentina.lopez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">21</td>
                            <td class="p-4 align-middle">1818181</td>
                            <td class="p-4 align-middle">Mateo Martínez Pérez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">mateo.martinez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">22</td>
                            <td class="p-4 align-middle">1919191</td>
                            <td class="p-4 align-middle">Fernanda Hernández Rodríguez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">fernanda.hernandez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">23</td>
                            <td class="p-4 align-middle">2020202</td>
                            <td class="p-4 align-middle">Lucas Gómez Martínez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">lucas.gomez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">24</td>
                            <td class="p-4 align-middle">2121212</td>
                            <td class="p-4 align-middle">Martina Rodríguez López</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">martina.rodriguez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">25</td>
                            <td class="p-4 align-middle">2525252</td>
                            <td class="p-4 align-middle">Santiago Gómez Pérez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">santiago.gomez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">26</td>
                            <td class="p-4 align-middle">2626262</td>
                            <td class="p-4 align-middle">Matilda Hernández Rodríguez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">matilda.hernandez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">27</td>
                            <td class="p-4 align-middle">2727272</td>
                            <td class="p-4 align-middle">Emiliano Martínez López</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">emiliano.martinez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">28</td>
                            <td class="p-4 align-middle">2828282</td>
                            <td class="p-4 align-middle">Antonella González Pérez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">antonella.gonzalez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">29</td>
                            <td class="p-4 align-middle">2929292</td>
                            <td class="p-4 align-middle">Agustín López Rodríguez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">agustin.lopez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">30</td>
                            <td class="p-4 align-middle">3030303</td>
                            <td class="p-4 align-middle">Renata Hernández Martínez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">renata.hernandez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">31</td>
                            <td class="p-4 align-middle">3131313</td>
                            <td class="p-4 align-middle">Emilio Martínez Pérez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">emilio.martinez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">32</td>
                            <td class="p-4 align-middle">3232323</td>
                            <td class="p-4 align-middle">Isidora González López</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">isidora.gonzalez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">33</td>
                            <td class="p-4 align-middle">3333333</td>
                            <td class="p-4 align-middle">Cristóbal López Martínez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">cristobal.lopez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">34</td>
                            <td class="p-4 align-middle">3434343</td>
                            <td class="p-4 align-middle">Maite Hernández Rodríguez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">maite.hernandez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">35</td>
                            <td class="p-4 align-middle">3535353</td>
                            <td class="p-4 align-middle">Benjamín Martínez Pérez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">benjamin.martinez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">36</td>
                            <td class="p-4 align-middle">3636363</td>
                            <td class="p-4 align-middle">Martina González López</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">martina.gonzalez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">37</td>
                            <td class="p-4 align-middle">3737373</td>
                            <td class="p-4 align-middle">Bautista López Rodríguez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">bautista.lopez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">38</td>
                            <td class="p-4 align-middle">3838383</td>
                            <td class="p-4 align-middle">Manuela Hernández Martínez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">manuela.hernandez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">39</td>
                            <td class="p-4 align-middle">3939393</td>
                            <td class="p-4 align-middle">Matías Martínez Pérez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">matias.martinez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">40</td>
                            <td class="p-4 align-middle">4040404</td>
                            <td class="p-4 align-middle">Emilia González López</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">emilia.gonzalez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">41</td>
                            <td class="p-4 align-middle">4141414</td>
                            <td class="p-4 align-middle">Sebastián López Rodríguez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">sebastian.lopez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">42</td>
                            <td class="p-4 align-middle">4242424</td>
                            <td class="p-4 align-middle">Isabella Hernández Martínez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">isabella.hernandez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">43</td>
                            <td class="p-4 align-middle">4343434</td>
                            <td class="p-4 align-middle">Juan Pablo Martínez Pérez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">juanpablo.martinez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">44</td>
                            <td class="p-4 align-middle">4444444</td>
                            <td class="p-4 align-middle">Valentina González López</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">valentina.gonzalez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">45</td>
                            <td class="p-4 align-middle">4545454</td>
                            <td class="p-4 align-middle">Emilio López Rodríguez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">emilio.lopez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">46</td>
                            <td class="p-4 align-middle">4646464</td>
                            <td class="p-4 align-middle">Martina Hernández Martínez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">martina.hernandez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">47</td>
                            <td class="p-4 align-middle">4747474</td>
                            <td class="p-4 align-middle">Agustín Martínez Pérez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">agustin.martinez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">48</td>
                            <td class="p-4 align-middle">4848484</td>
                            <td class="p-4 align-middle">Renata González López</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">renata.gonzalez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">49</td>
                            <td class="p-4 align-middle">4949494</td>
                            <td class="p-4 align-middle">Emiliano López Rodríguez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">emiliano.lopez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">50</td>
                            <td class="p-4 align-middle">5050505</td>
                            <td class="p-4 align-middle">Antonella Hernández Martínez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">antonella.hernandez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">51</td>
                            <td class="p-4 align-middle">5151515</td>
                            <td class="p-4 align-middle">Santiago Gómez Pérez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">santiago.gomez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">52</td>
                            <td class="p-4 align-middle">5252525</td>
                            <td class="p-4 align-middle">Matilda Hernández Rodríguez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">matilda.hernandez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">53</td>
                            <td class="p-4 align-middle">5353535</td>
                            <td class="p-4 align-middle">Emiliano Martínez López</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">emiliano.martinez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">54</td>
                            <td class="p-4 align-middle">5454545</td>
                            <td class="p-4 align-middle">Antonella González Pérez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">antonella.gonzalez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">55</td>
                            <td class="p-4 align-middle">5555555</td>
                            <td class="p-4 align-middle">Agustín López Rodríguez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">agustin.lopez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">56</td>
                            <td class="p-4 align-middle">5656565</td>
                            <td class="p-4 align-middle">Renata Hernández Martínez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">renata.hernandez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">57</td>
                            <td class="p-4 align-middle">5757575</td>
                            <td class="p-4 align-middle">Emilio Martínez Pérez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">emilio.martinez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">58</td>
                            <td class="p-4 align-middle">5858585</td>
                            <td class="p-4 align-middle">Isidora González López</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">isidora.gonzalez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">59</td>
                            <td class="p-4 align-middle">5959595</td>
                            <td class="p-4 align-middle">Cristóbal López Martínez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">cristobal.lopez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">60</td>
                            <td class="p-4 align-middle">6060606</td>
                            <td class="p-4 align-middle">Maite Hernández Rodríguez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">maite.hernandez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">61</td>
                            <td class="p-4 align-middle">6161616</td>
                            <td class="p-4 align-middle">Benjamín Martínez Pérez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">benjamin.martinez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">62</td>
                            <td class="p-4 align-middle">6262626</td>
                            <td class="p-4 align-middle">Martina González López</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">martina.gonzalez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">63</td>
                            <td class="p-4 align-middle">6363636</td>
                            <td class="p-4 align-middle">Bautista López Rodríguez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">bautista.lopez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">64</td>
                            <td class="p-4 align-middle">6464646</td>
                            <td class="p-4 align-middle">Manuela Hernández Martínez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">manuela.hernandez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">65</td>
                            <td class="p-4 align-middle">6565656</td>
                            <td class="p-4 align-middle">Matías Martínez Pérez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">matias.martinez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">66</td>
                            <td class="p-4 align-middle">6666666</td>
                            <td class="p-4 align-middle">Emilia González López</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">emilia.gonzalez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">67</td>
                            <td class="p-4 align-middle">6767676</td>
                            <td class="p-4 align-middle">Sebastián López Rodríguez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">sebastian.lopez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">68</td>
                            <td class="p-4 align-middle">6868686</td>
                            <td class="p-4 align-middle">Isabella Hernández Martínez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">isabella.hernandez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">69</td>
                            <td class="p-4 align-middle">6969696</td>
                            <td class="p-4 align-middle">Juan Pablo Martínez Pérez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">juanpablo.martinez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">70</td>
                            <td class="p-4 align-middle">7070707</td>
                            <td class="p-4 align-middle">Valentina González López</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">valentina.gonzalez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">71</td>
                            <td class="p-4 align-middle">7171717</td>
                            <td class="p-4 align-middle">Emilio López Rodríguez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">emilio.lopez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">72</td>
                            <td class="p-4 align-middle">7272727</td>
                            <td class="p-4 align-middle">Martina Hernández Martínez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">martina.hernandez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">73</td>
                            <td class="p-4 align-middle">7373737</td>
                            <td class="p-4 align-middle">Agustín Martínez Pérez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">agustin.martinez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">74</td>
                            <td class="p-4 align-middle">7474747</td>
                            <td class="p-4 align-middle">Renata González López</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">renata.gonzalez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">75</td>
                            <td class="p-4 align-middle">7575757</td>
                            <td class="p-4 align-middle">Emiliano López Rodríguez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">emiliano.lopez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">76</td>
                            <td class="p-4 align-middle">7676767</td>
                            <td class="p-4 align-middle">Antonella Hernández Martínez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">antonella.hernandez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">77</td>
                            <td class="p-4 align-middle">7777777</td>
                            <td class="p-4 align-middle">Santiago Gómez Pérez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">santiago.gomez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">78</td>
                            <td class="p-4 align-middle">7878787</td>
                            <td class="p-4 align-middle">Matilda Hernández Rodríguez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">matilda.hernandez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">79</td>
                            <td class="p-4 align-middle">7979797</td>
                            <td class="p-4 align-middle">Emiliano Martínez López</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">emiliano.martinez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">80</td>
                            <td class="p-4 align-middle">8080808</td>
                            <td class="p-4 align-middle">Antonella González Pérez</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">antonella.gonzalez@example.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">94</td>
                            <td class="p-4 align-middle"></td>
                            <td class="p-4 align-middle">Flavio Silloca</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">flavio.sill@gmail.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">95</td>
                            <td class="p-4 align-middle"></td>
                            <td class="p-4 align-middle">Karla Benavides Tye</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">tye266@gmail.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                            <tr class="border-b border-negro-200 transition-colors hover:bg-negro-50">
                            <td class="p-4 align-middle">96</td>
                            <td class="p-4 align-middle"></td>
                            <td class="p-4 align-middle">Mathias Smith Tinoco</td>
                            <td class="p-4 align-middle">999999999</td>
                            <td class="p-4 align-middle">tinico.math@gmail.com</td>
                            <td class="p-4 align-middle">1</td>
                        </tr>
                                    </tbody>
            </table>
        </div>
    </div>
</div>    </div>
    <footer class="w-full bg-negro-50 dark:bg-black py-8 text-negro-400">
    <div class="mx-auto max-w-6xl px-4 md:px-6">
        <!-- Redes Sociales -->
        <div class="flex justify-center gap-4 mb-8">
            <a class="flex h-10 w-10 items-center justify-center rounded-full hover:text-black bg-white hover:bg-negro-100 transition-colors" href="#" rel="ugc">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                    <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path>
                </svg>
                <span class="sr-only">Twitter</span>
            </a>
            <a class="flex h-10 w-10 items-center justify-center rounded-full hover:text-black bg-white hover:bg-negro-100 transition-colors" href="#" rel="ugc">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                </svg>
                <span class="sr-only">Facebook</span>
            </a>
            <a class="flex h-10 w-10 items-center justify-center rounded-full hover:text-black bg-white hover:bg-negro-100 transition-colors" href="#" rel="ugc">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                </svg>
                <span class="sr-only">Instagram</span>
            </a>
            <a class="flex h-10 w-10 items-center justify-center rounded-full hover:text-black bg-white hover:bg-negro-100 transition-colors" href="#" rel="ugc">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                    <rect width="4" height="12" x="2" y="9"></rect>
                    <circle cx="4" cy="4" r="2"></circle>
                </svg>
                <span class="sr-only">LinkedIn</span>
            </a>
        </div>

        <!-- Información del Proyecto -->
        <div class="grid grid-cols-1 p-30 justify-between items-center gap-2 md:grid-cols-2 mb-12">
            <div class="space-y-4">
                <a class="justify-left ms:justify-center flex gap-2" href="#" rel="ugc">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                        <path d="m8 3 4 8 5-5 5 15H2L8 3z"></path>
                    </svg>
                    <span class="text-lg font-semibold">Acme Inc</span>
                </a>
                <p class="text-sm text-muted md:pr-32">
                    Acme Inc es un proveedor líder de productos y servicios innovadores. Nos comprometemos a ofrecer las mejores soluciones a nuestros clientes y contribuir al desarrollo y éxito de sus proyectos con un equipo altamente capacitado y una experiencia destacada en el sector.
                </p>
            </div>
            <div class="lg:py-0 lg:px-0 md:px-0 md:py-0 px-16 py-8 flex flex-col-2 items-center justify-between gap-8">
                <div class="space-y-2">
                    <h4 class="text-sm font-semibold">Pages</h4>
                    <ul class="space-y-1">
                        <li><a class="text-sm hover:text-black hover:dark:text-white" href="#" rel="ugc">Home</a></li>
                        <li><a class="text-sm hover:text-black hover:dark:text-white" href="#" rel="ugc">About</a></li>
                        <li><a class="text-sm hover:text-black hover:dark:text-white" href="#" rel="ugc">Products</a></li>
                        <li><a class="text-sm hover:text-black hover:dark:text-white" href="#" rel="ugc">Contact</a></li>
                    </ul>
                </div>
                <div class="space-y-2">
                    <h4 class="text-sm font-semibold">Resources</h4>
                    <ul class="space-y-1">
                        <li><a class="text-sm hover:text-black hover:dark:text-white" href="#" rel="ugc">Blog</a></li>
                        <li><a class="text-sm hover:text-black hover:dark:text-white" href="#" rel="ugc">Documentation</a></li>
                        <li><a class="text-sm hover:text-black hover:dark:text-white" href="#" rel="ugc">Support</a></li>
                        <li><a class="text-sm hover:text-black hover:dark:text-white" href="#" rel="ugc">FAQ</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Derechos Reservados -->
        <div class="flex flex-col items-center justify-between gap-4 text-xs sm:flex-row">
            <p>&copy; 2024 Acme Inc. Todos los derechos reservados.</p>
            <nav class="flex gap-4">
                <a class="hover:underline" href="#" rel="ugc">Privacy Policy</a>
                <a class="hover:underline" href="#" rel="ugc">Terms of Service</a>
            </nav>
        </div>
    </div>
</footer>

                        <script src="/js//pages/UserPage.js"></script>
                <script src="/js/main.js" type="module"></script>
</html>
