<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ülesanne 7</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Ülesanne 7</h1>

        <h2>Tervitus</h2>
        <form method="post" class="mb-4">
            <button type="submit" name="tervita" class="btn btn-primary">Tervita mind</button>
        </form>
        <?php
        if (isset($_POST['tervita'])) {
            function tervita() {
                return "Tere päiksekesekene!";
            }
            echo "<p>" . tervita() . "</p>";
        }
        ?>

        <h2>Liitu uudiskirjaga</h2>
        <form method="post" class="mb-4">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button type="submit" name="liitu" class="btn btn-primary">Liitu</button>
        </form>
        <?php
        if (isset($_POST['liitu'])) {
            $email = htmlspecialchars($_POST['email']);
            echo "<p>Aitäh, $email! Oled nüüd uudiskirjaga liitunud.</p>";
        }
        ?>

        <h2>Kasutajanimi ja email</h2>
        <form method="post" class="mb-4">
            <div class="form-group">
                <label for="kasutajanimi">Kasutajanimi:</label>
                <input type="text" name="kasutajanimi" class="form-control" required>
            </div>
            <button type="submit" name="genereeri" class="btn btn-primary">Genereeri info</button>
        </form>
        <?php
        if (isset($_POST['genereeri'])) {
            function kasutajaInfo($kasutajanimi) {
                $kasutajanimi = strtolower($kasutajanimi);
                $email = $kasutajanimi . "@hkhk.edu.ee";
                $kood = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 7);
                return [
                    'kasutajanimi' => $kasutajanimi,
                    'email' => $email,
                    'kood' => $kood
                ];
            }
            $kasutaja = kasutajaInfo($_POST['kasutajanimi']);
            echo "<p>Kasutajanimi: " . $kasutaja['kasutajanimi'] . "</p>";
            echo "<p>Email: " . $kasutaja['email'] . "</p>";
            echo "<p>Kood: " . $kasutaja['kood'] . "</p>";
        }
        ?>

        <h2>Arvud</h2>
        <form method="post" class="mb-4">
            <div class="form-group">
                <label for="algus">Algus:</label>
                <input type="number" name="algus" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lopp">Lõpp:</label>
                <input type="number" name="lopp" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="samm">Samm:</label>
                <input type="number" name="samm" class="form-control" required>
            </div>
            <button type="submit" name="genereeriArvud" class="btn btn-primary">Genereeri arvud</button>
        </form>
        <?php
        if (isset($_POST['genereeriArvud'])) {
            function genereeriArvud($algus, $lopp, $samm) {
                $arvud = [];
                for ($i = $algus; $i <= $lopp; $i += $samm) {
                    $arvud[] = $i;
                }
                return implode(", ", $arvud);
            }
            $algus = $_POST['algus'];
            $lopp = $_POST['lopp'];
            $samm = $_POST['samm'];
            echo "<p>Arvud: " . genereeriArvud($algus, $lopp, $samm) . "</p>";
        }
        ?>

        <h2>Ristküliku pindala</h2>
        <form method="post" class="mb-4">
            <div class="form-group">
                <label for="pikkus">Pikkus:</label>
                <input type="number" name="pikkus" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="laius">Laius:</label>
                <input type="number" name="laius" class="form-control" required>
            </div>
            <button type="submit" name="arvutaPindala" class="btn btn-primary">Arvuta pindala</button>
        </form>
        <?php
        if (isset($_POST['arvutaPindala'])) {
            function ristkylikuPindala($pikkus, $laius) {
                return $pikkus * $laius;
            }
            $pikkus = $_POST['pikkus'];
            $laius = $_POST['laius'];
            echo "<p>Ristküliku pindala: " . ristkylikuPindala($pikkus, $laius) . "</p>";
        }
        ?>

        <h2>Isikukood</h2>
        <form method="post" class="mb-4">
            <div class="form-group">
                <label for="isikukood">Isikukood:</label>
                <input type="text" name="isikukood" class="form-control" required>
            </div>
            <button type="submit" name="kontrolliIsikukood" class="btn btn-primary">Kontrolli</button>
        </form>
        <?php
        if (isset($_POST['kontrolliIsikukood'])) {
            function kontrolliIsikukood($isikukood) {
                if (strlen($isikukood) != 11) {
                    return "Isikukood peab olema 11 numbrit pikk!";
                }
                $sugu = (int)substr($isikukood, 0, 1) % 2 == 0 ? "Naine" : "Mees";
                $sunniaeg = substr($isikukood, 1, 2) . "." . substr($isikukood, 3, 2) . "." . substr($isikukood, 5, 2);
                return "Sugu: $sugu, Sünniaeg: $sunniaeg";
            }
            $isikukood = $_POST['isikukood'];
            echo "<p>" . kontrolliIsikukood($isikukood) . "</p>";
        }
        ?>

        <h2>Head mõtted</h2>
        <form method="post" class="mb-4">
            <button type="submit" name="genereeriLause" class="btn btn-primary">Genereeri lause</button>
        </form>
        <?php
        if (isset($_POST['genereeriLause'])) {
            function genereeriLause() {
                $alus = ["Koer", "Kass", "Lind"];
                $öeldis = ["jookseb", "hüppab", "lendab"];
                $sihitis = ["metsas", "aias", "pargis"];
                $valikAlus = $alus[array_rand($alus)];
                $valikÖeldis = $öeldis[array_rand($öeldis)];
                $valikSihitis = $sihitis[array_rand($sihitis)];
                return "$valikAlus $valikÖeldis $valikSihitis.";
            }
            echo "<p>" . genereeriLause() . "</p>";
        }
        ?>
    </div>
</body>
</html>