<?php
$id = $_SESSION['id'];

// On recupére les offres
$query = $pdo->prepare('SELECT * FROM messages WHERE id_user_recieved=:id ');
$query->bindValue(':id', intval($id));

$query->execute();

$message = $query->fetchAll();


?>

<div class="container">
    <div class="row bg-white">
        <div class="col">
            <h2 class="text-center">Offre d'emploi</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nom et prénom</th>
                    <th scope="col">message</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($message as $v) {
                            echo '
                            <tr>
                                <td>'.$v['lastname'].' '. $v['firstname'].'</td>
                                <td>'.$v['text'].'</td>
                                <td>
                                    <form action="index.php?id=13" method="POST">
                                        <div class="btn_submit">
                                            <button type="submit" class="btn btn-primary" name="submit">Répondre</button>
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