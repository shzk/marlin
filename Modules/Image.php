<?php

class Image
{
    public function upload()
    {
        $fileName = $_FILES["img"]["name"];
        $fileTmpLoc = $_FILES["img"]["tmp_name"];
        $kaboom = explode(".", $fileName);
        $fileExt = end($kaboom);
        $uploaded_name = rand(100000000000,999999999999) . "." . $fileExt;
        $imgFolderLocation = ROOT . 'usercontent/uploads/';
        $uploadfile = $imgFolderLocation . $uploaded_name;

        return move_uploaded_file($fileTmpLoc, $uploadfile);
    }
}