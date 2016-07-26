<?php

    use PHPUnit\Framework\TestCase;

    use \WOK\Uri\Uri;
    use \WOK\Uri\Components\User;

    class UserTest extends TestCase {

        const URI_USERNAME             = 'user';
        const URI_USERNAME_ALT         = 'username';
        const URI_PASSWORD             = 'pass';
        const URI_PASSWORD_ALT         = 'password';
        const URI_COMPLETE             = 'http://user:pass@domain.tld/';


        public function __construct() {
            $uri = Uri::createFromString(self::URI_COMPLETE);
            $this->user = $uri->user;
        }

        public function testUser() {

            $this->assertInstanceOf(User::class, $this->user);

        }

        /**
         * Test username
        **/
        public function testUsername() {

            $this->assertEquals(
                $this->user->getUsername(),
                self::URI_USERNAME
            );

            $user = clone $this->user;

            $withUsername = $user->withUsername(self::URI_USERNAME_ALT);
            $this->assertNotEquals($withUsername, $user);

            $user->setUsername(self::URI_USERNAME_ALT);
            $this->assertEquals(self::URI_USERNAME_ALT, $user->getUsername());

        }


        /**
         * Test username
        **/
        public function testPassword() {

            $this->assertEquals(
                $this->user->getPassword(),
                self::URI_PASSWORD
            );

            $user = clone $this->user;

            $withPassword = $user->withPassword(self::URI_PASSWORD_ALT);
            $this->assertNotEquals($withPassword, $user);

            $user->setPassword(self::URI_PASSWORD_ALT);
            $this->assertEquals(self::URI_PASSWORD_ALT, $user->getPassword());

        }



    }
