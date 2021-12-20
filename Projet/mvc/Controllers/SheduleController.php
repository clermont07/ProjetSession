<?php
class SheduleController extends Controller
{
    public function process($params)
    {
        // HTTP header
        header("Shedule");
        // HTML header
        $this->head['title'] = 'Shedule';
        // Sets the template
        $this->view = 'shedule';
    }
}
?>