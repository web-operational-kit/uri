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
         * Get the path
        **/
        public function getPath($path) {

            return $this->path;

        }


        /**
         * Set a new path
         * @param   string      $path       New path
        **/
        public function setPath($path) {

            $this->path = $path;

        }


        /**
         * Get a Path clone with a new defined path
         * @param   string      $path       New path
        **/
        public function withPath($path) {

            $p = clone $this;
            $p->setPath($path);

            return $p;

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
