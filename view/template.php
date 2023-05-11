<?php
// Du coup dans notre "template.php" on aura des variables qui vont accueillir les éléments provenant des vues
//Donc DANS CHAQUE VUE, il faudra toujours donner une valeur à $titre, $contenu et $titre_secondaire
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>Cinema/<?= $titre ?> </title>
</head>
<header>

    <section>
        <nav class="navigation">
            <div class="logo-title">
                <img src="Cinema-MVC/public/img/Logo.png">
                <p>Mooviz</p>
            </div>
            <ul>
                <a href="Film/viewFilm.php"><li>MOVIES</li></a>
                <a href="viewGenre.php"><li>GENRES</li></a>
                <a href="viewRole.php"><li>ROLES</li></a>
                <a href="viewActor.php"><li>ACTORS</li></a>
                <a href="viewDirector.php"><li>DIRECTORS</li></a>
                <li>ADD INFOS
                    <select>
                        <option></option>
                        <option>ADD MOVIES</option>
                        <option>ADD GENRES</option>
                        <option>ADD ROLES</option>
                        <option>ADD ACTORS</option>
                        <option>ADD DIRECTORS</option>
                        <option>ADD CASTING</option>
                    </select>
                </li>
            </ul>
        </nav>
    </section>

    <script src="/public/js/script.js"></script>
</header>
<body>

    <?= $contenu ?>

</body>
</html>