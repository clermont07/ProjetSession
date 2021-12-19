<?php
class DecoController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("Deco");
        // HTML header
        $this->head['title'] = 'Deco';
        // Sets the template
        $this->view = 'deco';
    }
}