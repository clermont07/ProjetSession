
<?php
class FactureController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("Facture");
        // HTML header
        $this->head['title'] = 'Facture';
        // Sets the template
        $this->view = 'facture';
    }
}
?>