<?php

    use PHPUnit\Framework\TestCase;

    use \WOK\Uri\Uri;
    use \WOK\Uri\Components\Path;

    class PathTest extends TestCase {

        const PATH_COMPLETE             = '/path/to/my/resource.ext';
        const PATH_ALTERNATIVE          = '/another/way/to/my/resource.ext';
        const RESOURCE_NAME             = 'resource.ext';
        const RESOURCE_EXTENSION        = '.ext';
        const RESOURCE_WITHOUT_EXT      = 'resource';
        const URI_COMPLETE              = 'http://domain.tld/path/to/my/resource.ext';


        public function __construct() {
            $uri = Uri::createFromString(self::URI_COMPLETE);
            $this->path = $uri->path;
        }

        public function testPath() {

            $this->assertEquals(self::PATH_COMPLETE, (string) $this->path);
            $this->assertInstanceOf(Path::class, $this->path);

            $setPath = clone $this->path;
            $setPath->setPath(self::PATH_ALTERNATIVE);
            $this->assertEquals(self::PATH_ALTERNATIVE, (string) $setPath);

            $withPath = $this->path->withPath(self::PATH_ALTERNATIVE);
            $this->assertInstanceOf(Path::class, $withPath);
            $this->assertEquals(self::PATH_ALTERNATIVE, (string) $withPath);

        }

        /**
         * Test basename method
        **/
        public function testBasename() {

            $this->assertEquals(
                $this->path->getBasename(),
                self::RESOURCE_NAME
            );

        }

        /**
         * Test basename method removing suffix
        **/
        public function testBasenameWithSuffix() {

            $this->assertEquals(
                $this->path->getBasename(self::RESOURCE_EXTENSION),
                self::RESOURCE_WITHOUT_EXT
            );

        }

    }
