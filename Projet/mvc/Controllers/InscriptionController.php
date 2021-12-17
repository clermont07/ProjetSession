<?php
class InscriptionController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("Inscription");
        // HTML header
        $this->head['title'] = 'Inscription';
        // Sets the template
        $this->view = 'inscription';
    }
}