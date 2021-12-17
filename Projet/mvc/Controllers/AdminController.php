<?php
class AdminController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("Admin");
        // HTML header
        $this->head['title'] = 'Admin';
        // Sets the template
        $this->view = 'admin';
    }
}