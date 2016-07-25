<?php

    namespace WOK\Uri\Components;

    class Path {

        /**
         * @var string      $path       URI path
        **/
        protected $path;


        /**
         * Instanciate Path object
         * @param   string      $path       Path string
        **/
        public function __construct($path) {
            $this->path = $path;
        }


        /**
         * Retrieve path basename
         * @param   string       $suffix        Suffix to remove
         * @return  string       Returns trailing name component of path
        **/
        public function getBasename($suffix = null) {
            return basename($this->path, $suffix);
        }

        /**
         * Get path segments
         * @return  array       Returns path segments
        **/
        public function getSegments() {

            if(!isset($this->segments))
                $this->segments = explode('/', $this->path);

            return $this->segments;

        }


        /**
         * Get the URI path as a string
         * @return  string
        **/
        public function __toString() {
            return $this->path;
        }


    }
