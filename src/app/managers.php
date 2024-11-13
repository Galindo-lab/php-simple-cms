<?php

/*****************************************************************************
 * Aquí se guardan todos los "managers" de la aplicación.                    *
 *                                                                           *
 * Los "managers" son clases que tienen funciones para hacer tareas comunes  *
 * con la base de datos. Un "manager" se asegura de que los datos que se     *
 * envían a la base de datos sean correctos, del tipo adecuado y que no      *
 * tengan código malicioso.                                                  *
 *****************************************************************************/

require_once __DIR__ . '/../base/Manager.php';


class UserManager extends Manager
{

    /**
     * Retorna todos los usuarios
     * @return array
     */
    public static function all(): array
    {
        return Manager::query(query: 'SELECT * FROM Users');
    }

    /**
     * Verifica si el username y password coinciden.
     *
     * @param string $username El nombre de usuario.
     * @param string $password La contraseña proporcionada (sin hash).
     *
     * @return bool Devuelve true si coinciden, false en caso contrario.
     */
    public static function verifyCredentials(string $username, string $password): bool
    {
        $conn = self::connection();
        $stmt = $conn->prepare("SELECT password FROM Users WHERE username = ?");
        if ($stmt) {
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($user && $user['password'] === $password) {
                return true;
            }
        }

        return false;
    }

    /**
     * Summary of getIdByUsername
     * @param string $username
     * @return mixed
     */
    public static function getIdByUsername(string $username): ?int
    {
        $conn = self::connection();
        $stmt = $conn->prepare("SELECT id FROM Users WHERE username = ?");
        if ($stmt) {
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            return $user['id'] ?? null;
        }
        return null;
    }
}


class PostsManager extends Manager
{

    /**
     * Retorna todos los posts
     * @return array
     */
    public static function all(): array
    {
        return Manager::query(query: 'SELECT * FROM Posts');
    }

    /**
     * Inserta un nuevo post en la base de datos.
     *
     * @param string $title    El título del post.
     * @param string $content  El contenido del post.
     * @param int    $user_id  El ID del usuario que crea el post.
     *
     * @return bool Devuelve true si la inserción fue exitosa, false en caso contrario.
     */
    public static function create($title, $content, $user_id): bool
    {
        $conn = self::connection();
        $stmt = $conn->prepare("INSERT INTO Posts (title, content, user_id) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param('ssi', $title, $content, $user_id);
            return $stmt->execute();
        } else {
            return false;
        }
    }

    /**
     * Obtiene un post por su ID.
     *
     * @param int $id El ID del post que deseas obtener.
     *
     * @return array Devuelve un array con los datos del post o un array vacío si no se encuentra.
     */
    public static function getById($id): array
    {
        $conn = self::connection();
        $stmt = $conn->prepare("SELECT * FROM Posts WHERE id = ?");
        if ($stmt) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc() ?: [];
        } else {
            return [];
        }
    }

    /**
     * Elimina un post por su ID.
     *
     * @param int $id El ID del post que deseas eliminar.
     *
     * @return bool Devuelve true si la eliminación fue exitosa, false en caso contrario.
     */
    public static function deleteById($id): bool
    {
        $conn = self::connection();
        $stmt = $conn->prepare("DELETE FROM Posts WHERE id = ?");
        if ($stmt) {
            $stmt->bind_param('i', $id);
            return $stmt->execute();
        } else {
            return false;
        }
    }
}
