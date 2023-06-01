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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/style.css">
    <title>Cinema/<?= $titre ?> </title>
</head>
<header>

    <section>
        <nav class="navigation">
            <div class="logo-title">
                <img src="public/img/Logo.png" width="30">
                <p><a href="index.php?action=landingPage">Mooviz</a></p>
            </div>
            <ul class="navigation">
                <li><a href="index.php?action=listFilms">MOVIES</a></li>
                <li><a href="index.php?action=listGenres">GENRES</a></li>
                <li><a href="index.php?action=listRoles">ROLES</a></li>
                <li><a href="index.php?action=listActors">ACTORS</a></li>
                <li><a href="index.php?action=listDirectors">DIRECTORS</a></li>
                <li>
                    <select onchange="location = this.value;">
                        <option>--ADD INFOS</option>
                        <option value="index.php?action=getAddFilm">ADD MOVIES</option>
                        <option value="index.php?action=getAddGenre">ADD GENRES</option>
                        <option value="index.php?action=getAddRole">ADD ROLES</option>
                        <option value="index.php?action=getAddActor">ADD ACTORS</option>
                        <option value="index.php?action=getAddDirector">ADD DIRECTORS</option>
                        <option value="index.php?action=getAddCasting">ADD CASTING</option>
                    </select>
                </li>
            </ul>

            <!-- A modifier !!!  -->
            <div class="user-img">
                <a href="index.php?action=userSession"><p><?=$_SESSION["username"]?></p></a>
                <a href="index.php?action=user"><img src="public/img/profile-user.png"></a>
            </div>
        </nav>
    </section>

</header>
<body>
    
    <main>
        <?= $contenu ?>
    </main>
    
    
    <script src="public/js/script.js"></script>
</body>
</html>