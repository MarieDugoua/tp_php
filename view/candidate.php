<?php

// On recupére les entreprise
$query2 = $pdo->prepare('SELECT * FROM users WHERE id_title LIKE 3 ');
$query2->execute();

$candidate = $query2->fetchAll();


?>

<div class="container">
    <div class="row bg-white">
        <div class="col">
            <h2 class="text-center">Les entreprise</h2>
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