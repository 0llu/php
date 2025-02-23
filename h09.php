<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ülesanne 9</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Ülesanne 9</h1>

        <h2>Tervitamine</h2>
        <form method="post" class="mb-4">
            <div class="form-group">
                <label for="nimi">Sisesta oma nimi:</label>
                <input type="text" name="nimi" class="form-control" required>
            </div>
            <button type="submit" name="tervita" class="btn btn-primary">Tervita</button>
        </form>
        <?php
        if (isset($_POST['tervita'])) {
            function korrigeeriNimi($nimi) {
                return ucfirst(strtolower($nimi)); // Muudab nime alguse suureks täheks
            }
            $nimi = $_POST['nimi'];
            echo "<p>Tere, " . korrigeeriNimi($nimi) . "!</p>";
        }
        ?>

        <h2>Tähtede eraldamine punktidega</h2>
        <form method="post" class="mb-4">
            <div class="form-group">
                <label for="sona">Sisesta sõna:</label>
                <input type="text" name="sona" class="form-control" required>
            </div>
            <button type="submit" name="eraldaTahhed" class="btn btn-primary">Eralda tähed</button>
        </form>
        <?php
        if (isset($_POST['eraldaTahhed'])) {
            function eraldaTahhed($sona) {
                $tulemus = "";
                for ($i = 0; $i < strlen($sona); $i++) {
                    $tulemus .= strtoupper($sona[$i]) . "."; // Lisab iga tähe järele punkti
                }
                return rtrim($tulemus, "."); // Eemaldab viimase punkti
            }
            $sona = $_POST['sona'];
            echo "<p>" . eraldaTahhed($sona) . "</p>";
        }
        ?>

        <h2>Roppude sõnade asendamine</h2>
        <form method="post" class="mb-4">
            <div class="form-group">
                <label for="sonum">Sisesta sõnum:</label>
                <textarea name="sonum" class="form-control" required></textarea>
            </div>
            <button type="submit" name="asendaRopud" class="btn btn-primary">Asenda roppused</button>
        </form>
        <?php
        if (isset($_POST['asendaRopud'])) {
            function asendaRopud($sonum) {
                $ropud = ["noob", "loll", "idioot", "rumal", "taun", "sitt", "pask", "gei", "homo", "pede"]; // Roppude sõnade loend
                foreach ($ropud as $ropp) {
                    $sonum = str_ireplace($ropp, "***", $sonum); // Asendab roppused tärnidega
                }
                return $sonum;
            }
            $sonum = $_POST['sonum'];
            echo "<p>" . asendaRopud($sonum) . "</p>";
        }
        ?>

        <h2>Emaili loomine</h2>
        <form method="post" class="mb-4">
            <div class="form-group">
                <label for="eesnimi">Eesnimi:</label>
                <input type="text" name="eesnimi" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="perenimi">Perenimi:</label>
                <input type="text" name="perenimi" class="form-control" required>
            </div>
            <button type="submit" name="looEmail" class="btn btn-primary">Loo email</button>
        </form>
        <?php
        if (isset($_POST['looEmail'])) {
            function looEmail($eesnimi, $perenimi) {
                $asendused = [
                    'ä' => 'a', 'ö' => 'o', 'ü' => 'y', 'õ' => 'o',
                    'Ä' => 'A', 'Ö' => 'O', 'Ü' => 'Y', 'Õ' => 'O'
                ];
                $eesnimi = strtr($eesnimi, $asendused);
                $perenimi = strtr($perenimi, $asendused);
                $email = strtolower($eesnimi) . "." . strtolower($perenimi) . "@hkhk.edu.ee";
                return $email;
            }
            $eesnimi = $_POST['eesnimi'];
            $perenimi = $_POST['perenimi'];
            echo "<p>Email: " . looEmail($eesnimi, $perenimi) . "</p>";
        }
        ?>
    </div>
</body>
</html>