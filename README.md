# Series y actores CRUD con Base de Datos

## Introduction

Es una aplicacion que ayuda a entender como funciona el model MVC (Modelo, Vista, Controlador) y fue creada para aprendizaje, la cual incluye POO (Programacion Orientada a Objetos) y Base de datos en MySQL.
La app fue creada netamente en php puro.

## Code Samples

Podemos observar este trozo de codigo en el cual se controlan las opciones de la app y es donde se define que se va hacer en cada caso y todas estas opciones son metodos de la clase Actor.

    $User = new Actor();
    switch ($_GET['accion']){
      case 2: $User->FormCrea();  break; // Formulario Crear Actores
      case 3: $User->Formlistar();  break; // Muestra Listado Actores
      case 4: $User->FormBorra($_GET['id']); ; break; // Formulario Borra Actores
      case 5: $User->FormActua($_GET['id']); break; // Formulario Actualiza
      case 6: Adiciona(); ; break; // Crear Actor
      case 7: $User->Borra($_GET['id']); //Borra Actor
              $User->Formlistar(); break; // Formulario Listado Actores
      case 8: Actualiza();   break; //Actualiza Actor
      case 9: $User->FormaAñadirs($_GET['id']); break; //Formulario relacionar actor en serie
      case 10: AnadeSerie(); break;  // Relaciona la Serie
      case 11: $User->FormlisSerie($_GET['id']); break; //Formulario Series
      case 12: BorraSerie(); // Borra Serie relacionada
      


## Installation

La aplicacion tal como se dijo fue hecha en php puro entonces solo necesitamos instalar un servidor web interno tales como (XAMMP o Uwamp ) el cual cuente con PHP , MySQL y apache para el buen funcionamiento de la app.
