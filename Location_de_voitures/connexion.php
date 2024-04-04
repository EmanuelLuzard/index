<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form action="" method="POST">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="mot_de_passe">Mot de passe:</label><br>
        <input type="password" id="mot_de_passe" name="mot_de_passe"><br>
        <input type="submit" value="Se connecter">
    </form>

    <?php
    // Inclure le fichier de connexion à la base de données
    include 'dbconnexion.php';

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer l'email et le mot de passe saisis par l'utilisateur
        $email = $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];

        // Requête pour récupérer le mot de passe haché associé à cet email dans la base de données
        $sql = "SELECT Mot_de_passe FROM Utilisateurs WHERE Email = '$email'";
        $result = $connexion->query($sql);

        if ($result->num_rows == 1) {
            // Si l'email existe dans la base de données, vérifier le mot de passe
            $row = $result->fetch_assoc();
            $mot_de_passe_hache = $row['Mot_de_passe'];

            // Vérifier si le mot de passe saisi correspond au mot de passe haché dans la base de données
            if (password_verify($mot_de_passe, $mot_de_passe_hache)) {
                // Authentification réussie
                echo "Connexion réussie!";
                // Vous pouvez rediriger l'utilisateur vers une autre page ici
            } else {
                // Mot de passe incorrect
                echo "Mot de passe incorrect!";
            }
        } else {
            // L'email n'existe pas dans la base de données
            echo "Aucun compte associé à cet email!";
        }
    }
    ?>
</body>
</html>
