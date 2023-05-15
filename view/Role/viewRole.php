<?php ob_start(); ?>

<p>There are <?= $requeteRole->rowCount() ?> roles</p>
<button><a href="http://localhost/Cinema-MVC/index.php?action=getAddRole">Add Role</a></button>

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
                    <td><?= $role["role"] ?></td>
                    
                </tr>
          <?php  } ?>
    </tbody>
</table>

<?php
$titre = "Liste des rôles";
$contenu = ob_get_clean();
require "view/template.php";
//Le require de fin permet d'injecter le contenu dans le template "squelette" > template.php