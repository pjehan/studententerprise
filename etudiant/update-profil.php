<?php
require_once '../lib/functions.php';
require_once '../model/database.php';

if (!currentUserHasRole("etudiant")) {
    header("Location: ../index.php");
}
$id = $_SESSION['id'];
$etudiant = getEtudiant($id);
$niveau_etudes = getAllEntity("niveau_etude");

getHeader("Profil");
?>

<section class="container-page update-profil">
    <?php require_once '../layout/menu-etudiant.php'; ?>
    <div class="zone-etudiants">
    <form action="update.php" method="post" class="form-signin inscription" enctype="multipart/form-data">
        <h1 class="h3 mb-3 font-weight-normal">Modifier son profil</h1>

        <label>Nom : </label>
        <input type="nom" name="nom" id="nom" class="form-control" value="<?php echo $etudiant["nom"]; ?>" >
       
        <br>
        
        <label>Prénom : </label>
        <input type="prenom" name="prenom" id="prenom" class="form-control" value="<?php echo $etudiant["prenom"]; ?>" >
        
        <br>
        
        <label>Date de Naissance : </label>
        <input type="datenaissance" name="datenaissance" id="datetimepicker" type="text" value="<?php echo $etudiant["date_naissance_format"]; ?>">
        <br>
        
        <label>Email : </label>
        <input type="email" name="email" id="email" class="form-control" value="<?php echo $etudiant["mail"]; ?>" >
        
        <br>
        
        <label>Téléphone : </label>
        <input type="telephone" name="telephone" id="telephone" class="form-control" value="<?php echo $etudiant["telephone"]; ?>" >
        
        <br>
        
        <label>Niveau études : </label>
        <select class="select2" name="niveau_etude">
            <?php foreach ($niveau_etudes as $niveau_etude) : ?>
                <option value="<?php echo $niveau_etude["id"]; ?>" <?php echo ($niveau_etude["id"] == $etudiant["niveau_etude_id"]) ? "selected" : ""; ?>>
                    <?php echo $niveau_etude["label"]; ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <br>
        
        <label>Spécialités : </label>
        <input type="specialite" name="specialite" id="specialite" class="form-control" value="" >
        
        <br>
        
        <label>Date début de contrat : </label>
        <input type="date" name="debut_contrat" value="<?php echo $etudiant["date_debut_contrat"]; ?>">
       
        
        <br>

        <label>Date fin de contrat : </label>
        
        <input type="date" name="fin_contrat" value="<?php echo $etudiant["date_fin_contrat"]; ?>">
       
        
        <br>
        
        <label>CV : </label>
        <p class="importation"><?php echo $etudiant['cv']; ?></p><br>
        Cv à Uploader : <br>

        <input type="file" name="cv">
        
        <br>
        
        <label>Lettre de motivation : </label>
        <p class="importation"><?php echo $etudiant['lm']; ?></p><br>
        Lettre de motivation à Uploader : <br>

        <input type="file" name="lm">
        
        <br>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Valider</button>
    </form>
    </div>
</section>

<?php getFooter(); ?>