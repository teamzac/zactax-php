<?php

namespace TeamZac\ZacTax;

class Industries extends ApiResource
{
    /**
     * Fetch all industries
     * 
     * @param   array $options
     * @return  
     */
    public function all($params = [], $options = [])
    {
        return $this->client->get('industries', $params, [], $options );
    }

    /**
     * Find a specific user
     * 
     * @return  
     */
    public function find($id, $options = [])
    {
        return $this->client->get( sprintf('industries/%s', $id), [], [], $options );
    }

    /**
     * Find payments for a given industry
     * 
     * @param   int $id
     * @return  
     */
    public function payments($id, $params = [], $options = [])
    {
        return $this->client->get( sprintf('industries/%s/payments', $id), $params, [], $options );
    }

    /**
     * 
     * 
     * @param   
     * @return  
     */
    public function topTaxpayers($id, $options = [])
    {
        return $this->client->get( sprintf('industries/%s/taxpayers/top', $id), $options );
    }
}