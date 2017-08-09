<?php

namespace Digitick\Foundation\FileManager\PathManager;

/**
 * Interface PathManagerInterface
 * @package Digitick\Foundation\FileManager\PathManager
 */
interface PathManagerInterface
{

    /**
     * Renvoie le chemin de base dans le systeme de fichier où stocker le fichier
     * @return string
     */
    public function getBasePath();

    /**
     * Renvoie le chemin relatif à partir du chemin de base dans le systeme de fichier où stocker le fichier
     * @return string
     */
    public function getRelativePath();

    /**
     * Renvoie le nom de base du fichier à générer
     * @return string
     */
    public function getFileName();
}
