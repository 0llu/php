<!doctype html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Serman.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .navbar {
            background-color: #f8f9fa; 
        }
        .navbar-brand {
            margin-left: 20px; 
        }
        .navbar-nav {
            margin-right: 20px;
        }
        .banner-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .banner {
            position: relative;
            width: 48%;
            height: 400px;
            overflow: hidden;
        }
        .banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .banner-text {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            color: white;
        }
        .banner-text h2 {
            font-size: 24px;
            font-weight: bold;
        }
        .banner-text p {
            font-size: 16px;
            font-weight: bold;
        }
        .banner-text button {
            background-color: transparent;
            border: 1px solid white;
            color: white;
            padding: 10px 20px;
            margin-top: 10px;
        }
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
        }
        footer p {
            margin: 0;
            text-align: left;
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand p-2" href="#">Serman.com</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Avaleht</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pood.php">Pood</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kontakt.php">Kontakt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Admin</a>
                    </li>
                    <li class="nav-item text-center mt-2">
                        <i class="bi bi-bag"></i>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container banner-container">
        <div class="banner">
            <img src="img/pilt1.jpg" alt="Banner 1">
            <div class="banner-text">
                <h2>parim pakkumine</h2>
                <p>osta 1 saad 1</p>
                <p>The best classic dress is on sale at coro</p>
                <button>Vaata lähemalt</button>
            </div>
        </div>
        <div class="banner">
            <img src="img/pilt2.jpg" alt="Banner 2">
            <div class="banner-text">
                <h2>kevad7suvi</h2>
                <p>kõik rohelised</p>
                <p>20% soodsamalt</p>
                <button>Tutvu lähemalt</button>
            </div>
        </div>
    </div>

    <?php
    if (!empty($_GET['leht'])) {
        $leht = htmlspecialchars($_GET['leht']);
        $lubatud = array('pood', 'kontakt', 'admin');
        $kontroll = in_array($leht, $lubatud);
        if ($kontroll == true) {
            include($leht . '.php');
        } else {
            echo '<h1 class="text-center mt-4">Lehte ei eksisteeri!</h1>';
        }
    } else {
        ?>
        <div class="container">
            <div class="row text-center mt-5 mb-5">
                <h2 class="fw-bold">Parimad pakkumised</h2>
            </div>
            <div class="row">
                <?php
                if ($csv = fopen("tooted.csv", "r")) {
                    fgetcsv($csv);
                    while ($andmed = fgetcsv($csv)) {
                        echo "
                        <div class='col-md-4 mb-4'>
                            <div class='card'>
                                <img src='{$andmed[0]}' class='card-img-top' alt='{$andmed[1]}'>
                                <div class='card-body'>
                                    <h5 class='card-title fw-bold'>{$andmed[1]}</h5>
                                    <p class='card-text'>{$andmed[2]}€</p>
                                </div>
                            </div>
                        </div>";
                    }
                    fclose($csv);
                }
                ?>
            </div>
        </div>
        <?php
    }
    ?>

    <footer>
        <div class="container">
            <p>Serman.com</p>
        </div>
    </footer>
</body>
</html>