<?php

include 'database/QueryBuilder.php';
include 'database/Connection.php';
$config = include 'config.php';

return new QueryBuilder(Connection::make($config['database']));