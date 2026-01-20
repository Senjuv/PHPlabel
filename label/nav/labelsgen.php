<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    session_start();
    
    if (!isset($_SESSION['data'])) {
        $_SESSION['data'] = [];
    }
    require_once '../../settings/conexion.php';
    require_once '../../media/svg.php';

    $query = $pdo->query("SELECT * FROM computadora");
    $context = false;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['id'])) {
            $row = $_POST['id'];
            array_push($_SESSION['data'], $row);
        } else {
        }
            $count = array_count_values($_SESSION['data']);
            for ($i = 0; $i <= count($_SESSION['data']); $i++) {
                if (isset($count[$i]) && $count[$i] > 1) {
                    $_SESSION['data'] = array_diff($_SESSION['data'], [$i]);  //usaremos array_diff para eliminar por el valor cuando hayamos detectado una duplicacion en los id y selecciones
                }
            }
        if (!isset($_POST['emptylb'])) {
            $context = true;
        } else {
            if (!empty($_POST['emptylb'])) {
                for ($i = 0; $i < $_POST['emptylb']; $i++) {
                    array_unshift($_SESSION['data'], 0);
                    if ($i === $_POST['emptylb'] - 1) {
                        $url = "../gen.php";
                        echo "<script>window.open('$url', '_blank');</script>";
                    }
                }
            } else {
                $url = "../gen.php";
                echo "<script>window.open('$url');</script>";
            }
        }
    }
    ?>

</head>

<body>
    <header style="background-color: #2D3C59; color: white; text-align: left; margin-bottom: 1vh; padding: 1vh;">
        <a href="../../index.php" style="margin: 1vh" title="home" ;> <?php echo $home; ?></a>
        <a href="#" style="margin: 1vh" title="equipos" ;> <?php echo $equipos; ?></a>
    </header>

    <script>
        function rows(id) {
            let row = [id]
            fetch("labelsgen.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "id=" + encodeURIComponent(row)
            })
                .then(res => res.text())
                .then(data => console.log(data))
                .catch(err => console.error("Error:", err));
        }
    </script>
    <?php if ($context === false): ?>
        <center>
            <div style="padding: 10vh; background-color:#F3F2EC; margin: 25vh; margin-left: 40vh; margin-right: 40vh;">
                <table>
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Numero de serie
                            </th>
                            <th>
                                Modelo
                            </th>
                            <th>
                                Seleccionar
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($row = $query->fetch(\PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id_c'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['ns'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['modelo'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td>
                                    <form action="">
                                        <input type="checkbox" name="id" id="id<?php echo $row['id_c'] ?>"
                                            onclick="rows(<?php echo $row['id_c'] ?>)" value="" placeholder="Seleccion">
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <form action="" method="post">
                    <input type="submit" style="background-color: aliceblue; color: black; width: 80px; text-align: center;
                height: 30px; margin-left: 400px; margin-top: 50px" title="enviar" name="enviar" id="enviar">
                </form>
            </div>
        </center>
    <?php endif; ?>
    <?php if ($context === true): ?>
        <center>
            <div style="padding: 10vh; background-color:#F3F2EC; margin: 25vh; margin-left: 40vh; margin-right: 40vh;">
                <form action="" method="post">
                    <input type="text" name="emptylb" id="emptylb" value="" placeholder="Ingrese los espacios vacios"
                        style="height: 30px; width: 350px; margin-left: -100px;">
                    <br>
                    <input type="submit" style="background-color: aliceblue; color: black; width: 80px; text-align: center;
                height: 30px; margin-left: 400px; margin-top: 50px" title="enviar" name="enviar" id="enviar">
                </form>
            </div>
        </center>
    <?php endif; ?>
</body>

</html>