<?php
class InfoHopitalController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("Hopital");
        // HTML header
        $this->head['title'] = 'Hopital';
        // Sets the template
        $this->view = 'infoHopital';
    }
}