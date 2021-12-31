<?php
class AffichePatientController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("AffichePatient");
        // HTML header
        $this->head['title'] = 'AffichePatient';
        // Sets the template
        $this->view = 'affichePatient';
    }
}
?>