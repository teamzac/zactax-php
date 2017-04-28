<?php

namespace TeamZac\ZacTax;

class ApiResource
{
    /** @var ZacTax */
    protected $client;

    /**
     * Construct the API resource
     */
    public function __construct(ZacTax $client)
    {
        $this->client = $client;
    }

    /**
     * Take the request information, pass it to the client, and return
     * a specific collection or object based on the resource type
     * 
     * @param   
     * @return  
     */
    public function get($path, $params=[], $headers=[], $options = [])
    {
        $response = $this->client->get($path, $params, $headers, $options);

        // TODO: convert the response into either a resource collection or resource object?

        return $response;
    }
}