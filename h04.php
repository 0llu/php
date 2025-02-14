<?php
echo "<!doctype html>
<html lang='et'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Harjutus 4</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
</head>
<body>
    <div class='container mt-5'>
        <h1 class='text-center mb-4'>Harjutus 4</h1>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div style='border: 2px solid #0d6efd; border-radius: 10px; padding: 20px; margin-top: 20px;'>
                    <form method='get' class='mb-4'>
                        <div class='mb-3'>
                            <label for='input1' class='form-label'>Sisesta esimene täisarv</label>
                            <input type='number' class='form-control' id='input1' name='input1' required>
                        </div>
                        <div class='mb-3'>
                            <label for='input2' class='form-label'>Sisesta teine täisarv</label>
                            <input type='number' class='form-control' id='input2' name='input2' required>
                        </div>
                        <button type='submit' class='btn btn-primary w-100'>Käivita arvutused</button>
                    </form>";

if (isset($_GET["input1"]) && isset($_GET["input2"])) {
    $value1 = intval($_GET["input1"]);
    $value2 = intval($_GET["input2"]);

    if ($value2 == 0) {
        echo "<div class='alert alert-danger' style='margin-top: 10px;'>Viga: Nulliga jagamine ei ole lubatud!</div>";
    } else {
        $result = $value1 / $value2;
        echo "<div class='alert alert-success' style='margin-top: 10px;'>Tulemus: $value1 / $value2 = " . number_format($result, 2) . "</div>";
    }

    if ($value1 > $value2) {
        echo "<div class='alert alert-info' style='margin-top: 10px;'>Märkus: Esimene arv on suurem kui teine.</div>";
    } elseif ($value1 < $value2) {
        echo "<div class='alert alert-info' style='margin-top: 10px;'>Märkus: Esimene arv on väiksem kui teine.</div>";
    } else {
        echo "<div class='alert alert-info' style='margin-top: 10px;'>Märkus: Mõlemad arvud on võrdsed.</div>";
    }

    if ($value1 == $value2) {
        echo "<div class='alert alert-warning' style='margin-top: 10px;'>
                Geomeetria: Tegemist on ruuduga!
                <img width='50' src='https://d1nhio0ox7pgb.cloudfront.net/_img/o_collection_png/green_dark_grey/64x64/plain/shape_square.png' alt='Ruut' class='d-block mt-2'>
              </div>";
    } else {
        echo "<div class='alert alert-warning' style='margin-top: 10px;'>
                Geomeetria: Tegemist on ristkülikuga!
                <img width='50' src='https://cdn-icons-png.flaticon.com/512/5895/5895916.png' alt='Ristkülik' class='d-block mt-2'>
              </div>";
    }

    if ($value1 % 5 == 0) {
        echo "<div class='alert alert-dark' style='margin-top: 10px;'>Juubel: Esimene arv on 5-ga jaguv!</div>";
    } else {
        echo "<div class='alert alert-dark' style='margin-top: 10px;'>Juubel: Esimene arv ei ole 5-ga jaguv.</div>";
    }

    if ($value1 >= 10) {
        echo "<div class='alert alert-primary' style='margin-top: 10px;'>Hinnang: SUPER!</div>";
    } elseif ($value1 >= 5) {
        echo "<div class='alert alert-primary' style='margin-top: 10px;'>Hinnang: TEHTUD!</div>";
    } else {
        echo "<div class='alert alert-primary' style='margin-top: 10px;'>Hinnang: Kasin!</div>";
    }
}

echo "          </div>
            </div>
        </div>
    </div>
</body>
</html>";
?>