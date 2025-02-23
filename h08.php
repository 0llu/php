<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ülesanne 8</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .season-img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Ülesanne 8</h1>

        <h2>Kuupäev ja kellaaeg</h2>
        <?php
        function kuvaKuupaev() {
            return date("d.m.Y H:i");
        }
        echo "<p>" . kuvaKuupaev() . "</p>";
        ?>

        <h2>Kasutaja vanus</h2>
        <form method="post" class="mb-4">
            <div class="form-group">
                <label for="sunniaasta">Sünniaasta:</label>
                <input type="number" name="sunniaasta" class="form-control" required>
            </div>
            <button type="submit" name="arvutaVanus" class="btn btn-primary">Arvuta vanus</button>
        </form>
        <?php
        if (isset($_POST['arvutaVanus'])) {
            function arvutaVanus($sunniaasta) {
                $praeguneAasta = date("Y");
                return $praeguneAasta - $sunniaasta;
            }
            $sunniaasta = $_POST['sunniaasta'];
            echo "<p>Kasutaja on või saab sellel aastal " . arvutaVanus($sunniaasta) . " aastat vanaks.</p>";
        }
        ?>

        <h2>Kooliaasta lõpuni jäänud päevad</h2>
        <?php
        function kooliaastaLopuni() {
            $praeguneKuupaev = new DateTime();
            $kooliaastaLopp = new DateTime(date("Y") . "-06-15");
            if ($praeguneKuupaev > $kooliaastaLopp) {
                $kooliaastaLopp->modify('+1 year');
            }
            $erinevus = $praeguneKuupaev->diff($kooliaastaLopp);
            return $erinevus->days;
        }
        echo "<p>Kooliaasta lõpuni on jäänud " . kooliaastaLopuni() . " päeva!</p>";
        ?>

        <h2>Aastaajale vastav pilt</h2>
        <?php
        function aastaajaPilt() {
            $kuu = date("n");
            if ($kuu >= 3 && $kuu <= 5) {
                return "kevad.jpg";
            } elseif ($kuu >= 6 && $kuu <= 8) {
                return "suvi.jpg";
            } elseif ($kuu >= 9 && $kuu <= 11) {
                return "sugis.jpg";
            } else {
                return "talv.jpg";
            }
        }
        $pildiFail = aastaajaPilt();
        echo "<img src='img/$pildiFail' alt='Aastaaja pilt' class='season-img'>";
        ?>
    </div>
</body>
</html>