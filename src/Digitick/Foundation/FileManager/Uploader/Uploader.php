<?php
namespace Digitick\Foundation\FileManager\Uploader;

/**
 * Class Uploader
 * @package Digitick\Foundation\FileManager\Uploader
 */
class Uploader implements UploaderInterface
{
    /**
     * @var UploaderInterface
     */
    private $delegate;

    /**
     * @return UploaderInterface
     */
    public function getUploader()
    {
        if ($this->delegate) {
            return $this->delegate;
        }

        return $this;
    }

    /**
     * @param UploaderInterface $delegate
     */
    public function setUploaderDelegate(UploaderInterface $delegate)
    {
        $this->delegate = $delegate;
    }

    public function upload(\SplFileObject $file, $path, array $parameters = [])
    {

        if ($this->delegate) {
            return $this->delegate->upload($file, $path, $parameters);
        }

        return rename($file->getPath() . '/' . $file->getFileName(), $path . '/' . $file->getFileName());
    }
}
