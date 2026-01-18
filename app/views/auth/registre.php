<form action="/Authentication/public/index.php/register" method="POST">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>
    <select name="role" required>
        <option value="candidate">Candidat</option>
        <option value="recruiter">Recruteur</option>
    </select><br>
    <button type="submit">S'inscrire</button>
</form>