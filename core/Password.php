<?php

namespace Core;

class Password {
    protected $queryBuilder;

    public function __construct() {
        $this->queryBuilder = new QueryBuilder();
    }

    /**
     * Hashes a plain password using bcrypt.
     *
     * @param string $password
     * @return string
     */
    public function hash($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * Verifies a plain password against a hashed password.
     *
     * @param string $password
     * @param string $hashedPassword
     * @return bool
     */
    public function verify($password, $hashedPassword) {
        return password_verify($password, $hashedPassword);
    }

    /**
     * Updates the user's password in the database.
     *
     * @param int $userId
     * @param string $newPassword
     * @return bool
     */
    public function updatePassword($userId, $newPassword) {
        $hashedPassword = $this->hash($newPassword);

        return $this->queryBuilder->update('users', ['password' => $hashedPassword], $userId);
    }

    /**
     * Retrieves a user's hashed password from the database.
     *
     * @param int $userId
     * @return string|null
     */
    public function getPasswordByUserId($userId) {
        return $this->queryBuilder->select('password')
                                  ->from('users')
                                  ->where('id', '=', $userId)
                                  ->first()['password'] ?? null;
    }
}
