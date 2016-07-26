<?php

    namespace WOK\Uri\Components;


    class User {

        /**
         * @var     string      $username       User name
        **/
        protected $username;

        /**
         * @var     string      $password       User password
        **/
        protected $password;


        /**
         * Instanciate a new User object
         * @param   string      $username       User name
         * @param   string      $password       User password
        **/
        public function __construct($username, $password) {

            $this->username     = $username;
            $this->password     = $password;

        }


        /**
         * Get a User property
         * @return  mixed       Return property value or component
        **/
        public function __get($property) {

            if(!isset($this->$property))
                throw new \DomainException(
                    'Undefined property "'.$property.'" for "'.get_class($this).'"(accepted: '.implode('|', get_object_vars($this)).')'
                );

            return $this->$property;

        }


        /**
         * Instanciate a new User object from a string
         * @param   string      $username       User name
         * @param   string      $password       User password
         * @param   User        Returns a new User object
        **/
        public static function createFromString($string) {

            if(mb_strpos($string, ':') !== false) {
                list($username, $password) = explode(':', $string, 2);
            }
            else {
                $username = $string;
                $password = $password;
            }

            return new self($username, $password);

        }


        /**
         * Get the URI user
        **/
        public function getUsername() {
            return $this->username;
        }

        /**
         * Define the URI user
         * @param   string      $username       New username value
        **/
        public function setUsername($username) {
            $this->username = $username;
        }

        /**
         * Get a new User with a specified username
         * @param   string      $username       New username value
        **/
        public function withUsername($username) {

            $uri = clone $this;
            $uri->setUsername($username);

            return $uri;

        }


        /**
         * Get the URI user password
        **/
        public function getPassword() {
            return $this->password;
        }

        /**
         * Define the URI user
         * @param   string      $password       New password value
        **/
        public function setPassword($password) {
            $this->password = $password;
        }

        /**
         * Get a new User with a specified password
         * @param   string      $password       New password value
        **/
        public function withPassword($password) {

            $uri = clone $this;
            $uri->setPassword($password);

            return $uri;

        }


        /**
         * Get the string formatted User informations
         * @return  string      Return the user as user:pass
        **/
        public function __toString() {

            $string = $this->username;

            if(!empty($this->password)) {
                $string .= ':'.$this->password;
            }

            return $string;

        }


    }
