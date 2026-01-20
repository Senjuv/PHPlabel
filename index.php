<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'settings/conexion.php';
    include 'media/svg.php';

    $result = $pdo->query("SELECT id, name, age FROM users");
    if (!empty($_GET['alert'])) {
        echo "<script>alert('No se encontraron resultados para la búsqueda.');</script>";
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = $_POST['user'];
        $query = $pdo->query("SELECT id, name FROM users WHERE name LIKE '%$user%' OR id LIKE '%$user%'");
        echo "funciona";
        $Rquery = $query->fetch(\PDO::FETCH_ASSOC);
        var_dump($Rquery);
        header('Location: serch.php?user=' . urlencode($Rquery['id']));
    }


    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header style="background-color: #2D3C59; color: white; text-align: left; margin-bottom: 1vh; padding: 1vh;">
        <a href="equipos/cpu.php" style="margin: 1vh" ;> <?php echo $equipos; ?></a>
        <a href="label/nav/select.php" style="margin: 1vh"; > <?php echo $tag; ?></a>
        
    </header>

    <form action="" method="POST">
        <div style="align-items: right; display: flex; justify-content: right; width: 100%; height: 4vh;">
            <input type="text" id="user" name="user" placeholder="Buscar usuario" style="margin-right: 1vh;">
            <input type="submit" name="Buscar" value="Buscar" style="Background-color: #061E29; color: white;">
        </div>
    </form>

    <center>
        <div style="padding: 10vh; background-color: #F3F2EC; margin: 25vh; margin-left: 40vh; margin-right: 40vh;">
            <h1>
                <strong>Usuarios</strong>
            </h1>

            <table style="border: 1px solid black; width: 100%; text-align: center;">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Edad
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch(\PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($row['age'], ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </center>
</body>

</html>