<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CourseXchange</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="<?= PUBLIC_DIRECTORY . 'css' . DIRECTORY_SEPARATOR . 'style.css' ?>">
</head>

<body>
    <!-- Hide or show navbar and container-->
    <?php if ($_GET['url'] !== 'login' && $_GET['url'] !== 'signup') { ?>

        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <div class="navbar-flex-container d-flex align-items-end">
                    <a href="/CourseXchange/" class=" me-2">
                        <div class="navbar-logo-container">
                            <img class="w-100" src="<?= PUBLIC_DIRECTORY . 'src/logo-epsi.png' ?>" alt="logo-epsi">
                        </div>
                    </a>
                    <a class="navbar-brand" href="/CourseXchange/">CourseXchange</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-capitalize" aria-current="page" href="/CourseXchange/">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-capitalize" aria-current="page" href="#">Forum</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 navbar-right">
                <!-- Si je suis co -->
                <?php if (isset($_SESSION['authorization'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/CourseXchange/logout"><i class="fas fa-power-off"></i></a>
                    </li>
                <?php } ?>
            </ul>
            <div class="navbar-motif-container">
                <img class="navbar-motif" src="<?= PUBLIC_DIRECTORY . 'src/motifs-bas-droite.png' ?>" alt="motif-bas-droite">
            </div>
        </nav>

        <div class="container p-5 w-100">
            <?= $content; ?>
        </div>

    <?php } else { ?>
        <?= $content; ?>
    <?php } ?>
</body>

</html>