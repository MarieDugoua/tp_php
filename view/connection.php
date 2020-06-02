<?php
if(isset($_POST['submit'])){
    // check ifuser/pass exist

    $query = $pdo->prepare('SELECT * FROM users WHERE address_email=:email');
    $query->bindValue(':email'   , $_POST['email']);
    $query->execute();
    
    $users = $query->fetch();
    $mdp = $users['password'];
    $title = $users['id_title'];

    if ($title === '1'){
        if(!empty($users)){
            // Le user/pass exist
            // we save the user
            $_SESSION['id'] = $users['id'];
            $_SESSION['email'] = $users['address_email'];
            $_SESSION['lastname'] = $users['lastname'];
            $_SESSION['firstname'] = $users['firstname'];
            $_SESSION['role'] = $users['id_title'];
            
            // we go to my account
            header('Location: index.php?id=4');
        }else{
            // user/pass doesn't exist
            echo '
            <div class="container errorConnect">
                <p>Vous n\'avez pas de compte </p>
            </div>
            ';
        }        
    }else if(password_verify($_POST['password'] ,$mdp)) {
        if(!empty($users)){
            // Le user/pass exist
            // we save the user
            $_SESSION['id'] = $users['id'];
            $_SESSION['email'] = $users['address_email'];
            $_SESSION['lastname'] = $users['lastname'];
            $_SESSION['firstname'] = $users['firstname'];
            $_SESSION['role'] = $users['id_title'];
            
            // we go to my account
            header('Location: index.php?id=4');
        }else{
            // user/pass doesn't exist
            echo '
            <div class="container errorConnect">
                <p>Vous n\'avez pas de compte </p>
            </div>
            ';
        }
    }else{
        echo '
            <div class="container errorConnect">
                <p>Vous n\'avez pas tapé le bon mot de passe </p>
            </div>
            ';
    }
}
?>

<div class="container">
   <div class="row justify-content-center connectBox">
        <form action="index.php?id=2" method="POST" class="formBox">
            <div class="form-group">
                <label for="email" class=" col-form-label">Email</label>
                <input type="text" class="form-control" name="email" id="emailSignIn" placeholder="email@example.com">
            </div>
            <div class="form-group">
                <label for="inputPassword" class=" col-form-label">Password</label>
                <input type="password" class="form-control" name="password" id="passwordSignIn" placeholder="Password">
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="btn_submit">
                        <button type="submit" class="btn btn-primary" name="submit">Envoyer</button>
                    </div>
                </div>
                <div class="col d-flex align-items-center">
                    <a href="index.php?id=3">Créez votre compte içi</a>
                </div>
            </div>
        </form>
   </div>
</div>