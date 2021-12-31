<?php
class AfficheEmployerController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("AfficheEmployer");
        // HTML header
        $this->head['title'] = 'AfficheEmployer';
        // Sets the template
        $this->view = 'afficheEmployer';
    }
}
?>