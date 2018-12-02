<?php

class Image
{
    public function upload($img) // for example /tmp/dfkhkj.jpg
    {
        $kaboom = explode(".", $img);
        $fileExt = end($kaboom);
        $uploaded_name = rand(100000000000,999999999999) . "." . $fileExt;
        $imgFolderLocation = ROOT . 'usercontent/uploads/';
        $uploadFile = $imgFolderLocation . $uploaded_name;

        return move_uploaded_file($img, $uploadFile);
    }
}