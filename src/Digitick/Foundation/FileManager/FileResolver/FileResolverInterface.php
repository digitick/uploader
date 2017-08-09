<?php

namespace Digitick\Foundation\FileManager\FileResolver;

/**
 * Interface FileResolverInterface
 * @package Digitick\Foundation\FileManager\FileResolver
 */
interface FileResolverInterface
{
    /**
     * @param  int    $fileType Le type de fichier à trouver
     * @param  string $fileName Le nom du fichier
     * @return array  L'ensemble des chemins absolus des fichiers correspondants aux paramètres passés
     */
    public function resolve($fileType, $fileName);
}
