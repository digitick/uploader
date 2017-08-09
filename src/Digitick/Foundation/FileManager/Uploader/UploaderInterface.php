<?php

namespace Digitick\Foundation\FileManager\Uploader;

/**
 * Interface UploaderInterface
 * @package Digitick\Foundation\FileManager\Uploader
 */
interface UploaderInterface
{
    /**
     * @param  \SplFileObject $file       Le fichier à stocker
     * @param  string         $path       Le chemin où stocker le fichiers
     * @param  array          $parameters Un tableau permettant de stocker les informations de transformations de fichier
     * @return array          Renvoie le/les fichiers générés
     */
    public function upload(\SplFileObject $file, $path, array $parameters);
}
