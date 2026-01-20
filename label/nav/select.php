<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once '../../settings/conexion.php';
    require_once '../../media/svg.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header style="background-color: #2D3C59; color: white; text-align: left; margin-bottom: 1vh; padding: 1vh;">
        <a href="../../index.php" style="margin: 1vh" ;> <?php echo $home; ?></a>
        <a href="#" style="margin: 1vh" ;> <?php echo $equipos; ?></a>
    </header>

</body>
<div style="display:grid; grid-template-columns: repeat(2, 1fr); margin: 100px; align-items: center; text-align: center;
    height: 200px; padding-left: 100px; padding-right: 80px; padding-top: 40px; padding-bottom: 40px; gap: 200px;">
    <div style="padding: 20px;">
        <div
            style="background-color: #F3F2EC; width: 400px; margin: auto; padding: 20px; box-shadow: 3px 5px 4px gray;">
            <?php echo "<a href='labelsgen.php?c=1'> $computer </a>" ?>
            <legend style="color: #061E29; font-size: 18px;">Computadoras</legend>
        </div>
    </div>
    <div style="padding: 20px;">
        <div
            style="background-color: #F3F2EC; width: 400px; margin: auto; padding: 20px; box-shadow: 3px 5px 4px gray;">
            <?php echo "<a href='labelsgen.php?c=2'> $monitor </a>" ?>
            <legend style="color: #061E29; font-size: 18px;">Monitores</legend>
        </div>
    </div>
</div>

</html>