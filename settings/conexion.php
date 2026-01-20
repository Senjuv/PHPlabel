<?php
require_once 'config.php';

try {
    // Definir ruta absoluta a la base de datos
    $dbPath = __DIR__ . '/data/database.sqlite';

    // Crear carpeta si no existe
    if (!is_dir(dirname($dbPath))) {
        mkdir(dirname($dbPath), 0777, true);
    }

    // Conectar usando PDO
    $pdo = new PDO('sqlite:' . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Conexión establecida correctamente.";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
$pdo->exec("CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, age INTEGER)");
$pdo->exec("CREATE TABLE IF NOT EXISTS computadora ( id_c INTEGER PRIMARY KEY AUTOINCREMENT, marca TEXT, modelo TEXT, ns TEXT, procesador TEXT, ram TEXT, almacenamiento TEXT, usuario_id INTEGER, FOREIGN KEY (usuario_id) REFERENCES users(id) )");
$pdo->exec("CREATE TABLE IF NOT EXISTS label (id INTEGER PRIMARY KEY AUTOINCREMENT, datos TEXT, cat TEXT)");
//$pdo->exec("INSERT INTO computadora (id_c,marca,modelo,ns,procesador,ram,almacenamiento,usuario_id) VALUES(0, null,null,null,null,null,null,null)");
//$pdo->exec("INSERT INTO users (name, age) VALUES ('Yazmin', 23)");
//$pdo->exec("UPDATE computadora SET (marca = 'null', modelo ='null', ns ='null', procesador = 'null',ram='null', almacenamiento='null', usuario_id='null' WHERE id_c = 0)");
//$pdo->exec("DELETE FROM computadora WHERE id_c = 0");
?>