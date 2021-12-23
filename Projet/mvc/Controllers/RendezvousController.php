<?php
class RendezvousController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("Rendezvous");
        // HTML header
        $this->head['title'] = 'Rendezvous';
        // Sets the template
        $this->view = 'rendezvous';
    }
}
?>