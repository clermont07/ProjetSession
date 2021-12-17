<?php
class PatientController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("Patient");
        // HTML header
        $this->head['title'] = 'Patient';
        // Sets the template
        $this->view = 'patient';
    }
}