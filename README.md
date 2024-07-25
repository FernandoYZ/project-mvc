# Proyecto Backend en PHP

## Descripción

Este proyecto es un proyecto personal diseñado para ofrecer una estructura modular y escalable tanto para el backend como para el frontend, principalmente enfocándonos por el lado del Servidor. Utiliza una arquitectura basada en el patrón MVC para el backend en PHP similar al framework de Laravel. El objetivo es proporcionar una solución flexible y extensible para el desarrollo de aplicaciones web medianas a grandes.

## Estructura del Proyecto

```plaintext
project/
├── app/
│   ├── Controllers/
│   ├── Models/
│   └── helpers.php
├── bootstrap/
│   └── app.php
├── config/
│   ├── app.php
│   └── database.php
├── core/
│   ├── Autoload.php
│   ├── BaseController.php
│   ├── BaseModel.php
│   ├── Controller.php
│   ├── Database.php
│   ├── ExceptionHandler.php
│   ├── Middleware.php
│   ├── QueryBuilder.php
│   ├── Router.php
│   ├── ViewCompiler.php
│   └── Views.php
├── public/
│   ├── css/
│   ├── js/
│   ├── .htaccess
│   └── index.php
├── resources/
│   ├── Views/
├── routes/
│   └── web.php
├── storage/
│   ├── cache/
│   ├── logs/
│   └── uploads/
├── vendor/
│   └── autoload.php
└── .env
```


## Backend

### Estructura

- **Controllers**: Define la lógica del negocio y maneja las solicitudes.
- **Models**: Representa la estructura de los datos y maneja la interacción con la base de datos usando *`QueryBuilder`*.
- **Views**: Se encargan de la presentación de los datos. Se encuentran en *`resources/Views.`*

### Uso del Controlador

Los controladores deben estar ubicados en la carpeta `/app/Controllers` y deben extender `BaseController`. Aquí hay un ejemplo de un controlador básico:

```php
<?php

namespace App\Controllers;

use App\Models\User;
use Core\Controller;

class UserController extends Controller
{
    /**
     * Mostrar una lista de usuarios.
     *
     * @return void
     */
    public function index()
    {
        $users = User::all();
        return $this->view('users.index', ['users' => $users]);
    }

    /**
     * Mostrar el formulario para crear un nuevo usuario.
     *
     * @return void
     */
    public function create()
    {
        return $this->view('users.create');
    }

    /**
     * Almacenar un nuevo usuario en la base de datos.
     *
     * @return void
     */
    public function store()
    {
        $data = $_POST;
        User::create($data);
        header('Location: /users');
    }
}

```
#### Descripción
- `index()`: Obtiene todos los usuarios y pasa los datos a la vista users.index.
- `create()`: Muestra el formulario para crear un nuevo usuario.
- `store()`: Crea un nuevo usuario en la base de datos con los datos enviados a través de POST.


### Uso del Modelo

Los modelos representan las entidades en la base de datos y contienen la lógica para interactuar con ella. Utilizan el `QueryBuilder` para realizar consultas a la base de datos. Además, deben estar ubicados en la carpeta `/app/Models` y deben extender `BaseModel`. Aquí hay un ejemplo de un controlador básico:

```php
<?php

namespace App\Models;

use Core\BaseModel;

class User extends BaseModel
{
    protected static $table = 'users';

    /**
     * Obtener todos los usuarios.
     *
     * @return array
     */
    public static function all()
    {
        return self::query()->select('*')->get();
    }

    /**
     * Crear un nuevo usuario.
     *
     * @param array $data
     * @return void
     */
    public static function create(array $data)
    {
        self::query()->insert($data);
    }
}
```

#### Descripción
- **`all()`:** Obtiene todos los usuarios y pasa los datos a la vista *`users.index`*.
- **`create(array $data)`:** Inserta un nuevo registro en la tabla *`users`* con los datos proporcionados.

------------


##Notas adicionales
- **Seguridad: **Asegúrate de validar y sanitizar los datos recibidos en el backend para evitar inyecciones SQL y otros ataques.
- **SEO: **Si el contenido de la aplicación es dinámico, considera usar técnicas como el renderizado del lado del servidor (SSR) o pre-renderizado para mejorar el SEO.
- **Rendimiento:** Optimiza las consultas a la base de datos y considera usar técnicas de caching para mejorar el rendimiento de la aplicación.

