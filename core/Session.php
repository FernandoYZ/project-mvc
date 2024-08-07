<?php

namespace Core;

use Exception;

class Session {
    /**
     * Inicia la sesión si no está ya iniciada.
     * 
     * @throws Exception Si no se puede iniciar la sesión.
     */
    public function start() {
        if (session_status() === PHP_SESSION_NONE) {
            if (session_start() === false) {
                throw new Exception("No se pudo iniciar la sesión.");
            }
        }
    }

    /**
     * Establece un valor en la sesión.
     * 
     * @param string $key La clave del valor.
     * @param mixed $value El valor a almacenar.
     */
    public function set($key, $value) {
        $this->start(); // Asegúrate de que la sesión esté iniciada
        $_SESSION[$key] = $value;
    }

    /**
     * Obtiene un valor de la sesión.
     * 
     * @param string $key La clave del valor.
     * @return mixed El valor almacenado o null si la clave no existe.
     */
    public function get($key) {
        $this->start(); // Asegúrate de que la sesión esté iniciada
        return $_SESSION[$key] ?? null;
    }

    /**
     * Elimina un valor de la sesión.
     * 
     * @param string $key La clave del valor a eliminar.
     */
    public function remove($key) {
        $this->start(); // Asegúrate de que la sesión esté iniciada
        unset($_SESSION[$key]);
    }

    /**
     * Destruye la sesión.
     */
    public function destroy() {
        $this->start(); // Asegúrate de que la sesión esté iniciada
        $_SESSION = []; // Vacía la sesión
        session_destroy(); // Destruye la sesión
        session_unset(); // Limpia los datos de la sesión
    }
}
