<?php
class ProfilPatientController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("ProfilPatient");
        // HTML header
        $this->head['title'] = 'ProfilPatient';
        // Sets the template
        $this->view = 'profilPatient';
    }
}
?>