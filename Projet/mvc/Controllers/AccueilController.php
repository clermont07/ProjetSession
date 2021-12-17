<?php
class AccueilController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("Accueil");
        // HTML header
        $this->head['title'] = 'Accueil';
        // Sets the template
        $this->view = 'accueil';
    }
}