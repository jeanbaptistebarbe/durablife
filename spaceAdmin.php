<?php
include 'header.php';
include 'controller/spaceAdminCtrl.php';
?>
<body> 
    <div class="container-fluid">
        <div class="row profilFile">  
            <?php foreach ($membersList as $members) { ?>         
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Date de naissance</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telephone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>                            
                            <td><?= $members->name ?></td>
                            <td><?= $members->firstname ?></td>
                            <td><?= $members->birthdate ?></td>
                            <td><?= $members->mail ?></td>
                            <td><?= $members->phone ?></td>
                            <td><a href="profilDelete.php?id=<?= $members->id ?>">Supprimer</a></td>
                        </tr>
                    </tbody>
                </table>
            <?php } ?> 

        </div>    
    </div>
</body>
<?php
include 'footer.php';
?>
</html>