<?php
$id= $_SESSION['id'];

    // On recupére les candidats
$query = $pdo->prepare('SELECT * FROM users WHERE id_title LIKE 3 ');
$query->execute();

$candidate = $query->fetchAll();

// On recupére les entreprise
$query2 = $pdo->prepare('SELECT * FROM users WHERE id_title LIKE 2 ');
$query2->execute();

$company = $query2->fetchAll();

// On recupére les message
$query3 = $pdo->prepare('SELECT * FROM messages WHERE id_user_recieved=:id ');
$query3->bindValue(':id', $id);

$query3->execute();

$message = $query3->fetchAll();

?>

<?php if (isAdmin()):?>
<div class="row accountRow d-flex justify-content-around">
    <div class="row d-flex justify-content-center flex-wrap">
        <div class="card" style="width: 18rem;">
            <div class="card-header" style="text-align: center;">
            <a href="index.php?id=7" class="stretched-link">les entreprises</a>
            </div>
            <div class="card-body">
            <div class="card-body">
                <div class="list-group">
                <?php foreach ($company as $v) {
                        echo '
                        <p class="list-group-item list-group-item-action">'.$v['lastname'].' '.$v['firstname'].'</p>
                        ';
                    }?>
                </div>
            </div>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-header" style="text-align: center;">
            <a href="index.php?id=14" class="stretched-link">les candidats</a>
            </div>
            <div class="card-body">
                <div class="list-group">
                <?php foreach ($candidate as $v) {
                        echo '
                        <p class="list-group-item list-group-item-action">'.$v['lastname'].' '.$v['firstname'].'</p>
                        ';
                    }?>
                </div>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-header" style="text-align: center;">
                <a href="index.php?id=13" class="stretched-link">les message</a>
            </div>
            <div class="card-body">
                <div class="list-group">
                <?php foreach ($message as $v) {
                        echo '
                        <p class="list-group-item list-group-item-action">'.$v['lastname'].' '.$v['firstname'].' message : '.$v['text'].'</p>';
                    }?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif ?>

<?php
// On recupére les favoris
$query7 = $pdo->prepare('SELECT id_apply FROM favoris WHERE id_user=:id');
$query7->bindValue(':id', $id);
$query7->execute();

$fav_comp= $query7->fetchAll();
for ($i = 0; $i < count($fav_comp); $i++){
    $id_fav_comp = $fav_comp[$i]['id_apply'];
    
}

// On recupére les candidature
$query6 = $pdo->prepare('SELECT * FROM applys WHERE id=:id_fav_comp');
$query6->bindValue(':id_fav_comp', intval($id_fav_comp));
$query6->execute();

$my_fav_comp= $query6->fetchAll();

// On recupére les candidats
$query4 = $pdo->prepare('SELECT * FROM offers WHERE id_user=:id');
$query4->bindValue(':id', $id);
$query4->execute();

$my_offer= $query4->fetchAll();
?>

<?php if (isCompany()):?>
<div class="row accountRow d-flex justify-content-around">
    <div class="row d-flex justify-content-center flex-wrap">
        <div class="card" style="width: 18rem;">
            <div class="card-header" style="text-align: center;">
            <a href="index.php?id=15" class="stretched-link">Favoris</a>
            </div>
            <div class="card-body">
                <div class="list-group">
                <?php foreach ($my_fav_comp as $v) {
                        echo '
                        <p class="list-group-item list-group-item-action">'.$v['lastname'].'</p>
                        ';
                    }?>
                </div>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-header" style="text-align: center;">
                Mes offres
            </div>
            <div class="card-body">
                <div class="list-group">
                <?php foreach ($my_offer as $v) {
                        echo '
                        <p class="list-group-item list-group-item-action">'.$v['name'].'</p>
                        ';
                    }?>
                </div>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-header" style="text-align: center;">
                <a href="index.php?id=13" class="stretched-link">les message</a>
            </div>
            <div class="card-body">
                <div class="list-group">
                <?php foreach ($message as $v) {
                        echo '
                        <p class="list-group-item list-group-item-action">'.$v['lastname'].' '.$v['firstname'].' message : '.$v['text'].'</p>';
                    }?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif ?>

<?php

// On recupére les favoris
$query4 = $pdo->prepare('SELECT id_offer FROM favoris WHERE id_user=:id');
$query4->bindValue(':id', $id);
$query4->execute();

$fav= $query4->fetchAll();
for ($i = 0; $i < count($fav); $i++){
    $id_fav = $fav[$i]['id_offer'];
    
}

// On recupére les candidature
$query6 = $pdo->prepare('SELECT * FROM offers WHERE id=:id_fav');
$query6->bindValue(':id_fav', intval($id_fav));
$query6->execute();

$my_fav= $query6->fetchAll();


// On recupére les candidature
$query5 = $pdo->prepare('SELECT * FROM applys WHERE id_user=:id');
$query5->bindValue(':id', $id);
$query5->execute();

$my_apply= $query5->fetchAll();
?>

<?php if (isCandidate()):?>
<div class="row accountRow d-flex justify-content-around">
    <div id="desktop" class="row d-flex justify-content-center flex-wrap">
            <div class="card" style="width: 18rem;">
                <div class="card-header" style="text-align: center;">
                <a href="index.php?id=15" class="stretched-link">Favoris</a>
                </div>
                <div class="card-body">
                <?php foreach ($my_fav as $v) {
                        echo '
                        <p class="list-group-item list-group-item-action">'.$v['name'].'</p>
                        ';
                    }?>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-header" style="text-align: center;">
                    Mes candidatures
                </div>
                <div class="card-body">
                    <div class="list-group">
                    <?php foreach ($my_apply as $v) {
                        echo '
                        <p class="list-group-item list-group-item-action">'.$v['description'].'</p>
                        ';
                    }?>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-header" style="text-align: center;">
                    <a href="index.php?id=13" class="stretched-link">les message</a>
                </div>
                <div class="card-body">
                    <div class="list-group">
                    <?php foreach ($message as $v) {
                        echo '
                        <p class="list-group-item list-group-item-action">'.$v['lastname'].' '.$v['firstname'].' message : '.$v['text'].'</p>';
                    }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif ?>