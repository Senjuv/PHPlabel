<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'settings/conexion.php';
    include 'media/svg.php';

    if (!empty($_GET['user'])) {
        $id = $_GET['user'];
        $result = $pdo->query("SELECT id, name, age FROM users WHERE id = '$id'");
    } elseif (!empty($_GET['computadora'])) {
        $compu_id = $_GET['computadora'];
        $result = $pdo->query("SELECT * FROM computadora WHERE id_c = '$compu_id'");
    }
    else{
        header('location: index.php?alert=notfound');
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header style="background-color: #2D3C59; color: white; text-align: left; margin-bottom: 1vh; padding: 1vh;">
        <a href="index.php" style="margin: 1vh" ;>
            <?php echo $home; ?>
        </a>
        <a href="#" style="margin: 1vh" ;>
            <?php echo $equipos; ?>
        </a>
    </header>

    <div style="align-items: right; display: flex; justify-content: right; width: 100%; height: 4vh;">
        <button style="background-color: #061E29; color: white"><a href="index.php"
                style="color: white">Volver</a></button>
    </div>
    <center>
        <div style="padding: 10vh; background-color:#F3F2EC; margin: 25vh; margin-left: 40vh; margin-right: 40vh;">
            <h1>
                <?php if (!empty($_GET['user'])) {
                    echo "<Strong>Usuarios</Strong>";
                } elseif (!empty($_GET['computadora'])) {
                    echo "<Strong>Computadoras</Strong>";
                }
                ?>
            </h1>

            <table style="border: 1px solid black; width: 100%; text-align: center;">

                <thead>
                    <tr>
                        <th>
                            <?php if (!empty($_GET['user'])) {
                                echo "ID";
                            } elseif (!empty($_GET['computadora'])) {
                                echo "ID Computadora";
                            }
                            ?>
                        </th>
                        <th>
                            <?php if (!empty($_GET['user'])) {
                                echo "Nombre";
                            } elseif (!empty($_GET['computadora'])) {
                                echo "Marca";
                            }
                            ?>
                        </th>
                        <th>
                            <?php if (!empty($_GET['user'])) {
                                echo "Edad";
                            } elseif (!empty($_GET['computadora'])) {
                                echo "Modelo";
                            }
                            ?>
                        </th>
                        <?php if (!empty($_GET['user'])) {
                        } elseif (!empty($_GET['computadora'])) {
                            echo "<th>";
                            echo 'Numero de serie';
                            echo "</th>";
                        }
                        ?>
                        <?php if (!empty($_GET['user'])) {
                        } elseif (!empty($_GET['computadora'])) {
                            echo "<th>";
                            echo 'Procesador';
                            echo "</th>";
                        }
                        ?>
                        <?php if (!empty($_GET['user'])) {
                        } elseif (!empty($_GET['computadora'])) {
                            echo "<th>";
                            echo 'Ram';
                            echo "</th>";
                        }
                        ?>
                        <?php if (!empty($_GET['user'])) {
                        } elseif (!empty($_GET['computadora'])) {
                            echo "<th>";
                            echo 'Almacenamiento';
                            echo "</th>";
                        }
                        ?>
                        <?php if (!empty($_GET['user'])) {
                        } elseif (!empty($_GET['computadora'])) {
                            echo "<th>";
                            echo 'Usuario asignado';
                            echo "</th>";
                        }
                        ?>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($row = $result->fetch(\PDO::FETCH_ASSOC)): ?>

                        <tr>
                            <?php if (!empty($_GET['user'])): ?>
                                <td><?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['age'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <?php elseif (!empty($_GET['computadora'])): ?>
                                <td><?php echo htmlspecialchars($row['id_c'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['marca'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['modelo'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['ns'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['procesador'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['ram'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['almacenamiento'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <?php
                                $id_us = $row['usuario_id'];
                                $query = $pdo->query("SELECT id, name FROM users where id = $id_us");
                                $user = $query->fetch(\PDO::FETCH_ASSOC);
                                ?>
                                <td><?php echo htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                            
                            <?php endif; ?>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div>
        </div>
    </center>
</body>

</html>