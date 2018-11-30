<?php

include __DIR__ . '/../database/QueryBuilder.php';
include __DIR__ . '/../database/Connection.php';
$config = include __DIR__ . '/../config.php';

return new QueryBuilder(Connection::make($config['database']));