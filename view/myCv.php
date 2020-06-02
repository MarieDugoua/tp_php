<?php
// On recupére l'id utilisateur
$id = $_SESSION['id'];

if(isset($_POST['submit_exp'])){
    if(!empty($_POST)){
        // Insertion
        $req = $pdo->prepare('INSERT INTO professionnal_exp(periode, type, company_name, place, description, id_user) VALUES(:periode_exp, :type_exp, :company_name, :place_exp, :description_exp, :id_user)');
        
        $req->bindValue(':periode_exp', $_POST['periode_exp']);
        $req->bindValue(':type_exp',$_POST['type_exp'] );
        $req->bindValue(':company_name', $_POST['company_name']);
        $req->bindValue(':place_exp', $_POST['place_exp']);
        $req->bindValue(':description_exp', $_POST['description_exp']);
        $req->bindValue(':id_user', intval($id));
        
        $req->execute();
        
        header('Location: index.php?id=12');
    
    }
}

// On recupére les exp
$query = $pdo->prepare('SELECT * FROM professionnal_exp WHERE id_user=:id_user');
$query->bindValue(':id_user'   , $id);
$query->execute();

$exp = $query->fetchAll();

if(isset($_POST['submit_dip'])){
    if(!empty($_POST)){

        // Insertion
        $req = $pdo->prepare('INSERT INTO diplomas(periode, type, name_school, place, description, id_user) VALUES(:periode_dip, :type_dip, :name_school, :place_dip, :description_dip, :id_user)');
        
        $req->bindValue(':periode_dip', $_POST['periode_dip']);
        $req->bindValue(':type_dip',$_POST['type_dip'] );
        $req->bindValue(':name_school', $_POST['name_school']);
        $req->bindValue(':place_dip', $_POST['place_dip']);
        $req->bindValue(':description_dip', $_POST['description_dip']);
        $req->bindValue(':id_user', intval($id));
        
        $req->execute();
        
        header('Location: index.php?id=12');
    
    }
}

// On recupére les diplomes
$query2 = $pdo->prepare('SELECT * FROM diplomas WHERE id_user=:id_user');
$query2->bindValue(':id_user'   , intval($id));
$query2->execute();

$dip = $query2->fetchAll();

// On recupére l'utilisateur
$query3 = $pdo->prepare('SELECT * FROM users WHERE id=:id');
$query3->bindValue(':id'   , intval($id));
$query3->execute();

$user = $query3->fetchAll();
?>
 
 <div class="container" style="margin: 0 auto;"> 
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header" style="text-align: center;">
                Contact
            </div>
            <div class="card-body">
                <div class="list-group">
                <?php foreach ($user as $v) {
                        echo '
                        <p class="list-group-item list-group-item-action">'.$v['lastname'].' '.$v['firstname'].'</p>
                        <p class="list-group-item list-group-item-action">'.$v['birth_date'].'</p>
                        <p class="list-group-item list-group-item-action">'.$v['address_email'].'</p>
                        <p class="list-group-item list-group-item-action">'.$v['address'].'</p>
                        <p class="list-group-item list-group-item-action">'.$v['city'].' '.$v['zip_code'].'</p>
                        ';
                    }?>
                </div>
            </div>
        </div>
    </div>
    <div style="margin:5%;" class="row justify-content-around">
        <div class="row justify-content-center border border-dark">
            <label>Expériences professionnelles</label>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Période</th>
                        <th scope="col">Poste</th>
                        <th scope="col">Entreprise</th>
                        <th scope="col">Lieu</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($exp as $v) {
                        echo '
                        <tr>
                            <td>'.$v['periode'].'</td>
                            <td>'.$v['type'].'</td>
                            <td>'.$v['company_name'].'</td>
                            <td>'.$v['place'].'</td>
                            <td>'.$v['description'].'</td>
                        </tr>
                        ';
                    }?>
                </tbody>
            </table>
        </div>
    
        <div style="margin:5%;" class="row justify-content-center border border-dark">
            <label>Diplomes et formations</label>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Période</th>
                        <th scope="col">Diplome</th>
                        <th scope="col">Ecole</th>
                        <th scope="col">Lieu</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dip as $v) {
                        echo '
                        <tr>
                            <td>'.$v['periode'].'</td>
                            <td>'.$v['type'].'</td>
                            <td>'.$v['name_school'].'</td>
                            <td>'.$v['place'].'</td>
                            <td>'.$v['description'].'</td>
                        </tr>
                        ';
                    }?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <form action="index.php?id=12" method="POST">
                <div class="row">
                    <div class="col">
                    <label>Ajouter une éxperience</label>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="periode">Période :</label>
                                <input type="text" class="form-control" name="periode_exp">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="type">Poste :</label>
                                <input type="text" class="form-control" name="type_exp">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="company_name">Nom de l'entreprise :</label>
                                <input type="text" class="form-control"  name="company_name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="place">Adresse :</label>
                                <input type="text" class="form-control" name="place_exp">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md">
                                <label for="date">Description :</label>
                                <textarea class="form-control" rows="3" name="description_exp"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row d-flex justify-content-around">
                    <div class="form-group">
                        <div class="btn_submit">
                            <button type="submit" class="btn btn-primary" name="submit_exp">Envoyer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col">
            <form action="index.php?id=12" method="POST">
                <div class="row">
                    <div class="col">
                    <label>Ajouter un diplome</label>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="periode">Période :</label>
                                <input type="text" class="form-control" id="creatEmail" name="periode_dip">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="type">Nom du cursus :</label>
                                <input type="text" class="form-control" id="createPassword" name="type_dip">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="company_name">Nom de l'école :</label>
                                <input type="text" class="form-control" id="createLastname" name="name_school">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="place">Adresse :</label>
                                <input type="text" class="form-control" id="createFirstname" name="place_dip">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md">
                                <label for="date">Description :</label>
                                <textarea class="form-control" id="description" rows="3" name="description_dip"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row d-flex justify-content-around">
                    <div class="form-group">
                        <div class="btn_submit">
                            <button type="submit" class="btn btn-primary" name="submit_dip">Envoyer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="row justify-content-center">

    </div>
</div>