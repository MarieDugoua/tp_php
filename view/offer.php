<?php
$id = $_SESSION['id'];

// On recupére les offres
$query = $pdo->prepare('SELECT * FROM offers ');
$query->execute();

$offer = $query->fetchAll();

$offer_id = $offer[0]['id'];

if(isset($_POST['submit_fav'])){
    if(!empty($_POST)){
        
        // Insertion
        $req = $pdo->prepare('INSERT INTO favoris(id_user, id_offer) VALUES(:id, :id_offer)');
        
        $req->bindValue(':id', intval($id));
        $req->bindValue(':id_offer',intval($offer_id));
        
        $req->execute();
        
        header('Location: index.php?id=5');
    
    }
}

?>

<div class="container">
    <div class="row bg-white">
        <div class="col">
            <h2 class="text-center">Offre d'emploi</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">L'entreprise</th>
                    <th scope="col">Le poste</th>
                    <th scope="col">Description</th>
                    <?php if (!isAdmin()):?>
                    <th scope="col">Ajoutez au Favoris</th>
                    <?php endif;?>
                </tr>
                </thead>
                <?php if (isAdmin()):?>
                <tbody>
                    <?php foreach ($offer as $v) {
                            echo '
                            <tr>
                                <td>'.$v['company_name'].'</td>
                                <td>'.$v['name'].'</td>
                                <td>'.$v['description'].'</td>
                                <td>
                                    <form action="index.php?id=5" method="POST">
                                        <div class="btn_submit">
                                            <button type="submit" class="btn btn-primary" name="submit">Supprimer</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            ';
                        }?>
                </tbody>
                <?php endif ?>
                <?php if (!isAdmin()):?>
                <tbody>
                    <?php foreach ($offer as $v) {
                            echo '
                            <tr>
                                <td>'.$v['company_name'].'</td>
                                <td>'.$v['name'].'</td>
                                <td>'.$v['description'].'</td>
                            ';
                        }?>
                        <?php if (isCandidate()):?>
                                <td>
                                    <form action="index.php?id=5" method="POST">
                                        <div class="btn_submit">
                                            <button type="submit" class="btn btn-primary" name="submit_fav">Favoris</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        <?php endif?>
                </tbody>
                <?php endif ?>
            </table>
        </div>
    </div>
</div>