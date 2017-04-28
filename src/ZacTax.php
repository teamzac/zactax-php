<?php

namespace TeamZac\ZacTax;

use GuzzleHttp\Client as GuzzleClient;

class ZacTax 
{
    /** @var GuzzleHttp\Client */
    protected $http;


    /** @var array */
    protected $options = [
        'baseUri' => 'https://my.zactax.com/api/',
        'apiToken' => null,
        'jurisdictionId' => null,
        'debug' => false,
    ];

    /** @var array */
    protected $resources = [
        'industries' => Industries::class,
        'jurisdictions' => Jurisdictions::class,
        'regions' => Regions::class,
        'taxpayers' => Taxpayers::class,
        'users' => Users::class,
    ];

    /** @var array */
    protected $resourceCache = [];

    /**
     * 
     * 
     * @param   
     * @return  
     */
    public function __construct($options = [])
    {
        $this->options = array_merge($this->options, $options);

        $this->http = new GuzzleClient([
            'base_uri' => $this->options['baseUri'],
            'timeout' => 10.0,
        ]);
    }

    /**
     * Set the API token
     * 
     * @param   string $token
     * @return  $this
     */
    public function setApiToken($token)
    {
        $this->options['apiToken'] = $token;

        return $this;
    }

    /**
     * Set the debug option
     * 
     * @param   boolean $flag
     * @return  $this
     */
    public function debug($flag = true)
    {
        $this->options['debug'] = $flag;

        return $this;
    }

    /**
     * Set the Jurisdiction ID
     * 
     * @param   string $jurisdictionId
     * @return  $this
     */
    public function setJurisdictionId($jurisdictionId)
    {
        $this->options['jurisdictionId'] = $jurisdictionId;

        return $this;
    }
    
    /**
     * Perform a GET request
     *
     * @param   
     * @return  
     */
    public function get($path, $params=[], $headers=[], $options = [])
    {
        $this->options = array_merge($this->options, $options);
        $headers = array_merge($headers, $this->defaultHeaders());
        $response = $this->http->get($path, [
            'query' => $params,
            'headers' => $headers,
            'debug' => $this->options['debug'],
        ]);

        return $this->parseResponse($response);
    }

    /**
     * 
     * 
     * @param   
     * @return  
     */
    protected function parseResponse($response)
    {
        $json = json_decode( (string) $response->getBody() );

        return isset($json->data) ? $json->data : $json;
    }

    /**
     * 
     *
     * @param   
     * @return  
     */
    protected function defaultHeaders()
    {
        return [
            'Authorization' => 'Bearer '. $this->apiToken,
            'X-Jurisdiction-ID' => $this->jurisdictionId,
        ];
    }

    /**
     * Hot-swap the get method to return either an option 
     * or instance of a ZacTax resource object
     * 
     * @param   string $key
     * @return  mixed
     */
    public function __get($key)
    {
        if ( array_key_exists($key, $this->options) ) {
            return $this->options[$key];
        }

        if ( array_key_exists($key, $this->resourceCache) ) {
            return $this->resourceCache[$key];
        }

        if ( array_key_exists($key, $this->resources) ) {
            $resource = new $this->resources[$key]($this);
            $this->resourceCache[$key] = $resource;
            return $resource;
        }
    }

    /**
     * 
     * 
     * @param   
     * @return  
     */
    public function __set($key, $value)
    {
        if ( array_key_exists($key, $this->options) ) {
            $this->options[$key] = $value;
        }
    }
}