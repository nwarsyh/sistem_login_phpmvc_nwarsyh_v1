<?php

class ErrorNotFound extends ControllerLogin
{
    public function errornotfound()
    {
        $getDataApp['titleweb'] = 'Anwarsyah | 404 Not Found';
        $getDataApp['subtitlewebError'] = $this->model('ErrorNotFoundModel')->GetErrorNotFound();
        $this->view('errornotfound/errornotfound', $getDataApp);
    }
}