<?php
     require_once('data.php');

     class Relacion{
       public function Adiciona($Noma,$Noms){
          $bd = new basedata();
          $Valores = array(':Noma' => $Noma,':Noms' => $Noms);
          $bd->CreaRegistro('relacion','Actor,Serie',':Noma, :Noms',$Valores);
        }

        public function Borra($id){
          $bd = new basedata();
          $bd->BorrarRegistro('relacion','Id',$id);
        }
     }




 ?>
