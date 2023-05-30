<?php ob_start(); ?>


<section>
    <p>There are <?= $requeteRole->rowCount() ?> roles <button class="cinema-button"><a href="index.php?action=getAddRole">Add Role</a></button></p>

<div  class="director-list-container">
    <table>
        <thead>
            <tr>
                <th>NAME</th>
            
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requeteRole->fetchAll() as $role){ ?>
                    <tr>
                        <td><a href="index.php?action=detailsRole&id=<?= $role["id_role"] ?>"><?= $role["role"] ?></td>  
                    </tr>
            <?php  } ?>
        </tbody>
    </table>

    <div class="image-role-container">
        <img src="public/img/Spiderman-se-balancer-dun-building-a-lautre.png" class="image-role">
    </div>
</section>
<?php
$titre = "Roles";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php