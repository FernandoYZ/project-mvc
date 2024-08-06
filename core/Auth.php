<?php

namespace Core\Auth;

use Core\Database\QueryBuilder;
use Core\Utils\Password;

class Auth
{
    protected $queryBuilder;

    public function __construct(QueryBuilder $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    /**
     * Registra un nuevo usuario.
     *
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function register($username, $password)
    {
        $hashedPassword = Password::hash($password);

        // Usar QueryBuilder para insertar datos
        return $this->queryBuilder->table('users')->insert([
            'username' => $username,
            'password' => $hashedPassword
        ]);
    }

    /**
     * Inicia sesión y establece la sesión del usuario.
     *
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function login($username, $password)
    {
        // Usar QueryBuilder para seleccionar usuario
        $user = $this->queryBuilder->table('users')
            ->select('*')
            ->where('username', $username)
            ->first();

        if ($user && Password::verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            return true;
        }

        return false;
    }

    /**
     * Cierra sesión y elimina la sesión del usuario.
     */
    public function logout()
    {
        session_unset();
        session_destroy();
    }

    /**
     * Verifica si el usuario está autenticado.
     *
     * @return bool
     */
    public function check()
    {
        return isset($_SESSION['user_id']);
    }

    /**
     * Obtiene la información del usuario autenticado.
     *
     * @return array|null
     */
    public function user()
    {
        if ($this->check()) {
            // Usar QueryBuilder para obtener información del usuario
            return $this->queryBuilder->table('users')
                ->select('*')
                ->where('id', $_SESSION['user_id'])
                ->first();
        }

        return null;
    }
}
