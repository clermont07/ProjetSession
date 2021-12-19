<?php
class ProfilController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("Profil");
        // HTML header
        $this->head['title'] = 'Profil';
        // Sets the template
        $this->view = 'profil';
    }
}