<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    require_once '../settings/conexion.php';
    //verificamos que no venga vacia y que este definida
    if (isset($_SESSION['data']) && !empty($_SESSION['data'])) {
        $data = $_SESSION['data'];
        $_SESSION['data'] = [];
        $query = $pdo->query("SELECT * FROM computadora");
    } else {
        echo "<script> alert('no se selecciono ninguno')</script>";
        header('location: ../label/nav/labelsgen.php');
    }
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style=" border: 1px solid black;">
        <table style="margin-top: 70px; padding-left: 25px;  padding-right: 25px;">
            <tbody>
                <?php $contador = 0; ?>
                <tr>
                    <?php if (in_array(0, $data)):
                        if ($contador > 0 && $contador % 3 === 0): ?>
                        </tr>
                        <tr>
                        <?php endif; ?>
                        <?php for ($j = 0; $j <= count($data); $j++): ?>
                            <?php if (isset($data[$j]) && $data[$j] === 0): ?>
                                <td style="width: 120px; height: 60px; border: 1px solid black; padding-left: 29.95px; padding-right: 29.95px; text-align: center; align-items: center; padding-top: 20px; 
                                padding-bottom: 7px; background-color: blue;">
                                </td>
                                <?php $contador++; ?>
                                <?php if ($contador > 0 && $contador % 3 === 0): ?>
                                </tr>
                                <tr>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endfor; ?>
                    <?php endif; ?>
                    <?php
                    while ($row = $query->fetch(\PDO::FETCH_ASSOC)): ?>
                        <?php if (in_array($row['id_c'], $data)):
                            if ($contador > 0 && $contador % 3 === 0): ?>
                            </tr>
                            <tr>
                            <?php endif; ?>
                            <td style="width: 120px; height: 60px; border: 1px solid black; padding-left: 29.95px; padding-right: 29.95px; text-align: center; align-items: center; padding-top: 20px; 
                            padding-bottom: 7px; background-color: red;">
                                <strong>Modelo:</strong>
                                <?php echo htmlspecialchars($row['modelo'], ENT_QUOTES, 'UTF-8'); ?>
                                <br>
                                <strong>Numero de serie:</strong>
                                <?php echo htmlspecialchars($row['ns'], ENT_QUOTES, 'UTF-8'); ?>
                            </td>
                            <?php $contador++; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>