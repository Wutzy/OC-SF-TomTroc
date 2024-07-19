<?php 
    /** 
     *  Page de connexion
     */
?>
<section class="register-section">
    <div class="register-container">
        <form action="index.php" method="post" class="login-form">
            <h2>Connexion</h2>
            <div class="registerFormGrid">
                <label for="email">Adresse email</label>
                <input type="text" name="email" id="email" value="" required>
                <label for="password">Mot de passe</label>
                <input type="text" name="password" id="password" value="" required>
                <button class="btn btn-register">Se connecter</button>
                <p>Pas de compte ? <a href="index.php?action=showSignUpPage">Inscrivez-vous</a></p>
            </div>
        </form>
        <div class="login-picture">
            <img src="views/assets/dd6bbafe9a461f128299f90d445728dd.jpg">
        </div>
    </div>
</section>