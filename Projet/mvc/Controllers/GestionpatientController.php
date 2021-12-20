<?php
class GestionpatientController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("Gestionpatient");
        // HTML header
        $this->head['title'] = 'Gestionpatient';
        // Sets the template
        $this->view = 'gestionpatient';
    }
}