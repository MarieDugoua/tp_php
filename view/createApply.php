<?php

$email = $_SESSION['email'];

// check if all data are correct
if(isset($_POST['submit'])){
    if(!empty($_POST)){

        // On recupére l'id utilisateur
        $query = $pdo->prepare('SELECT id FROM users WHERE lastname=:lastname AND firstname=:firstname');
        $query->bindValue(':lastname'   , $_POST['lastname']);
        $query->bindValue(':firstname'   , $_POST['firstname']);
        $query->execute();

        $users = $query->fetch();
        $id = $users['id'];
        
        // name of the uploaded file
        $filename = $_FILES['myfile']['name'];
        
        // destination of the file on the server
        $destination = '/Applications/MAMP/htdocs/cours_php/tp/save_files/' . $filename;
        
        // get the file extension
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        // the physical file on a temporary uploads directory on the server
        $file = $_FILES['myfile']['tmp_name'];
        $size = $_FILES['myfile']['size'];

        if (!in_array($extension, [ 'pdf'])) {
            echo "You file extension must be .pdf";
        } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
            echo "File too large!";
        } else {
            // move the uploaded (temporary) file to the specified destination
            if (move_uploaded_file($file, $destination)) {
                
                $req = $pdo->prepare('INSERT INTO upload_cv (name, size, path, id_user) VALUES (:filename, :size, :path, :id)');
                
                $req->bindValue(':filename', $filename);
                $req->bindValue(':size', $size);
                $req->bindValue(':path', $destination);
                $req->bindValue(':id', intval($id));

                $req->execute();

                // On recupére l'id du cv telechargé
                $query2 = $pdo->prepare('SELECT id FROM upload_cv WHERE id_user=:id_user AND created_at=NOW()');
                $query2->bindValue(':id_user', $id);
                $query2->execute();

                $cv = $query2->fetch();
                $id_cv = $cv['id'];

                // Insertion des données du formilaire
                $req2 = $pdo->prepare('INSERT INTO applys (id_user, lastname, firstname, description, id_cv) VALUES(:id_user, :lastname, :firstname, :description, :cv)');
                
                $req2->bindValue(':id_user', $id);
                $req2->bindValue(':lastname', $_POST['lastname']);
                $req2->bindValue(':firstname', $_POST['firstname']);
                $req2->bindValue(':description', $_POST['description']);
                $req2->bindValue(':cv', $id_cv);
                
                $req2->execute();
                
                header('Location: index.php?id=4');

            } else {
                echo "Failed to upload file.";
            }
        }
    }
}
?>

<div class="">
    <div class="row justify-content-center addUserBox">
        <form action="index.php?id=9" method="POST" enctype="multipart/form-data">
            <div class="col">
                <div class="col">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="lastname">Nom</label>
                            <input type="text" class="form-control" id="creatEmail" name="lastname">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="firstname">Prénom</label>
                            <input type="text" class="form-control" id="createPassword" name="firstname">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="descrption">Déscription</label>
                            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Ajoutez votre cv :</label>
                            <input type="file" name="myfile">
                            <div class="btn_submit">
                                <button type="submit" class="btn btn-primary" name="submit">Envoyer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>