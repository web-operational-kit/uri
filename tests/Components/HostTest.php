<?php

    use PHPUnit\Framework\TestCase;

    use \WOK\Uri\Uri;
    use \WOK\Uri\Components\Host;

    class HostTest extends TestCase {

        const URI_USERNAME             = 'user';
        const URI_USERNAME_ALT         = 'username';
        const URI_PASSWORD             = 'pass';
        const URI_PASSWORD_ALT         = 'password';
        const URI_HOST_SUFFIX          = 'tld';
        const URI_HOST                 = 'www.domain.tld';
        const URI_COMPLETE             = 'http://user:pass@www.domain.tld/';

        /**
         * Instanciante host object for tests
         * ---
        **/
        public function __construct() {

            $uri = Uri::createFromString(self::URI_COMPLETE);
            $this->host = $uri->host;

        }


        /**
         * Is this object an instance of the Host class ?
         * ---
        **/
        public function testHostClass() {

            $this->assertInstanceOf(Host::class, $this->host);

        }

        /**
         * Does the method `getSuffix` works ?
         * ---
        **/
        public function testSuffix() {

            $this->assertEquals(self::URI_HOST_SUFFIX, $this->host->getSuffix());

        }

        /**
         * Does the __toString method works ?
         * ---
        **/
        public function testToString() {

            $this->assertEquals(self::URI_HOST, (string) $this->host);

        }



    }
