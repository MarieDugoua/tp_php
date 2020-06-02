<?php
// check if all data are correct
if(isset($_POST['submit'])){
    if(!empty($_POST)){
        if (!isConnected()){
            // Insertion
            $req = $pdo->prepare('INSERT INTO messages(lastname ,firstname, text, id_title) VALUES(:lastname, :firstname, :text, :title)');

            
            $req->bindValue(':lastname', $_POST['lastname']);
            $req->bindValue(':firstname', $_POST['firstname']);
            $req->bindValue(':text', $_POST['message']);
            $req->bindValue(':title', $_POST['title']);
            
            $req->execute();
            
            header('Location: index.php?id=1');
        } else if(isConnected()) {

            // select the id from the personne how will recieved the message
            $query = $pdo->prepare('SELECT id FROM users WHERE lastname=:lastnameUser AND firstname=:firstnameUser');
            $query->bindValue(':lastnameUser'   , $_POST['lastnameUser']);
            $query->bindValue(':firstnameUser'   , $_POST['firstnameUser']);
            $query->execute();
        
            $user_recieved = $query->fetch();
            $id_reieved = $user_recieved['id'];

            // select the id from the personne how sent the message
            $query2 = $pdo->prepare('SELECT id FROM users WHERE lastname=:lastname AND firstname=:firstname');
            $query2->bindValue(':lastname'   , $_POST['lastname']);
            $query2->bindValue(':firstname'   , $_POST['firstname']);
            $query2->execute();
        
            $user_sent = $query2->fetch();
            $id_sent = $user_sent['id'];

             // Insertion
             $req = $pdo->prepare('INSERT INTO messages(lastname ,firstname, text, id_title, id_user_sent, id_user_recieved) VALUES(:lastname, :firstname, :text, :title, :id_user_sent, :id_user_recieved)');

            
             $req->bindValue(':lastname', $_POST['lastname']);
             $req->bindValue(':firstname', $_POST['firstname']);
             $req->bindValue(':text', $_POST['message']);
             $req->bindValue(':title', $_POST['title']);
             $req->bindValue(':id_user_sent', $id_sent);
             $req->bindValue(':id_user_recieved', $id_reieved);
             
             $req->execute();
        }
        
    }
}
?>

<div class="container" style="margin-top:5%;">
    <form action="index.php?id=8" method="POST" style="width:50%; margin: 0 auto;">
        <div class="row">
            <div class="col">
                <label for="message">Votre prénom :</label>
                <input type="text" class="form-control" name="firstname">
            </div>
            <div class="col">
                <label for="message">Votre nom :</label>
                <input type="text" class="form-control" name="lastname">
            </div>
        </div>
        <div class="form-group" style="margin-top:5%;">
            <label for="message">Votre message :</label>
            <textarea class="form-control" name="message" id="message" rows="5"></textarea>
        </div>
        <div class="form-group row">
            <div class="form-group sltContact">
                <label for="message">Envoyé à :</label>
                <select class="form-control" name="title">
                    <?php if(isConnected()):?>
                    <option value="1">Entreprise</option>
                    <option value="1">candidat</option>
                    <?php endif; ?>
                    <option value="1">Administrateur</option>
                </select>
            </div>
            <?php if(isConnected()):?>
            <div class="col">
                <label for="message">Prénom de la personne :</label>
                <input type="text" class="form-control" name="firstnameUser">
            </div>
            <div class="col">
                <label for="message">Nom de la personne :</label>
                <input type="text" class="form-control" name="lastnameUser">
            </div>
            <?php endif; ?>
        </div>
        <div class="btnContact form-group col">
            <div class="btn_submit">
                <button type="submit" class="btn btn-primary" name="submit">Envoyer</button>
            </div>
        </div>
    </form>
</div>
