<?php

interface DatabaseMethods{
    public function create(Contact $contactData);
    public function findAll();
    public function update(Contact $contactData);
    public function delete($id);
}