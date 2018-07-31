<?php
require_once __DIR__ . '/../../../config/config.php';
require_once APP . 'customers/functions.php';

if (isset($_GET['id'])) {
    delete($_GET['id']);
} else {
    die("ERRO: ID não definido.");
}
?>