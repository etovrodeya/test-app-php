<?php

class FileRecord
{
    private $file;
    private $figuresList;


    function openFile($path) {
        $this->file = file_get_contents($path);
    }

    function getFiguresList() {
        return $this->figuresList = json_decode($this->file,TRUE);
    }
    
    function putFiguresList($path, $figuresList) {
        file_put_contents($path, json_encode($figuresList, JSON_UNESCAPED_UNICODE));
    }
}

?>