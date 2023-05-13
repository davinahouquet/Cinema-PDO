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
                <p><a href="#">Mooviz</a></p>
            </div>
            <ul>
                <li><a href="Film/viewFilm.php">MOVIES</a></li>
                <li><a href="Genre/viewGenre.php">GENRES</a></li>
                <li><a href="Role/viewRole.php">ROLES</a></li>
                <li><a href="Actor/viewActor.php">ACTORS</a></li>
                <li><a href="Director/viewDirector.php">DIRECTORS</a></li>
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

    <script src="public/js/script.js"></script>
</header>
<body>

    <?= $contenu //Variable qui stocke les données entre ob_start et ob_clean dans les view?> 

</body>
</html>