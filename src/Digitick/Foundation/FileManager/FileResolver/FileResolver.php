<?php

namespace Digitick\Foundation\FileManager\FileResolver;

/**
 * Class FileResolver
 * @package Digitick\Foundation\FileManager\FileResolver
 */
class FileResolver implements FileResolverInterface
{
    /**
     * @var FileResolverInterface
     */
    private $delegate;

    /**
     * @return FileResolverInterface
     */
    public function getFileResolver()
    {
        if ($this->delegate) {
            return $this->delegate;
        }

        return $this;
    }

    /**
     * @param FileResolverInterface $delegate
     */
    public function setFileResolverDelegate(FileResolverInterface $delegate)
    {
        $this->delegate = $delegate;
    }

    public function resolve($fileType, $fileName)
    {
        if ($this->delegate) {
            return $this->delegate->resolve($fileType, $fileName);
        }

        return $fileName;
    }
}
