<?php

    use PHPUnit\Framework\TestCase;

    use \WOK\Uri\Uri;

    class UriTest extends TestCase {

        const URI_SCHEME        = 'http';
        const URI_SCHEME_ALT    = 'https';
        const URI_USERNAME      = 'user';
        const URI_USERNAME_ALT  = 'username';
        const URI_PASSWORD      = 'pass';
        const URI_PASSWORD_ALT  = 'password';
        const URI_HOST          = 'www.domain.tld';
        const URI_SUBDOMAIN     = 'www';
        const URI_HOST_SUFFIX   = 'tld';
        const URI_COMPLETE      = 'http://user:password@www.domain.tld/path/to/my/resource.ext?param=abcd&param2=def';


        /**
         * Instanciate Uri object
         * ---
        **/
        public function __construct() {
            $this->uri = $uri = Uri::createFromString(self::URI_COMPLETE);
        }


        /**
         * Test instanciate from string
         * ---
        **/
        public function testInstanciateFromString() {

            $this->assertInstanceOf(Uri::class, $this->uri);

        }


        /**
         * Test scheme recovery and alteration
         * ---
        **/
        public function testScheme() {

            $this->assertEquals(self::URI_SCHEME, $this->uri->getScheme());

            $withScheme = $this->uri->withScheme(self::URI_SCHEME_ALT);
            $this->assertEquals(self::URI_SCHEME_ALT, $withScheme->getScheme());
            $this->assertNotEquals($this->uri, $withScheme);

        }


        /**
         * Test __toString()
        **/
        public function testToString() {

            $uri = Uri::createFromString(self::URI_COMPLETE);
            $this->assertEquals(self::URI_COMPLETE, (string) $uri);

        }

    }
