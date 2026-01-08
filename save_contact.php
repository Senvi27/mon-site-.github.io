<?php
// # Connexion XAMPP STANDARD
$serveur = "localhost";     # Serveur local
$utilisateur = "root";      # User XAMPP
$motdepasse = "";           # Password vide
$base = "contacts";         # Nom base

// # Créer connexion
$conn = new mysqli($serveur, $utilisateur, $motdepasse, $base);

// # Vérifier connexion
if ($conn->connect_error) {
    die("Erreur: " . $conn->connect_error); # Stop si erreur
}

// # Récupérer données FORM
$nom = $_POST['nom'];           # Nom envoyé
$email = $_POST['email'];       # Email envoyé  
$message = $_POST['message'];   # Message envoyé

// # Requête SQL sécure
$sql = "INSERT INTO messages (nom, email, message, date_envoi) 
        VALUES ('$nom', '$email', '$message', NOW())";

if ($conn->query($sql) === TRUE) {
    header("Location: contact.html?success=1"); # Redirection succès
    exit();
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error; # Debug erreur
}

$conn->close(); # Fermer connexion
?>
