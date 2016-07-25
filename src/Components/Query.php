<?php

    namespace WOK\Uri\Components;


    class Query implements \Iterator {

        /**
         * @var     array       $parameters         Query parameters
        **/
        protected $parameters = array();


        /**
         * Instanciate Query object
         * @param   array       $parameters         Parameters list
        **/
        public function __construct(array $parameters) {

            $this->parameters = $parameters;
            $this->rewind(); // Reset Iterator cursor position

        }


        /**
         * Instanciate Query object from a string
         * @param   string      $query              Query string
         * @return  Query       Return a new Query object
        **/
        public static function createFromString($query) {
            
            if(!mb_parse_str($query, $parameters))
                throw new \LogicException('Unable to parse query string');

            return new self($parameters);

        }


        /**
         * Check if a parameter has been defined
         * @param   string      $name       Parameter's name
         * @return  boolean     Return whether the parameter is defined or not
        **/
        public function hasParameter($name) {
            return (isset($this->parameters[$name]));
        }

        /**
         * Get a parameter value
         * @param   string       $name       Parameter's name
         * @return  mixed        Return the parameter value
        **/
        public function getParameter($name) {

            if(!$this->hasParameter($name))
                return false;

            return ($this->parameters[$name]);

        }


        /**
         * Define a parameter value
         * @param   string       $name       Parameter's name
         * @param   mixed        $value      Parameter's value
        **/
        public function setParameter($name, $value) {

            $this->parameters[$name] = $value;

        }


        /**
         * Get a new Query with a specified parameter
         * @param   string       $name       Parameter's name
         * @param   mixed        $value      Parameter's value
         * @return  Query        Return a new Query with the specified param
        **/
        public function withParameter($name, $value) {

            $query = clone $this;
            $query->setParameter($name, $value);

            return $query;

        }

        /**
         * Reset parameters iteration cursor
         * @note This method is part of the Iterator interface
        **/
        public function rewind() {
            reset($this->parameters);
        }

        /**
         * Advance iterator cursor by one
         * @note This method is part of the Iterator interface
        **/
        public function next() {
            next($this->parameters);
        }

        /**
         * Check if the current cursor position is valid
         * @note This method is part of the Iterator interface
         * @return  boolean         Return whether the position is valid or not
        **/
        public function valid() {
            return $this->hasParameter($this->key());
        }

        /**
         * Get the iterator cursor pointed parameter name
         * @note This method is part of the Iterator interface
        **/
        public function key() {
            return key($this->parameters);
        }

        /**
         * Get the iterator cursor pointed parameter value
         * @note This method is part of the Iterator interface
        **/
        public function current() {
            return current($this->parameters);
        }


        /**
         * Get the string formatted Query
         * @param   string      Query string as param=val&param1=val1...
        **/
        public function __toString() {

            return http_build_query($this->parameters);

        }

    }
