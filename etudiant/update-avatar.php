<?php
require_once '../lib/functions.php';
require_once '../model/database.php';

$user = currentUser();
$etudiant = getEtudiant($user["id"]);

if (!isset($etudiant["id"])) {
    header("Location: ../index.php");
} 

$niveau_etudes = getAllEntity("niveau_etude");

getHeader("Profil");
?>
<section class="container-page">
<form action="query_avatar.php" method="post" class="form-signin inscription" enctype="multipart/form-data">
    <h1 class="h3 mb-3 font-weight-normal">Modifier mon avatar</h1>
    
    <br>
    Select image to upload:<br>
    
    <input type="file" name="imageToUpload" id="fileToUpload">
   
    <button class="btn btn-lg btn-primary btn-block" type="submit">Valider</button>
</form>
</section>

<?php getFooter(); ?>