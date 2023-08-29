<?php

namespace app\Controllers;

use app\Models\Contact;

class ContactController extends ViewController
{
    public function index(): string
    {
        $title = 'Contacts';
        $description = 'Contact List';

        $contactModel = new Contact;
        $contacts = $contactModel->all();

        return $this->view('contacts-index.view', compact(
            'title',
            'description',
            'contacts'
        ));
    }

    public function create(): string
    {
        $title = 'Create Contact';
        $description = 'Create Contact';

        return $this->view('contacts-create.view', compact(
            'title',
            'description'
        ));
    }

    public function store(): void
    {
        if (isset($_POST)) {
            $contactModel = new Contact;

            $data = $_POST;
            $contactModel->create($data);

            $this->redirect('/contacts');
        }
    }

    public function show(int $id): string
    {
        $title = 'Show Contact';
        $description = 'Contact details';

        $contactModel = new Contact;
        $contact = $contactModel->find($id);

        return $this->view('contacts-show.view', compact(
            'title',
            'description',
            'contact'
        ));
    }

    public function edit(int $id): string
    {
        $title = 'Edit Contact';
        $description = 'Edit details';

        $contactModel = new Contact;
        $contact = $contactModel->find($id);

        return $this->view('contacts-edit.view', compact(
            'title',
            'description',
            'contact'
        ));
    }

    public function update(int $id): void
    {
        if (isset($_POST)) {
            $contactModel = new Contact;

            $data = $_POST;
            $contactModel->update($id, $data);

            $this->redirect("/contacts/$id");
        }
    }

    public function destroy(int $id): void
    {
        $contactModel = new Contact;

        $contactModel->delete($id);

        $this->redirect("/contacts");
    }
}
