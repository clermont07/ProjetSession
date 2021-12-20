<?php
class OrdonnanceController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("Ordonnance");
        // HTML header
        $this->head['title'] = 'Ordonnance';
        // Sets the template
        $this->view = 'ordonnance';
    }
}
?>