<?php

    /**
    * Web Operational Kit
    * The neither huger nor micro humble framework
    *
    * @copyright   All rights reserved 2015, Sébastien ALEXANDRE <sebastien@graphidev.fr>
    * @author      Sébastien ALEXANDRE <sebastien@graphidev.fr>
    * @license     BSD <license.txt>
    **/

    namespace WOK\Uri;

    use \WOK\Uri\Components\User;
    use \WOK\Uri\Components\Host;
    use \WOK\Uri\Components\Path;
    use \WOK\Uri\Components\Query;

    use \Psr\Http\Message\UriInterface;


    /**
     * The Uri class provide an interface
     * for the request URI
    **/
    class Uri implements UriInterface {

        /**
         * @var string      $scheme         Uri scheme
        **/
        protected $scheme;

        /**
         * @var User        $user           Uri user component
        **/
        protected $user;

        /**
         * @var Host        $host           Uri Host component
        **/
        protected $host;

        /**
         * @var integer     $port           Uri port
        **/
        protected $port;

        /**
         * @var Path        $path           Uri Path component
        **/
        protected $path;

        /**
         * @var Query       $query           Uri Query component
        **/
        protected $query;

        /**
         * @var string      $fragment         Uri fragment
        **/
        protected $fragment;


        /**
         * Instanciate a Uri object
         * @param   string      $scheme        URI scheme
         * @param   User        $user          URI User component
         * @param   Host        $host          URI Host component
         * @param   integer     $port          URI Port
         * @param   Path        $path          URI Path component
         * @param   Query       $query         URI Query component
         * @param   string      $fragment      URI fragment
        **/
        public function __construct($scheme = '', User $user, Host $host, $port, Path $path, Query $query, $fragment = '') {

            $this->scheme       = $scheme;
            $this->user         = $user;
            $this->host         = $host;
            $this->port         = $port;
            $this->path         = $path;
            $this->query        = $query;
            $this->fragment     = $fragment;

        }


        /**
         * Instanciate the Uri object from a string
         * @param   string      $uri        The URI to parse
         * @return  Uri         Returns a URI object
        **/
        public static function createFromString($uri) {

            $parts = parse_url($uri);

            $scheme     = (isset($parts['scheme']) ? $parts['scheme'] : '');

            $user       = new User(
                (isset($parts['user']) ? $parts['user'] : null),
                (isset($parts['pass']) ? $parts['pass'] : null)
            );

            $host       = new Host(isset($parts['host']) ? $parts['host'] : '');
            $port       = intval(isset($parts['port']) ? $parts['port'] : null);
            $path       = new Path(isset($parts['path']) ? $parts['path'] : '');

            if(!empty($parts['query'])) {
                $query  = Query::createFromString($parts['query']);
            }
            else {
                $query  = new Query(array());
            }


            $fragment   = (isset($parts['fragment']) ? $parts['fragment'] : '');

            return new self($scheme, $user, $host, $port, $path, $query, $fragment);

        }


        /**
         * Get the URI scheme
         * @return  string      Return the scheme value
        **/
        public function getScheme() {
            return $this->scheme;
        }


        /**
         * Define the URI scheme
         * @param   string      $scheme     New scheme value
        **/
        public function setScheme($scheme) {
            $this->scheme = $scheme;
        }


        /**
         * Get a new Uri object with the specified scheme
         * @param   string      $scheme     New scheme value
         * @return  Uri         Return a new Uri instance
        **/
        public function withScheme($scheme) {

            $uri = clone $this;
            $uri->setScheme($scheme);

            return $uri;

        }


        /**
         * Get the URI host
         * @return  string      Return the host value
        **/
        public function getHost() {
            return $this->host;
        }


        /**
         * Define the URI host
         * @param   mixed      $host     New host object or value
        **/
        public function setHost($host) {
            $this->host = ($host instanceof Host) ? $host : new Host($host);
        }


        /**
         * Get a new Uri object with the specified host
         * @param   mixed      $host     New host object or value
         * @return  Uri        Return a new Uri instance
        **/
        public function withHost($host) {

            $uri = clone $this;
            $uri->setHost($host);

            return $uri;

        }


        /**
         * Get the URI port
         * @return  integer      Return the port value
        **/
        public function getPort() {
            return $this->port;
        }


        /**
         * Define the URI port
         * @param   integer         New port value
        **/
        public function setPort($port) {
            $this->port = $port;
        }


        /**
         * Get a new Uri object with the specified host
         * @param   integer         New port value
        **/
        public function withPort($port) {

            $uri = clone $this;
            $uri->setPort($port);

            return $uri;

        }


        /**
         * Get the URI path
         * @return  string      Return the path instance
        **/
        public function getPath() {
            return $this->path;
        }


        /**
         * Define the URI path
         * @param   string      $path     New path value
        **/
        public function setPath($path) {
            $this->path = ($path instanceof Path ? $path : new Path($path));
        }


        /**
         * Get a new Uri object with the specified path
         * @param   integer         New path value
        **/
        public function withPath($path) {

            $uri = clone $this;
            $uri->setPath($path);

            return $uri;

        }


        /**
         * Get the URI query
         * @return  string      Return the port value
        **/
        public function getQuery() {
            return $this->query;
        }


        /**
         * Define the URI query
         * @param   string      $path     New path value
        **/
        public function setQuery($query) {
            $this->query = ($query instanceof Query ? $query : new Query($query));
        }


        /**
         * Get a new Uri object with the specified query
         * @param   integer         New query value
        **/
        public function withQuery($query) {

            $uri = clone $this;
            $uri->setQuery($query);

            return $uri;

        }


        /**
         * Get the URI fragment
         * @return  string      Return the fragment value
        **/
        public function getFragment() {
            return $this->fragment;
        }


        /**
         * Define the URI fragment
         * @param   integer         New fragment value
        **/
        public function setFragment($fragment) {
            $this->fragment = $fragment;
        }


        /**
         * Get a new Uri object with the specified fragment
         * @param   integer         New fragment value
        **/
        public function withFragment($fragment) {

            $uri = clone $this;
            $uri->setFragment($fragment);

            return $uri;

        }


        /**
         * Get a Uri property
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
         * Get the string formatted URI
         * @param   string      Full URI string as scheme://[user:pass@]host[:port]/path[?query]
        **/
        public function __toString() {

            $uri = '//';

            if(!empty($this->scheme)) {
                $uri = $this->scheme.':'.$uri;
            }

            if(!empty($user = (string) $this->user)) {
                $uri .= $user.'@';
            }

            $uri .= (string) $this->host;

            if(!empty($this->port)) {
                $uri .= ':'.$this->port;
            }

            $uri .= (!empty($path = (string) $this->path) ? $path : '/');

            if(!empty($query = (string) $this->query)) {
                $uri .= '?'.$query;
            }

            if(!empty($fragment = (string) $this->fragment)) {
                $uri .= '#'.$fragment;
            }

            return $uri;

        }


    }
