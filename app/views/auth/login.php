<h2>Connexion</h2>
<form action="/Authentication/public/index.php/login" method="POST">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>
    <button type="submit">Se connecter</button>
</form>
<p>Pas encore inscrit ? <a href="/Authentication/public/index.php/register">Inscription</a></p>