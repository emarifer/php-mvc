<?php

namespace app\Controllers;

class HomeController extends ViewController
{
    public function index(): string
    {
        return $this->view('home.view', [
            'title' => 'Home',
            'description' => 'Hello from the Home page!!',
        ]);
    }
}

/* Test del Modelo Contact

// use app\Models\Contact;

//  | array | false | null


        // $contactModel = new Contact();

        // return $contactModel->all();

        // INYECCIÓN SQL:
        // Daría igual que nombre colocara un usario malicioso, porque
        // el filtro siempre se cumpliría. Es un ejemplo de Inyección SQL
        // SELECT * FROM contacts WHERE name = 'Soy un Hacker' OR 'a' = 'a';
        // Con una CONSULTA PREPARADA se escapa todos los caracteres que un
        // usuario malicioso pudiera ingresar
        // return $contactModel
        //     ->where("name", "Soy un Hacker' OR 'a' = 'a")->get();
        // return $contactModel
        //     ->where("name", "Enrique Marín")->get();

*/
