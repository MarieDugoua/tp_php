<?php
// check if all data are correct
if(isset($_POST['submit_company'])){
    if(!empty($_POST)){
        
        // On recupére l'id utilisateur
        $id = $_SESSION['id'];
 
        // Insertion
        $req = $pdo->prepare('INSERT INTO offers(name, company_name, description, id_user) VALUES(:name, :company_name, :description, :id_user)');

        $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $req->bindValue(':name', $_POST['name']);
        $req->bindValue(':company_name',$_POST['company_name'] );
        $req->bindValue(':description', $_POST['description']);
        $req->bindValue(':id_user', $id);
        
        $req->execute();
        
        header('Location: index.php?id=4');
    
    }
}
?>

<div class="">
    <div class="row justify-content-center addOffer">
        <form action="index.php?id=11" method="POST">
            <div class="row">
                <div class="col">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="company_name">Nom de l'entreprise :</label>
                            <input type="text" class="form-control" id="createPassword" name="company_name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Nom du poste :</label>
                            <input type="text" class="form-control" id="createLastname" name="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="description">Déscription :</label>
                            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row d-flex justify-content-around">
                <div class="form-group">
                    <div class="btn_submit">
                        <button type="submit" class="btn btn-primary" name="submit_company">Envoyer</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>