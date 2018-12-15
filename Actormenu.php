<?php
    require_once("Actor.php");

    $User = new Actor();
    switch ($_GET['accion']){
	    case 1: $plantilla = file_get_contents("./Temp/index.html");  // Formulario Actor
              echo $plantilla; break;
	    case 2: $User->FormCrea();  break;
      case 3: $User->Formlistar();  break; // Muestra Listado Actores
      case 4: $User->FormBorra($_GET['id']); ; break; // Crear Actor
      case 5: $User->FormActua($_GET['id']); break; // Crear Actor

      case 6: Adiciona(); ; break; // Crear Actor
      case 7: $User->Borra($_GET['id']);
              $User->Formlistar(); break; // Crear Actor
      case 8: Actualiza();   break;
      case 9: $User->FormaAñadirs($_GET['id']); break;
      case 10: AnadeSerie(); break;
      case 11: $User->FormlisSerie($_GET['id']); break;
      case 12: BorraSerie();

    }
    
    function BorraSerie(){
      require_once('Relacion.php');
      $User = new Relacion();
      $User->Borra($_GET['id']);
      $Actor = new Actor();
      $Actor->Formlistar();
    }

    function AnadeSerie(){
      require_once('Relacion.php');
      $User = new Relacion();
      $User->Adiciona($_GET['Nom'],$_GET['serie']);
      $Actor = new Actor();
      $Actor->Formlistar();
    }

    function Actualiza(){
      $User = new Actor();
      $id = $_GET['id'];
      $Nom = $_GET['Nom'];
      $Ape = $_GET['Ape'];
      $Fechana = $_GET['Fechana'];
      $Pais= $_GET['Pais'];
      $Vimue = $_GET['ViMu'];
      $Anima = $_GET['Animal'];
      $User->Actualiza($id,$Nom,$Ape,$Fechana,$Pais,$Vimue,$Anima);
    }

    function Adiciona(){
      $Nom = $_GET['Nom'];
      $Ape = $_GET['Ape'];
      $Fechana = $_GET['Fechana'];
      $Pais= $_GET['Pais'];
      $Vimue = $_GET['ViMu'];
      $Anima = $_GET['Animal'];

      $User = new Actor();
      $User->Adiciona($Nom,$Ape,$Fechana,$Pais,$Vimue,$Anima);
    }
 ?>
