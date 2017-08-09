<?php
namespace Digitick\Foundation\FileManager\PathManager;
/**
 * Class PathManager
 * @package Digitick\Foundation\FileManager\PathManager
 */
class PathManager implements PathManagerInterface
{
    /**
     * @var PathManagerInterface
     */
    private $delegate;

    /**
     * @var string
     */
     protected $basePath;
     protected $relativePath;
     protected $fileName;

    public function __construct($basePath, $relativePath = '', $fileName = '')
    {
        $this->basePath = $basePath;
        $this->relativePath = $relativePath;
        $this->fileName = $fileName;
    }

    /**
     * @return PathManagerInterface
     */
    public function getPathManager()
    {
        if ($this->delegate) {
            return $this->delegate;
        }

        return $this;
    }

    /**
     * @param PathManagerInterface $delegate
     */
    public function setPathManagerDelegate(PathManagerInterface $delegate)
    {
        $this->delegate = $delegate;
    }

    public function getBasePath()
    {
        if ($this->delegate) {
            return $this->delegate->getBasePath();
        }

        return $this->basePath;
    }

    public function getFileName()
    {
        if ($this->delegate) {
            return $this->delegate->getFileName();
        }

        return $this->fileName;
    }

    public function getRelativePath()
    {
        if ($this->delegate) {
            return $this->delegate->getRelativePath();
        }

        return $this->relativePath;
    }
}
