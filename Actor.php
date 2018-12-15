<?php

   require_once("data.php");

   class Actor{

     public function Adiciona($Nom,$Ape,$Fechana,$Pais,$Vimue,$Anima){
        $bd = new basedata();
        $Valores = array(':Nom' => $Nom,':Ape' => $Ape,':Fechana' => $Fechana,':Pais' => $Pais,':Vimue' => $Vimue,':Anima' => $Anima);
        $bd->CreaRegistro('actores','Nombre,Apellidos,Fechanace,Pais,VivoMuerto,AnimalFav',':Nom, :Ape, :Fechana, :Pais, :Vimue, :Anima',$Valores);
        $this->Formlistar();
      }

     public function Actualiza($id,$Nom,$Ape,$Fechana,$Pais,$Vimue,$Anima){
       $bd = new basedata();
       $SQL = "Nombre='". $Nom ."',Apellidos='". $Ape ."',Fechanace='". $Fechana ."',Pais='". $Pais ."',VivoMuerto='". $Vimue ."',AnimalFav='". $Anima ."'";
       $bd->ActualizaRegistro('actores',$SQL,'Id',$id);
       $this->Formlistar();
       //$bd->
     }

     public function Borra($id){
       $bd = new basedata();
       $bd->BorrarRegistro('actores','Nombre',$id);
     }

     public function Retorna(){
       $bd = new basedata();
       return $bd->TraeDato('tipo','actores','id',$id);
     }

     public function TraeRegistros(){
        $bd = new basedata();
        return $bd->TraeRegistros('SELECT Id,Nombre,Apellidos,Fechanace,Pais,VivoMuerto,AnimalFav FROM actores');
      }

      public function TraeFiltro($id){
         $bd = new basedata();
         return $bd->TraeRegistros('SELECT Id,Nombre,Apellidos,Fechanace,Pais,VivoMuerto,AnimalFav FROM actores WHERE Id = ' .$id);
       }
       
       public function TraeRela($id){
          $bd = new basedata();
          return $bd->TraeRegistros('SELECT Id,Actor,Serie FROM relacion WHERE Actor = "' . $id. '"');
        }

     public function FormCrea(){
        $plantilla = file_get_contents("./Temp/Actorform.html");  // Formulario Actor
        echo $plantilla;
     }
     public function FormBorra($id){
       $plantilla = file_get_contents('./Temp/Actorborra.html');
       $plantilla = str_replace('{id}',$id,$plantilla);
       echo $plantilla;
      }

     public function FormaAñadirs($id){
       require_once('Serie.php');
       $User = new Serie();
       $plantilla = file_get_contents('./Temp/Actoranadirs.html');
       $plantilla = str_replace('{id}',$id,$plantilla);
       $Registers = $User->TraeRegistros();
       $Cadena = "";
       for ($fila=0; $fila<count($Registers); $fila++){
         $Nom = $Registers[$fila]['Nombre'];
         $Cadena .= "<option value='" . $Nom . "'> " . $Nom ."</option>";
       }
       $plantilla = str_replace('{datos}',$Cadena,$plantilla);
       echo $plantilla;
     }

     public function FormlisSerie($id){
        $Registers = $this->TraeRela($id);
        $Cadena = "";
        if(count($Registers)!=0){
             for ($fila=0; $fila<count($Registers); $fila++){
              $ip = $Registers[$fila]['Id'];
              $Nom = $Registers[$fila]['Actor'];
              $Noms = $Registers[$fila]['Serie'];
              $Cadena .= "<tr>";
              $Cadena .= "<td>" . htmlentities($Noms,ENT_QUOTES,"UTF-8") . "</td>";
              $Cadena .= "<td><a class='buttontab' href='ActorMenu.php?accion=9&id=" . htmlentities($Nom, ENT_QUOTES, "UTF-8") . "'>Añadir Serie</a><a class='buttontab' href='ActorMenu.php?accion=12&id=" . htmlentities($ip, ENT_QUOTES, "UTF-8") . "'>Borrar</a></tr>";
             }
             $plantilla = file_get_contents('./Temp/ActorliSerie.html');
             $plantilla = str_replace('{Nom}',$Nom,$plantilla);
             $plantilla = str_replace('{datos}',$Cadena,$plantilla);
             echo $plantilla;}
        else{
          $Nom = $id;
          $Noms = "No hay registros.";
          $Cadena .= "<tr>";
          $Cadena .= "<td>" . htmlentities($Noms,ENT_QUOTES,"UTF-8") . "</td>";
          $Cadena .= "<td><a class='buttontab' href='ActorMenu.php?accion=3'>Vacio</a><a class='buttontab' href='ActorMenu.php?accion=3'>Vacio</a></tr>";
          $plantilla = file_get_contents('./Temp/ActorliSerie.html');
          $plantilla = str_replace('{Nom}',$Nom,$plantilla);
          $plantilla = str_replace('{datos}',$Cadena,$plantilla);
          echo $plantilla;
        }
      }

      public function FormActua($id){
        $plantilla = file_get_contents("./Temp/Actoractualiza.html");
        $Registers = $this->TraeFiltro($id);
        for ($fila=0; $fila<count($Registers); $fila++){
          $id = $Registers[$fila]['Id'];
          $Nom = $Registers[$fila]['Nombre'];
          $Ape = $Registers[$fila]['Apellidos'];
          $Fechana = $Registers[$fila]['Fechanace'];
          $Pais= $Registers[$fila]['Pais'];
          $Vimue = $Registers[$fila]['VivoMuerto'];
          $Anima = $Registers[$fila]['AnimalFav'];
        $plantilla = str_replace('{id}',$id,$plantilla);
        $plantilla = str_replace('{Nom}',$Nom,$plantilla);
        $plantilla = str_replace('{Ape}',$Ape,$plantilla);
        $plantilla = str_replace('{Fechana}',$Fechana,$plantilla);
        $plantilla = str_replace('{Pais}',$Pais,$plantilla);
        $plantilla = str_replace('{Vimu}',$Vimue,$plantilla);
        $plantilla = str_replace('{Animal}',$Anima,$plantilla);
        }
        echo $plantilla;
       }

     public function Formlistar(){
        $Registers = $this->TraeRegistros();
        $Cadena = "";
        for ($fila=0; $fila<count($Registers); $fila++){
          $id = $Registers[$fila]['Id'];
          $Nom = $Registers[$fila]['Nombre'];
          $Ape = $Registers[$fila]['Apellidos'];
          $Fechana = $Registers[$fila]['Fechanace'];
          $Pais= $Registers[$fila]['Pais'];
          $Vimue = $Registers[$fila]['VivoMuerto'];
          $Anima = $Registers[$fila]['AnimalFav'];
          $Cadena .= "<tr>";
          $Cadena .= "<td>" . htmlentities($Nom,ENT_QUOTES,"UTF-8") . "</td>";
          $Cadena .= "<td>" . htmlentities($Ape,ENT_QUOTES,"UTF-8") . "</td>";
          $Cadena .= "<td>" . htmlentities($Fechana,ENT_QUOTES,"UTF-8") . "</td>";
          $Cadena .= "<td>" . htmlentities($Pais,ENT_QUOTES,"UTF-8") . "</td>";
          $Cadena .= "<td>" . htmlentities($Anima,ENT_QUOTES,"UTF-8") . "</td>";
          $Cadena .= "<td>" . htmlentities($Vimue,ENT_QUOTES,"UTF-8") . "</td>";
          $Cadena .= "<td><a class='buttontab' href='ActorMenu.php?accion=5&id=" . htmlentities($id, ENT_QUOTES, "UTF-8") . "'>Actualizar</a><a class='buttontab' href='ActorMenu.php?accion=4&id=" . htmlentities($Nom, ENT_QUOTES, "UTF-8") . "'>Borrar</a><a class='buttontab' href='ActorMenu.php?accion=9&id=" . htmlentities($Nom, ENT_QUOTES, "UTF-8") . "'>Añadir Serie</a><a class='buttontab' href='ActorMenu.php?accion=11&id=" . htmlentities($Nom, ENT_QUOTES, "UTF-8") . "'>Series</a></td></tr>";
        }
        $plantilla = file_get_contents('./Temp/Actorlistar.html');
        $plantilla = str_replace('{datos}',$Cadena,$plantilla);
        echo $plantilla;
      }
   }


 ?>
