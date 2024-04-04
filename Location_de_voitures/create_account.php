<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
</head>
<body>
    <h2>Créer un compte</h2>
    <form action="" method="POST">
        <label for="prenom">Prénom:</label><br>
        <input type="text" id="prenom" name="prenom"><br>
        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="mot_de_passe">Mot de passe:</label><br>
        <input type="password" id="mot_de_passe" name="mot_de_passe"><br>
        <label for="adresse">Adresse:</label><br>
        <input type="text" id="adresse" name="adresse"><br>
        <label for="telephone">Numéro de téléphone:</label><br>
        <input type="text" id="telephone" name="telephone"><br>
        <label for="ville">Ville:</label><br>
        <input type="text" id="ville" name="ville"><br>
        <label for="code_postal">Code Postal:</label><br>
        <input type="text" id="code_postal" name="code_postal"><br>
        <input type="submit" value="Créer un compte">
    </form>

    <?php
    // Inclure le fichier de connexion à la base de données
    include 'dbconnexion.php';

    // Définir une variable pour stocker le lien vers la page de connexion
    $lien_connexion = '<a href="connexion.php">Se connecter</a>';

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT); // Hacher le mot de passe
        $adresse = $_POST['adresse'];
        $telephone = $_POST['telephone'];
        $ville = $_POST['ville'];
        $code_postal = $_POST['code_postal'];

        // Requête d'insertion des données dans la table Utilisateurs
        $sql = "INSERT INTO Utilisateurs (Prenom, Nom, Email, Mot_de_passe, Adresse, Numero_de_telephone, Ville, Code_Postal)
        VALUES ('$prenom', '$nom', '$email', '$mot_de_passe', '$adresse', '$telephone', '$ville', '$code_postal')";

        if ($connexion->query($sql) === TRUE) {
            echo "Compte créé avec succès! Vous pouvez maintenant vous connecter. $lien_connexion.";
        } else {
            echo "Erreur: " . $sql . "<br>" . $connexion->error;
        }
    }
    ?>
</body>
</html>
