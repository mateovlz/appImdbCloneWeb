<?php

    require_once('Serie.php');

     $User = new Serie();
     switch ($_GET['accion']) {
       case 1: $plantilla = file_get_contents('./Temp/index.html');
               echo $plantilla; break;
       case 2: $User->FormAdiciona(); break;
       case 3: $User->FormActua($_GET['id']); break;
       case 4: $User->FormBorra($_GET['id']); break;
       case 5: $User->FormLista(); break;

       case 6: Adiciona(); break;
       case 7: Actualiza(); break;
       case 8: $User->Borra($_GET['id']);
               $User->Formlista(); break; // Crear Actor
       case 9: $User->FormaAñadira($_GET['id']); break;
       case 10: AnadeActor(); break;
       case 11:$User->FormlisActor($_GET['id']);  break;
       case 12: BorraActor();  break;

     }
     function AnadeActor(){
       require_once('Relacion.php');
       $User = new Relacion();
       $User->Adiciona($_GET['actor'],$_GET['Nom']);
       $Serie = new Serie();
       $Serie->Formlista();
     }

     function BorraActor(){
       require_once('Relacion.php');
       $User = new Relacion();
       $User->Borra($_GET['id']);
       $Serie = new Serie();
       $Serie->Formlista();
     }

     function Actualiza(){
       $id = $_GET['id'];
       $Nom = $_GET['Nom'];
       $Sinop = $_GET['Sinop'];
       $Fechaini = $_GET['Fechaini'];
       $Actican= $_GET['Actican'];
       $Tempo = $_GET['Tempo'];
       $Capit = $_GET['Capit'];
       $User = new Serie();
       $User->Actualiza($id,$Nom,$Sinop,$Fechaini,$Actican,$Tempo,$Capit);
     }
     function Adiciona(){
       $Nom = $_GET['Nom'];
       $Sinop = $_GET['Sinop'];
       $Fechaini = $_GET['Fechaini'];
       $Actican= $_GET['Actican'];
       $Tempo = $_GET['Tempo'];
       $Capit = $_GET['Capit'];
       //echo $Nom . "/" . $Sinop . "/" . $Fechaini . "/" . $Fechacan . "/" . $Actican . "/" . $Tempo . "/" . $Capit . "/" . $Causa;
       $User = new Serie();
       $User->Adiciona($Nom,$Sinop,$Fechaini,$Actican,$Tempo,$Capit);
     }

 ?>
