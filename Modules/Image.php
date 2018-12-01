<?php

class Image
{
    public function upload($img)
    {
        $fileName = $img["name"];
        $fileTmpLoc = $img["tmp_name"];
        $kaboom = explode(".", $fileName);
        $fileExt = end($kaboom);
        $uploaded_name = rand(100000000000,999999999999) . "." . $fileExt;
        $imgFolderLocation = ROOT . 'usercontent/uploads/';
        $uploadFile = $imgFolderLocation . $uploaded_name;

        return move_uploaded_file($fileTmpLoc, $uploadFile);
    }
}