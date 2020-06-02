<?php

// check if all data are correct
if(isset($_POST['submit'])){
    if(!empty($_POST)){
        
        // Insertion
        $req = $pdo->prepare('INSERT INTO users(lastname, firstname, birth_date, address_email, password, address, city, zip_code, country, id_title) VALUES(:lastname, :firstname, :date, :email, :password, :address, :city, :zip, :country, :title)');

        $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $req->bindValue(':email', $_POST['email']);
        $req->bindValue(':password',$password_hash );
        $req->bindValue(':lastname', $_POST['lastname']);
        $req->bindValue(':firstname', $_POST['firstname']);
        $req->bindValue(':date', $_POST['date']);
        $req->bindValue(':address', $_POST['address']);
        $req->bindValue(':city', $_POST['city']);
        $req->bindValue(':zip', $_POST['zip']);
        $req->bindValue(':country', $_POST['country']);
        $req->bindValue(':title', $_POST['title']);
        
        $req->execute();
        
        header('Location: index.php?id=2');
    
    }
}
?>

<div class="">
    <div class="row justify-content-center addUserBox">
        <form action="index.php?id=3" method="POST">
            <div class="row">
                <div class="col">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Adresse email</label>
                            <input type="email" class="form-control" id="creatEmail" name="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="createPassword" name="password">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="lastname">Nom</label>
                            <input type="text" class="form-control" id="createLastname" name="lastname">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Prénom</label>
                            <input type="text" class="form-control" id="createFirstname" name="firstname">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="date">Date de naissance</label>
                            <input type="date" class="form-control" id="CreatDate" name="date">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="address">Adresse</label>
                        <input type="text" class="form-control" id="createAddress" name="address">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="city">Ville</label>
                            <input type="text" class="form-control" id="createFirstname" name="city">
                            
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Zip">Code postale</label>
                            <input type="text" class="form-control" id="createFirstname" name="zip">
                            
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="inputState">Pays</label>
                            <input type="text" class="form-control" id="createFirstname" name="country">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row d-flex justify-content-around">
                <div class="form-group ">
                    <select class="form-control" name="title">
                        <option>Vous êtes</option>
                        <option value="3">Un candidat</option>
                        <option value="2">Une entreprise</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="btn_submit">
                        <button type="submit" class="btn btn-primary" name="submit">Envoyer</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>