<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/css/bootstrap.css">
    <title><?= $data['title']; ?></title>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= BASE_URL; ?>">PHPmvc</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="<?= BASE_URL; ?>" id="homePage">Home<span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="<?= BASE_URL; ?>/orang" id="orangPage">Orang</a>
                    <a class="nav-link" href="<?= BASE_URL; ?>/about" id="aboutPage">About</a>
                </div>
            </div>
        </div>
    </nav>