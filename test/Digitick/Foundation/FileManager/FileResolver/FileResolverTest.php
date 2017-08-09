<?php
use PHPUnit\Framework\TestCase;

use Digitick\Foundation\FileManager\FileResolver\FileResolver;

class FileResolverTest extends TestCase
{
    protected $fileresolver;

    private function getMockFileResolverDelegate()
    {
        return $this
            ->getMockBuilder('Digitick\Foundation\FileManager\FileResolver\FileResolverInterface')
            ->getMock();
    }

    protected function setUp()
    {
        $this->fileResolver = new FileResolver();
    }

    /**
     * @expectedException \PHPUnit_Framework_Error
     */
    public function testSetFileResolverDelegate_InvalidArgument()
    {
        $this->fileResolver->setFileResolverDelegate(null);
    }

    public function testSetFileResolverDelegate_ValidArgument()
    {
        $delegate = $this->getMockFileResolverDelegate();

        $this->fileResolver->setFileResolverDelegate($delegate);
    }

    public function testGetFileResolver_WithoutDelegate()
    {
        $this->assertInstanceOf(
            'Digitick\Foundation\FileManager\FileResolver\FileResolverInterface',
            $this->fileResolver->getFileResolver()
        );
    }

    public function testGetFileResolverManager_WithDelegate()
    {
        $this->fileResolver->setFileResolverDelegate($this->getMockFileResolverDelegate());

        $this->assertInstanceOf(
            'Digitick\Foundation\FileManager\FileResolver\FileResolverInterface',
            $this->fileResolver->getFileResolver()
        );
    }

    public function testResolve_WithoutDelegate()
    {
        $filename = 'example';
        $filetype = 'jpg';

        $this->assertEquals(
            $filename,
            $this->fileResolver->resolve($filetype, $filename)
        );
    }

    public function testResolve_WithDelegate()
    {
        $filename = 'example';
        $filetype = 'jpg';

        $this->fileResolver->setFileResolverDelegate($this->getMockFileResolverDelegate());

        $this->fileResolver->resolve($filetype, $filename);
    }

}
