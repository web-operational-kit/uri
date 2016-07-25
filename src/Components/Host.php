<?php

    namespace WOK\Uri\Components;

    class Host {

        protected $host;

        public function __construct($host) {
            $this->host = $host;
        }


        public function __toString() {
            return $this->host;
        }


    }
