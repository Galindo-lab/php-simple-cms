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
}
