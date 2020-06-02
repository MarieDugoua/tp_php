<?php
    $id= $_SESSION['id'];

    // On recupére les candidats
$query = $pdo->prepare('SELECT * FROM favoris WHERE id_user=:id ');
$query->bindValue(':id', $id);
$query->execute();

$favoris = $query->fetchAll();

var_dump($favoris);die;

$query = $pdo->prepare('SELECT * FROM favoris WHERE id_user=:id ');
$query->bindValue(':id', $id);
$query->execute();

$favoris = $query->fetchAll();

?>
<?php if (isCompany()):?>
<div class="container">
    <div class="row bg-white">
        <div class="col">
            <h2 class="text-center">Mes favoris</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nom et prénom</th>
                    <th scope="col">Date de naissance</th>
                    <th scope="col">Adresse email</th>
                    <th scope="col">Adresse postale</th>
                    <th scope="col">Ville</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($candidate as $v) {
                            echo '
                            <tr>
                                <td>'.$v['lastname'].' '. $v['firstname'].'</td>
                                <td>'.$v['birth_date'].'</td>
                                <td>'.$v['address_email'].'</td>
                                <td>'.$v['address'].'</td>
                                <td>'.$v['city'].'</td>
                                <td>
                                    <form action="index.php?id=14" method="POST">
                                        <div class="btn_submit">
                                            <button type="submit" class="btn btn-primary" name="submit">Supprimer</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            ';
                        }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php endif?>
<?php if (isCandidate()):?>

<div class="container">
    <div class="row bg-white">
        <div class="col">
            <h2 class="text-center">Mes favoris</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nom et prénom</th>
                    <th scope="col">Date de naissance</th>
                    <th scope="col">Adresse email</th>
                    <th scope="col">Adresse postale</th>
                    <th scope="col">Ville</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($candidate as $v) {
                            echo '
                            <tr>
                                <td>'.$v['lastname'].' '. $v['firstname'].'</td>
                                <td>'.$v['birth_date'].'</td>
                                <td>'.$v['address_email'].'</td>
                                <td>'.$v['address'].'</td>
                                <td>'.$v['city'].'</td>
                                <td>
                                    <form action="index.php?id=14" method="POST">
                                        <div class="btn_submit">
                                            <button type="submit" class="btn btn-primary" name="submit">Supprimer</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            ';
                        }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php endif?>