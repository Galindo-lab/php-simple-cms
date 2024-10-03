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


class UserManager extends Manager {

    /**
     * Retorna todos los usuarios
     * @return array
     */
    public static function all(): array {
        return Manager::query(query: 'SELECT * FROM Users');
    }
}


class PostsManager extends Manager {

    /**
     * Retorna todos los posts
     * @return array
     */
    public static function all(): array {
        return Manager::query(query:'SELECT * FROM Posts');
    }
}
