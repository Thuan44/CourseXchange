<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO NordCoders</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
    <link rel="stylesheet" href="<?= PUBLIC_DIRECTORY . 'css' . DIRECTORY_SEPARATOR . 'style.css' ?>">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/CourseXchange/">CourseXchange</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/CourseXchange/">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Forum</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container pt-5 w-100">
        <?= $content; ?>
    </div>
</body>

</html>