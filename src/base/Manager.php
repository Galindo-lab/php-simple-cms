<?php

/*****************************************************************************
 * Funciones comunes para Managers.                                          *
 * Como Obtener la coneccion y hacer queries.                                *
 *****************************************************************************/

require_once __DIR__ . '/Connection.php';

abstract class Manager
{
    protected static function connection(): mysqli
    {
        return Connection::getInstance()->getConnection();
    }

    protected static function query($query): array
    {
        return Manager::connection()->query(query: $query)->fetch_all(mode: MYSQLI_ASSOC);
    }
}


