<?php

namespace app\Controllers;

use app\Models\Contact;

class ContactController extends ViewController
{
    public function index(): string
    {
        $title = 'Contacts';
        $description = 'Contact List';

        $contactModel = new Contact();
        $contacts = $contactModel->all();

        return $this->view('contacts-index.view', compact(
            'title',
            'description',
            'contacts'
        ));
    }

    public function create(): string
    {
        return 'Here the form to create a contact will be displayed';
    }

    public function store(): string
    {
        return 'Here the form to create a contact will be processed';
    }

    public function show(int $id): string
    {
        return "Here the details of the contact with id will be displayed: $id";
    }

    public function edit(int $id): string
    {
        return "Here the form to edit a contact with id will be displayed: $id";
    }

    public function update(int $id): string
    {
        return "Here the form to edit a contact with id will be processed: $id";
    }

    public function destroy(int $id): string
    {
        return "Here the request to delete the contact with id will be processed: $id";
    }
}
