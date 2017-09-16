<?php

use org\bovigo\vfs\vfsStream;
use PHPUnit\Framework\TestCase;
use Unity\Component\Config\DriversRegistry;
use Unity\Component\Config\Matcher\SourceMatcher;

class SourceResolverTest extends TestCase
{
    public function testResolve()
    {
        $folder = $this->getFolder();
        $sourceResolver = $this->getSourceResolver();

        $expectedSource = $folder.DIRECTORY_SEPARATOR.'vars.php';

        $src = $sourceResolver->match(
            $folder,
            'vars',
            null,
            null);

        $this->assertEquals($expectedSource, $src->get());
    }

    public function testResolveWithSourceArray()
    {
        $folder = $this->getFolder();
        $sourceResolver = $this->getSourceResolver();

        $expectedSource = $folder.DIRECTORY_SEPARATOR.'vars.php';

        $src = $sourceResolver->match(
            ['?', '??', '???', $folder],
            'vars',
            null,
            null
        );

        $this->assertEquals($expectedSource, $src->get());
    }

    public function getFolder()
    {
        $dir = ['vars.php' => ''];

        $virtualFolder = vfsStream::setup(
            'configs',
            444,
            $dir
        );

        return $virtualFolder->url().DIRECTORY_SEPARATOR;
    }

    public function getSourceResolver()
    {
        $driversRegistryMock = $this->createMock(DriversRegistry::class);

        $driversRegistryMock
            ->expects($this->once())
            ->method('driverSupportsExt')
            ->willReturn(true);

        return new SourceMatcher($driversRegistryMock);
    }
}
