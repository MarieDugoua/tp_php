<?php
$id = $_SESSION['id'];

// On recupére les offres
$query = $pdo->prepare('SELECT * FROM applys ');
$query->execute();

$apply = $query->fetchAll();

$apply_id = $apply[0]['id'];

if(isset($_POST['submit_fav'])){
    if(!empty($_POST)){
        
        // Insertion
        $req = $pdo->prepare('INSERT INTO favoris(id_user, id_apply) VALUES(:id, :id_apply)');
        
        $req->bindValue(':id', intval($id));
        $req->bindValue(':id_apply',intval($apply_id));
        
        $req->execute();
        
        header('Location: index.php?id=6');
    
    }
}

?>

<div class="container">
    <div class="row bg-white">
        <div class="col">
            <h2 class="text-center">Les candidatures</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nom et prénom</th>
                    <th scope="col">Description</th>
                    <?php if (!isAdmin()):?>
                    <th scope="col">Ajoutez au Favoris</th>
                    <?php endif;?>
                </tr>
                </thead>
                <?php if (isAdmin()):?>
                <tbody>
                    <?php foreach ($apply as $v) {
                            echo '
                            <tr>
                                <td>'.$v['lastname'].' '. $v['firstname'].'</td>
                                <td>'.$v['description'].'</td>
                                <?php if (isCompany()):?>
                                <td>
                                    <form action="index.php?id=6" method="POST">
                                        <div class="btn_submit">
                                            <button type="submit" class="btn btn-primary" name="submit">Supprimer</button>
                                        </div>
                                    </form>
                                </td>
                                <?php if (isAdmin()):?>
                            </tr>
                            ';
                        }?>
                </tbody>
                <?php endif ?>
                <?php if (!isAdmin()):?>
                <tbody>
                    <?php foreach ($apply as $v) {
                            echo '
                            <tr>
                                <td>'.$v['lastname'].' '. $v['firstname'].'</td>
                                <td>'.$v['description'].'</td>
                             
                            ';
                        }?>
                            <?php if (isCompany()):?>
                                <td>
                                    <form action="index.php?id=6" method="POST">
                                        <div class="btn_submit">
                                            <button type="submit" class="btn btn-primary" name="submit">Favoris</button>
                                        </div>
                                    </form>
                                </td>
                                <?php endif ?>
                            </tr>
                </tbody>
                <?php endif ?>
            </table>
        </div>
    </div>
</div>