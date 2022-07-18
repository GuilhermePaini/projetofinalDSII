<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <title>Projeto final</title>
</head>

<body style="background-color: #cffffe;">
    <nav class="navbar fixed-top" style="background-color: #34ebe5;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">MEDICAL MED</a>
            <div class="d-flex">
                <?= $this->renderSection('nav-right') ?>
            </div>
        </div>
    </nav>
    
    <div class="container py-3 mt-5 bg-light bg-gradient">
        <?= $this->renderSection('content') ?>
    </div>
</body>
<footer>
</footer>
</html>