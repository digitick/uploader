<?php
use PHPUnit\Framework\TestCase;

use org\bovigo\vfs\vfsStream;

class UploaderTest extends TestCase
{
    protected $uploader;
    protected $root;

    private function setupFileSystem()
    {
        $fs = [
            'processing' => [
                'test' => 'This is a test file'
            ],
            'uploaded' => []
        ];
        vfsStream::setup('root', 777 ,$fs);
    }

    private function getMockUploaderDelegate()
    {
        return $this
            ->getMockBuilder('Digitick\Foundation\FileManager\Uploader\UploaderInterface')
            ->getMock();
    }

    protected function setUp()
    {
        $this->uploader = new Digitick\Foundation\FileManager\Uploader\Uploader();
    }

    /**
     * @expectedException \PHPUnit_Framework_Error
     */
    public function testSetUploaderDelegate_InvalidArgument()
    {
        $this->uploader->setUploaderDelegate(null);
    }

    public function testSetUploaderDelegate_ValidArgument()
    {
        $delegate = $this->getMockUploaderDelegate();

        $this->uploader->setUploaderDelegate($delegate);
    }

    public function testGetUploader_WithoutDelegate()
    {
        $this->assertInstanceOf(
            'Digitick\Foundation\FileManager\Uploader\UploaderInterface',
            $this->uploader->getUploader()
        );
    }

    public function testGetUploader_WithDelegate()
    {
        $delegate = $this->getMockUploaderDelegate();

        $this->uploader->setUploaderDelegate($delegate);

        $this->assertInstanceOf(
            'Digitick\Foundation\FileManager\Uploader\UploaderInterface',
            $this->uploader->getUploader()
        );
    }

    public function testUpload_WithoutDelegate()
    {
        $this->setupFileSystem();
        $file = new \SplFileObject(vfsStream::url('root/processing/test'), 'r');
        $this->uploader->upload($file, vfsStream::url('root/uploaded'));

        $this->assertFileExists(vfsStream::url('root/uploaded/test'));
    }

    public function testUpload_WithDelegate()
    {
        $this->setupFileSystem();

        $this->uploader->setUploaderDelegate($this->getMockUploaderDelegate());
        $file = new \SplFileObject(vfsStream::url('root/processing/test'), 'r');
        $this->uploader->upload($file, vfsStream::url('root/uploaded'));
    }

}
