<?php

    //Si les variables de session pseudo et motdepasse son vide, on se dirige vers la page de connection
    if(!(isset($_SESSION["pseudo"]) && isset($_SESSION["motDePasse"]))){
      header("Location:connection");
    }

    //Si une infirmiere se connecte on lui affache sa navbar
    if( $_SESSION['idPoste'] == 3 ){
?> 
    <div class="topnav">
        <a class="active" style="float:right" href="dashboard/projet/mvc/deco">Déconnexion</a>
        <a class="active" style="float:right" href="dashboard/projet/mvc/shedule">Shedule</a>
        <a class="active" style="float:right" href="dashboard/projet/mvc/rendezvous">Rendez vous</a>
        <a class="active" style="float:right" href="dashboard/projet/mvc/gestionpatient">Patient</a>
        <a class="active" style="float:right" href="dashboard/projet/mvc/profil">Profil</a>
    </div>

<?php 
    }

    //Sinon si un medecin se connecte on lui affache sa navbar
    elseif( $_SESSION['idPoste'] == 1 ){
?>
    <div class="topnav">
        <a class="active" style="float:right" href="dashboard/projet/mvc/deco">Déconnexion</a>
        <a class="active" style="float:right" href="dashboard/projet/mvc/shedule">Shedule</a>
        <a class="active" style="float:right" href="dashboard/projet/mvc/gestionpatient">Patient</a>
        <a class="active" style="float:right" href="dashboard/projet/mvc/Ordonnance">Ordonnance</a>
        <a class="active" style="float:right" href="dashboard/projet/mvc/rendezvous">Rendez vous</a>
        <a class="active" style="float:right" href="dashboard/projet/mvc/profil">Profil</a>
    </div>
<?php 
    }

    //Sinon si un administrateur se connecte on lui affache sa navbar
    elseif( $_SESSION['idPoste'] == 2 ){
?>
    <div class="topnav">
        <a class="active" style="float:right" href="dashboard/projet/mvc/deco">Déconnexion</a>
        <a class="active" style="float:right" href="dashboard/projet/mvc/afficheEmployer">Employer</a>
        <a class="active" style="float:right" href="dashboard/projet/mvc/affichepatient">Patient</a>
        <a class="active" style="float:right" href="dashboard/projet/mvc/hopital">Hopital</a>
        <a class="active" style="float:right" href="dashboard/projet/mvc/profil">Profil</a>
    </div>
<?php 
    }

    //Sinon si un patient se connecte on lui affache sa navbar
    elseif( $_SESSION['idPoste'] == 0 ){
?>
    <div class="topnav">
        <a class="active" style="float:right" href="dashboard/projet/mvc/deco">Déconnexion</a>
        <a class="active" style="float:right" href="dashboard/projet/mvc/patient">Liste de medecin</a>
        <a class="active" style="float:right" href="dashboard/projet/mvc/prescription">Prescription</a>
        <a class="active" style="float:right" href="dashboard/projet/mvc/facture">Facture</a>
        <a class="active" style="float:right" href="dashboard/projet/mvc/profilPatient">Profil</a>
    </div>
<?php 
    }
?>
