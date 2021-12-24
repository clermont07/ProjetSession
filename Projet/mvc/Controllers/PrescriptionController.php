<?php
class PrescriptionController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("Prescription");
        // HTML header
        $this->head['title'] = 'Prescription';
        // Sets the template
        $this->view = 'prescription';
    }
}
?>