<?php

      require_once('data.php');

      class Serie{

          public function Adiciona($Nom,$Sinop,$Fechaini,$Actican,$Tempo,$Capit){
            $bd = new basedata();
            $Valores = array(':Nom' => $Nom,':Sinop' => $Sinop,':Fechaini' => $Fechaini,':Actican' => $Actican,':Tempo' => $Tempo,':Capit' => $Capit);
            $bd->CreaRegistro('serie','Nombre,Sinopsis,Fechaini,ActiCance,Temporadas,Capitulos',':Nom, :Sinop, :Fechaini, :Actican, :Tempo, :Capit',$Valores);
            $this->Formlista();
          }
          public function Actualiza($id,$Nom,$Sinop,$Fechaini,$Actican,$Tempo,$Capit){
            $bd = new basedata();
            $SQL = "Nombre='". $Nom ."',Sinopsis='". $Sinop ."',Fechaini='". $Fechaini ."',ActiCance='". $Actican ."',Temporadas='". $Tempo ."',Capitulos='". $Capit ."'";
            $bd->ActualizaRegistro('serie',$SQL,'Id',$id);
            $this->Formlista();
          }
          public function Borra($id){
            $bd = new basedata();
            $bd->BorrarRegistro('serie','Nombre',$id);
          }
          public function TraeRegistros(){
            $bd = new basedata();
            return $bd->TraeRegistros('SELECT Id,Nombre,Sinopsis,Fechaini,ActiCance,Temporadas,Capitulos FROM serie');
          }
          public function TraeFiltro($id){
            $bd = new basedata();
            return $bd->TraeRegistros('SELECT Id,Nombre,Sinopsis,Fechaini,ActiCance,Temporadas,Capitulos FROM serie WHERE Id = ' . $id);
          }

          public function TraeRela($id){
             $bd = new basedata();
             return $bd->TraeRegistros('SELECT Id,Actor,Serie FROM relacion WHERE Serie = "' . $id. '"');
          }

          public function FormAdiciona(){
            $plantilla = file_get_contents('./Temp/Serieform.html');
            echo $plantilla;
          }
          public function FormBorra($id){
            $plantilla = file_get_contents('./Temp/Serieborra.html');
            $plantilla = str_replace('{id}',$id,$plantilla);
            echo $plantilla;
          }
          public function FormaAñadira($id){
            require_once('Actor.php');
            $User = new Actor();
            $plantilla = file_get_contents('./Temp/Serieanadira.html');
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

          public function FormlisActor($id){
             $Registers = $this->TraeRela($id);
             $Cadena = "";
             if(count($Registers)!=0){
                  for ($fila=0; $fila<count($Registers); $fila++){
                   $ip = $Registers[$fila]['Id'];
                   $Noms = $Registers[$fila]['Actor'];
                   $Nom = $Registers[$fila]['Serie'];
                   $Cadena .= "<tr>";
                   $Cadena .= "<td>" . htmlentities($Noms,ENT_QUOTES,"UTF-8") . "</td>";
                   $Cadena .= "<td><a class='buttontab' href='SerieMenu.php?accion=9&id=" . htmlentities($Nom, ENT_QUOTES, "UTF-8") . "'>Añadir Actor</a><a class='buttontab' href='SerieMenu.php?accion=12&id=" . htmlentities($ip, ENT_QUOTES, "UTF-8") . "'>Borrar</a></tr>";
                  }
                  $plantilla = file_get_contents('./Temp/SerieliActor.html');
                  $plantilla = str_replace('{Nom}',$Nom,$plantilla);
                  $plantilla = str_replace('{datos}',$Cadena,$plantilla);
                  echo $plantilla;}
             else{
               $Nom = $id;
               $Noms = "No hay registros.";
               $Cadena .= "<tr>";
               $Cadena .= "<td>" . htmlentities($Noms,ENT_QUOTES,"UTF-8") . "</td>";
               $Cadena .= "<td><a class='buttontab' href='SerieMenu.php?accion=5'>Vacio</a><a class='buttontab' href='SerieMenu.php?accion=5'>Vacio</a></tr>";
               $plantilla = file_get_contents('./Temp/SerieliActor.html');
               $plantilla = str_replace('{Nom}',$Nom,$plantilla);
               $plantilla = str_replace('{datos}',$Cadena,$plantilla);
               echo $plantilla;
             }
           }

          public function FormLista(){
            $Registers = $this->TraeRegistros();
            $Cadena = "";
            for ($fila=0; $fila<count($Registers); $fila++){
              $id = $Registers[$fila]['Id'];
              $Nom = $Registers[$fila]['Nombre'];
              $Sinop = $Registers[$fila]['Sinopsis'];
              $Fechaini = $Registers[$fila]['Fechaini'];
              $Actican= $Registers[$fila]['ActiCance'];
              $Tempo = $Registers[$fila]['Temporadas'];
              $Capit = $Registers[$fila]['Capitulos'];
              $Cadena .= "<tr>";
              //$Cadena .= "<td>" . htmlentities($id,ENT_QUOTES,"UTF-8") . "</td>";
              $Cadena .= "<td>" . htmlentities($Nom,ENT_QUOTES,"UTF-8") . "</td>";
              $Cadena .= "<td class='nedd'>" . htmlentities($Sinop,ENT_QUOTES,"UTF-8") . "</td>";
              $Cadena .= "<td class='state'>" . htmlentities($Fechaini,ENT_QUOTES,"UTF-8") . "</td>";
              $Cadena .= "<td class='state'>" . htmlentities($Actican,ENT_QUOTES,"UTF-8") . "</td>";
              $Cadena .= "<td>" . htmlentities($Tempo,ENT_QUOTES,"UTF-8") . "</td>";
              $Cadena .= "<td>" . htmlentities($Capit,ENT_QUOTES,"UTF-8") . "</td>";
              $Cadena .= "<td><a class='buttontab' href='SerieMenu.php?accion=3&id=" . htmlentities($id, ENT_QUOTES, "UTF-8") . "'>Actualizar</a><a class='buttontab' href='SerieMenu.php?accion=4&id=" . htmlentities($Nom, ENT_QUOTES, "UTF-8") . "'>Borrar</a><a class='buttontab' href='SerieMenu.php?accion=9&id=" . htmlentities($Nom, ENT_QUOTES, "UTF-8") . "'>Añadir Actor</a><a class='buttontab' href='SerieMenu.php?accion=11&id=" . htmlentities($Nom, ENT_QUOTES, "UTF-8") . "'>Actores</a></td></tr>";
            }
            $plantilla = file_get_contents('./Temp/Serielistar.html');
            $plantilla = str_replace('{datos}',$Cadena,$plantilla);
            echo $plantilla;
          }
          public function FormActua($id){
            $plantilla = file_get_contents("./Temp/Serieactualiza.html");
            $Registers = $this->TraeFiltro($id);
            for ($fila=0; $fila<count($Registers); $fila++){
              $id = $Registers[$fila]['Id'];
              $Nom = $Registers[$fila]['Nombre'];
              $Sinop = $Registers[$fila]['Sinopsis'];
              $Fechaini = $Registers[$fila]['Fechaini'];
              $Actican= $Registers[$fila]['ActiCance'];
              $Tempo = $Registers[$fila]['Temporadas'];
              $Capit = $Registers[$fila]['Capitulos'];
            $plantilla = str_replace('{id}',$id,$plantilla);
            $plantilla = str_replace('{Nom}',$Nom,$plantilla);
            $plantilla = str_replace('{Sinop}',$Sinop,$plantilla);
            $plantilla = str_replace('{Fechaini}',$Fechaini,$plantilla);
            $plantilla = str_replace('{Actican}',$Actican,$plantilla);
            $plantilla = str_replace('{Tempo}',$Tempo,$plantilla);
            $plantilla = str_replace('{Capit}',$Capit,$plantilla);
            }
            echo $plantilla;
          }






      }

 ?>
