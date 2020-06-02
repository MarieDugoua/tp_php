<?php

// On recupére les candidature
$query = $pdo->prepare('SELECT * FROM applys ');
$query->execute();

$apply = $query->fetchAll();

// On recupére les offres
$query = $pdo->prepare('SELECT * FROM offers ');
$query->execute();

$offer = $query->fetchAll();

?>

<section class="text-center title">
    <div class="container">
        <h1>Bienvenue</h1>
    </div>
</section>

<section class="main">
    <div class="row bg-white">
        <div class="col colTab" onclick="RedirectionOffer()">
            <h2 class="text-center">Offre d'emploi</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">L'entreprise</th>
                    <th scope="col">Le poste</th>
                    <th scope="col">Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php foreach ($offer as $v) {
                        echo '
                        <tr>
                            <td>'.$v['company_name'].'</td>
                            <td>'.$v['name'].'</td>
                            <td>'.$v['description'].'</td>
                        </tr>
                        ';
                    }?>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="col colTab" onclick="RedirectionApply()">
            <h2 class="text-center">Candidature</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nom et Prénom</th>
                    <th scope="col">Déscription</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php foreach ($apply as $v) {
                        echo '
                        <tr>
                            <td>'.$v['lastname'].' '. $v['firstname'].'</td>
                            <td>'.$v['description'].'</td>
                        </tr>
                        ';
                    }?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>