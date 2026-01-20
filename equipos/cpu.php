<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include '../settings/conexion.php';
    include '../media/svg.php';
    $result = $pdo->query("SELECT * FROM computadora");
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = $_POST['user'];
        $query = $pdo->query("SELECT id_c, ns, modelo
                                FROM computadora 
                                INNER JOIN users ON computadora.usuario_id = users.id
                                WHERE id_c LIKE '%$data%' OR ns LIKE '%$data%' OR modelo LIKE '%$data%' OR users.name LIKE '%$data%'");
        $serch = $query->fetch(\PDO::FETCH_ASSOC);
        header('location: ../serch.php?computadora=' . urlencode($serch['id_c']));
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header style="background-color: #2D3C59; color: white; text-align: left; margin-bottom: 1vh; padding: 1vh;">
        <a href="../index.php" style="margin: 1vh" ;> <?php echo $home; ?></a>
        <a href="#" style="margin: 1vh" ;> <?php echo $equipos; ?></a>
        <a href="../label/nav/select.php" style="margin: 1vh"; > <?php echo $tag; ?></a>
    </header>

    <form action="" method="POST">
        <div style="align-items: right; display: flex; justify-content: right; width: 100%; height: 4vh;">
            <input type="text" id="user" name="user" placeholder="Buscar equipo" style="margin-right: 1vh;">
            <input type="submit" name="Buscar" value="Buscar" style="Background-color: #061E29; color: white;">
        </div>
    </form>

    <center>
        <div style="padding: 10vh; background-color:#F3F2EC; margin: 25vh; margin-left: 40vh; margin-right: 40vh;">
            <h1>
                <strong>Computadoras</strong>
            </h1>

            <table style="border: 1px solid black; width: 100%; text-align: center;">

                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Marca
                        </th>
                        <th>
                            Modelo
                        </th>
                        <th>
                            Numero de serie
                        </th>
                        <th>
                            Procesador
                        </th>
                        <th>
                            Ram
                        </th>
                        <th>
                            Almacenamiento
                        </th>
                        <th>
                            Usuario
                        </th>
                        <th>
                            Reportes
                        </th>
                        <th>
                            Exportar
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($row = $result->fetch(\PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id_c'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($row['marca'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($row['modelo'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($row['ns'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($row['procesador'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($row['ram'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($row['almacenamiento'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <?php
                            $id_us = $row['usuario_id'];
                            $query = $pdo->query("SELECT id, name FROM users WHERE id = $id_us");
                            $user = $query->fetch(\PDO::FETCH_ASSOC);
                            ?>
                            <td><?php echo htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <?php $id = $row['id_c']; ?>
                            <td><?php echo "<a href='../label/equipos.php?c=$id'target='_blank'>";
                            echo $look;?></td>
                            <td><?php echo "<a href='../report/reporte.php?c=$id'target='_blank'>"; 
                            echo $report;?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </center>
</body>

</html>