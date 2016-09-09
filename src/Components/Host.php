<?php

    namespace WOK\Uri\Components;

    class Host {

        /**
         * @var     string      $host       Complete host string
        **/
        protected $host;

        /**
         * Instanciante Host object
         * @param
        **/
        public function __construct($host) {
            $this->host = $host;
        }

        /**
         * Retrieve the host suffix
         * @return  string
        **/
        public function getSuffix() {

            $pos = mb_strrpos($this->host, '.');
            return mb_substr($this->host, $pos+1);

        }

        /**
         * Get the host value
         * @return  string      Returns the host as a string format
        **/
        public function __toString() {
            return $this->host;
        }


    }
