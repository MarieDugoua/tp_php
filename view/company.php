<?php

// On recupére les entreprise
$query2 = $pdo->prepare('SELECT * FROM users WHERE id_title LIKE 2 ');
$query2->execute();

$company = $query2->fetchAll();
foreach($company as $v){
    $id = $v['id'];
}

$query3 = $pdo->prepare('SELECT company_name FROM offers WHERE id_user=:id ');
$query3->bindValue(':id', intval($id));

$query3->execute();

$req = $query3->fetchAll();

$company_name = $req[0]['company_name'];

?>

<div class="container">
    <div class="row bg-white">
        <div class="col">
            <h2 class="text-center">Les entreprise</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nom et prénom</th>
                    <th scope="col">Nom de l'entreprise</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($company as $v) {
                            echo '
                            <tr>
                                <td>'.$v['lastname'].' '. $v['firstname'].'</td>
                                <td>'.$company_name.'</td>
                                <td>
                                    <form action="index.php?id=7" method="POST">
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