<?php
class ConnectionController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("Connection");
        // HTML header
        $this->head['title'] = 'Connection';
        // Sets the template
        $this->view = 'connection';
    }
}