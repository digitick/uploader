<?php
use PHPUnit\Framework\TestCase;

use Digitick\Foundation\FileManager\PathManager\PathManager;

class PathManagerTest extends TestCase
{
    const BASE_PATH = 'root';
    const RELATIVE_PATH = 'example';
    const FILE_NAME = 'test';

    protected $pathmanager;

    private function getMockPathManagerDelegate()
    {
        return $this
            ->getMockBuilder('Digitick\Foundation\FileManager\PathManager\PathManagerInterface')
            ->getMock();
    }

    protected function setUp()
    {
        $this->pathManager = new PathManager(self::BASE_PATH, self::RELATIVE_PATH, self::FILE_NAME);
    }

    /**
     * @expectedException \PHPUnit_Framework_Error
     */
    public function testSetPathManagerDelegate_InvalidArgument()
    {
        $this->pathManager->setPathManagerDelegate(null);
    }

    public function testSetPathManagerDelegate_ValidArgument()
    {
        $delegate = $this->getMockPathManagerDelegate();

        $this->pathManager->setPathManagerDelegate($delegate);
    }

    public function testGetPathManager_WithoutDelegate()
    {
        $this->assertInstanceOf(
            'Digitick\Foundation\FileManager\PathManager\PathManagerInterface',
            $this->pathManager->getPathManager()
        );
    }

    public function testGetPathManagerManager_WithDelegate()
    {
        $this->pathManager->setPathManagerDelegate($this->getMockPathManagerDelegate());

        $this->assertInstanceOf(
            'Digitick\Foundation\FileManager\PathManager\PathManagerInterface',
            $this->pathManager->getPathManager()
        );
    }

    public function testGetBasePath_WithoutDelegate()
    {
        $this->assertEquals(
            self::BASE_PATH,
            $this->pathManager->getBasePath()
        );
    }

    public function testGetBasePath_WithDelegate()
    {
        $this->pathManager->setPathManagerDelegate($this->getMockPathManagerDelegate());
        $this->pathManager->getBasePath();
    }

    public function testGetFileName_WithoutDelegate()
    {
        $this->assertEquals(
            self::FILE_NAME,
            $this->pathManager->getFileName()
        );

    }

    public function testGetFileName_WithDelegate()
    {
        $this->pathManager->setPathManagerDelegate($this->getMockPathManagerDelegate());
        $this->pathManager->getFileName();
    }

    public function testGetRelativePath_WithoutDelegate()
    {
        $this->assertEquals(
            self::RELATIVE_PATH,
            $this->pathManager->getRelativePath()
        );
    }

    public function testGetRelativePath_WithDelegate()
    {
        $this->pathManager->setPathManagerDelegate($this->getMockPathManagerDelegate());
        $this->pathManager->getRelativePath();

    }
}
