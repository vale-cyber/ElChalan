<?php

namespace Utility\DatabseUtility;

use PDO;

class DbConnection
{
    /**
     * @return PDO
     */
    protected function connect(): PDO
    {
        $dsn = 'msql:host=' . '$host' . ';dbname=' . '$dbName';
        $pdo = new PDO($dsn, '$user', '$pwd');
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }
}