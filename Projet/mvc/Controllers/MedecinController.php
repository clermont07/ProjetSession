<?php
class MedecinController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("Medecin");
        // HTML header
        $this->head['title'] = 'Medecin';
        // Sets the template
        $this->view = 'medecin';
    }
}