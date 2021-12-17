<?php
class InfirmiereController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("Infirmiere");
        // HTML header
        $this->head['title'] = 'Infirmiere';
        // Sets the template
        $this->view = 'infirmiere';
    }
}