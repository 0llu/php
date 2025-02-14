<?php
echo "<!doctype html>
<html lang='et'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>PHP Harjutused</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
</head>
<body>
    <div class='container'>
        <h1>Harjutus 06</h1>
        <div class='row'>
            <div class='col-md-4'>";

echo "<h2>1. Genereeri arvud 1-100</h2>";
for ($i = 1; $i <= 100; $i++) {
    echo $i . ' ';
    if ($i % 10 == 0) {
        echo '<br>';
    }
}

echo "<h2>2. 1-10 reavahetustega</h2>";
for ($i = 1; $i <= 10; $i++) {
    echo $i . '<br>';
}

echo "<h2>3. 1-10 punktidega</h2>";
for ($i = 1; $i <= 10; $i++) {
    echo "$i. ";
}

echo "<h2>4. Horisontaalne</h2>";
echo str_repeat('*', 10);

echo "<h2>5. Vertikaalne</h2>";
for ($i = 1; $i <= 10; $i++) {
    echo '*<br>';
}

echo "<h2>6. Ruut</h2>";
$ruuduSuurus = 5;
for ($i = 1; $i <= $ruuduSuurus; $i++) {
    echo str_repeat('* ', $ruuduSuurus) . '<br>';
}

echo "<h2>7. Kahanevad arvud</h2>";
for ($i = 10; $i >= 1; $i--) {
    echo $i . '<br>';
}

echo "<h2>8. Kolmega jagunevad arvud</h2>";
for ($i = 1; $i <= 100; $i++) {
    if ($i % 3 == 0) {
        echo $i . ' ';
    }
}

echo "<h2>9. Tüdrukute ja poiste paarid</h2>";
$naised = array('Anna', 'Maria', 'Liisa');
$mehed = array('Andres', 'Joosep', 'Peeter');

for ($i = 0; $i < count($naised); $i++) {
    echo $naised[$i] . ' - ' . $mehed[$i] . '<br>';
}

echo "<h2>10. Suvalised paarid</h2>";
shuffle($naised);
shuffle($mehed);

for ($i = 0; $i < count($naised); $i++) {
    echo $naised[$i] . ' - ' . $mehed[$i] . '<br>';
}

echo "          </div>
        </div>
    </div>
</body>
</html>";
?>