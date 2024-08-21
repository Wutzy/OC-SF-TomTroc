<?php
    /**
     *  Page de détails d'un livre
     */
?>
<section class="register-section">
    <div class="register-container">
        <form action="index.php?action=connectUser" method="post" class="login-form">
            <h2>Connexion</h2>
            <div class="registerFormGrid">
                <label for="login">Adresse email</label>
                <input type="text" name="login" id="login" value="" required>
                <label for="password">Mot de passe</label>
                <input type="text" name="password" id="password" value="" required>
                <button type="submit"  class="btn btn-register">Connexion</button>
                <p>Déjà inscrit ? <a href="#">Connectez-vous</a></p>
            </div>
        </form>
        <div class="login-picture">
            <img src="views/assets/dd6bbafe9a461f128299f90d445728dd.jpg">
        </div>
    </div>
</section>