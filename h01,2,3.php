<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Web Development, HTML, CSS, PHP">
    <meta name="author" content="IT-23 Grupp">
    <title>Harjutus 1-3</title>
<body>
    <h1>Ülesanne 1</h1>
    <?php
    print('"It\'s My Life - Dr. Alban"<br>');
    print('<br>');
    print('(\(\<br>(-.-)<br>o_(")(")');
    ?>

    <h1>Ülesanne 2</h1>

    <h2>Pythagorase teoreem</h2>
    <form method="get" action="kodutoo.php">
        Esimene külg: <input type="number" name="firstSide"><br>
        Teine külg: <input type="number" name="secondSide"><br>
        <input type="submit" value="Leia tulemus">
    </form>

    <?php
    if (!empty($_GET["firstSide"]) && !empty($_GET["secondSide"])) {
        $first = $_GET["firstSide"];
        $second = $_GET["secondSide"];
        $hypotenuse = sqrt($first ** 2 + $second ** 2);
        $triangleArea = ($first * $second) / 2;
        $trianglePerimeter = $first + $second + $hypotenuse;
        echo "Esimene külg: $first<br>";
        echo "Teine külg: $second<br>";
        echo "Pindala: $triangleArea<br>";
        echo "Ümbermõõt: $trianglePerimeter<br>";
    }
    ?>

    <h2>Pikkuse teisendamine</h2>
    <form method="get" action="kodutoo.php">
        Sisesta millimeetrid: <input type="number" name="lengthInMm">
        <input type="submit" value="Teisenda">
    </form>

    <?php
    if (!empty($_GET["lengthInMm"])) {
        $millimeters = $_GET["lengthInMm"];
        $centimeters = $millimeters / 10;
        $meters = $millimeters / 1000;
        echo "$millimeters mm on $centimeters cm või $meters m";
    }
    ?>

    <h2>Aritmeetilised tehted</h2>
    <?php
    $value1 = 10;
    $value2 = 14;

    echo "$value1 + $value2 = " . ($value1 + $value2) . "<br>";
    echo "$value1 - $value2 = " . ($value1 - $value2) . "<br>";
    echo "$value1 / $value2 = " . round($value1 / $value2, 2) . "<br>";
    echo "$value1 * $value2 = " . ($value1 * $value2) . "<br>";
    ?>

    <h1>Ülesanne 3</h1>
    <form method="get" action="">
        Alus 1: <input type="number" name="base1" required min="1"><br>
        Alus 2: <input type="number" name="base2" required min="1"><br>
        Kõrgus: <input type="number" name="height" required min="1"><br>
        <input type="submit" value="Arvuta pindala ja ümbermõõt">
    </form>

    <?php
    if (!empty($_GET["base1"]) && !empty($_GET["base2"]) && !empty($_GET["height"])) {
        $base1 = $_GET["base1"];
        $base2 = $_GET["base2"];
        $height = $_GET["height"];
        $trapezoidSurface = ($base1 + $base2) / 2 * $height;
        $rhombusCircumference = 4 * $base1;
        echo "Alus 1: $base1<br>";
        echo "Alus 2: $base2<br>";
        echo "Kõrgus: $height<br>";
        echo "Trapetsi pindala: $trapezoidSurface<br>";
        echo "Rombi ümbermõõt: $rhombusCircumference<br>";
    }
    ?>
</body>
</html>