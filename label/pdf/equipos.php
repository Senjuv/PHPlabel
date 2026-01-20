<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include '../settings/conexion.php';
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $date = date('Y-m-d H:i:s');
        $query = $pdo->query("SELECT * FROM computadora WHERE id_c = " . $_GET['c']);
        $row = $query->fetch(\PDO::FETCH_ASSOC);

        $query2 = $pdo->query("SELECT name FROM users WHERE id = " . $row['usuario_id']);
        $user = $query2->fetch(\PDO::FETCH_ASSOC);
    }
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div style="padding: 20px;">
        <table style=" margin-bottom: 20px;">
            <thead>
                <tr>
                    <th style=" width: 367px; height: 30px;">
                        <p style='text-align: left; font-size:15px;'><strong>Nombre:</strong></p>
                    </th>
                    <th style="">
                        <p style='text-align: right; font-size:15px;'><strong>Fecha:</strong></p>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="">
                        <?php echo "<p style='text-align: left; font-size:15px; height: 50px;'> $user[name] </p>"; ?>
                    </td>
                    <td style=" width: 367px; height: 50px;">
                        <?php echo "<p style='text-align: right; font-size:15px;'> $date </p>"; ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="margin-top: 100px; border: 1px solid black; height: 50px;">
            <thead>
                <tr>
                    <th style="border: 1px solid black; height: 50px; width: 120px; height: 50px;">
                        <p style='text-align: left; font-size:15px; padding-left: 5px;'><strong>Numero de
                                serie:</strong></p>
                    </th>
                    <th style="border: 1px solid black; height: 50px; width: 112px; height: 50px;">
                        <p style='text-align: left; font-size:15px; height: 50px; padding-left: 5px;'>
                            <strong>Modelo:</strong>
                        </p>
                    </th>
                    <th style="border: 1px solid black; height: 50px; width: 112px; height: 50px;">
                        <p style='text-align: left; font-size:15px; height: 50px; padding-left: 5px;'>
                            <strong>Marca:</strong>
                        </p>
                    </th>
                    <th style="border: 1px solid black; height: 50px; width: 120px; height: 50px;">
                        <p style='text-align: left; font-size:15px; height: 50px; padding-left: 5px;'>
                            <strong>Procesador:</strong>
                        </p>
                    </th>
                    <th style="border: 1px solid black; height: 50px; width: 133px; height: 50px;">
                        <p style='text-align: left; font-size:15px; height: 50px; padding-left: 5px;'>
                            <strong>Almacenamiento:</strong>
                        </p>
                    </th>
                    <th style="border: 1px solid black; height: 50px; width: 112px; height: 50px;">
                        <p style='text-align: left; font-size:15px; height: 50px; padding-left: 5px;'>
                            <strong>RAM:</strong>
                        </p>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border: 1px solid black; height: 50px;">
                        <?php echo "<p style='text-align: center; font-size:15px; '> $row[ns] </p>"; ?>
                    </td>
                    <td style="border: 1px solid black; height: 50px; width: 100px; height: 50px;">
                        <?php echo "<p style='text-align: center; font-size:15px; '> $row[modelo] </p>"; ?>
                    </td>
                    <td style="border: 1px solid black; height: 50px; width: 100px; height: 50px;">
                        <?php echo "<p style='text-align: center; font-size:15px; '> $row[marca] </p>"; ?>
                    </td>
                    <td style="border: 1px solid black; height: 50px; width: 100px; height: 50px;">
                        <?php echo "<p style='text-align: center; font-size:15px; '> $row[procesador] </p>"; ?>
                    </td>
                    <td style="border: 1px solid black; height: 50px; width: 100px; height: 50px;">
                        <?php echo "<p style='text-align: center; font-size:15px; '> $row[almacenamiento] </p>"; ?>
                    </td>
                    <td style="border: 1px solid black; height: 50px; width: 100px; height: 50px;">
                        <?php echo "<p style='text-align: center; font-size:15px; '> $row[ram] </p>"; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div style="margin: 50px;">
        <hr>
        <table>
            <thead>
                <tr>
                    <th style="height: 100px; width: 340px; padding-top: 100px;">
                        <p><strong>Firma el responsable:</strong></p>
                    </th>
                    <th style="height: 100px; width: 350px; padding-top: 100px;">
                        <p><strong>Firma <?php echo $user['name']; ?> :</strong></p>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding-top: -90px; padding-right: 100px;">
                        <hr>
                    </td>
                    <td style="padding-top: -90px; padding-right: 100px;">
                        <hr>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>