<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet"> 

    <title>Projeto final</title>
</head>

<body class="bg-light bg-gradient">
    <nav class="navbar shadow fixed-top" style="background-color: #34ebe5;">
        <div class="container-fluid">
            <a class="navbar-brand fs-4" href="/">
                <img src="https://www.pngmart.com/files/4/Sonic-The-Hedgehog-Logo-PNG-Picture.png" alt="" width="45">
            </a>
            <div class="d-flex">
                <?= $this->renderSection('nav-right') ?>
            </div>
        </div>
    </nav>
    
    <div class="container py-5 mt-5">
        <?= $this->renderSection('content') ?>
    </div>
</body>
</html>

<style>
    <?= $this->renderSection('style') ?>
    body {
        font-family: 'Acme', sans-serif;
    }
</style>