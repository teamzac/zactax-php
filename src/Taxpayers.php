<?php

namespace TeamZac\ZacTax;

class Taxpayers extends ApiResource
{
    /**
     * Fetch all taxpayers
     * 
     * @param   array $options
     * @return  
     */
    public function all($params = [], $options = [])
    {
        return $this->client->get( 'taxpayers', $params, [], $options );
    }

    /**
     * Find a specific user
     * 
     * @return  
     */
    public function find($id, $options = [])
    {
        return $this->client->get( sprintf('taxpayers/%s', $id), [], [], $options );
    }

    /**
     * Find payments for a given taxpayer
     * 
     * @param   int $id
     * @return  
     */
    public function payments($id, $params = [], $options = [])
    {
        return $this->client->get( sprintf('taxpayers/%s/payments', $id), $params, [], $options );
    }

    /**
     * 
     * 
     * @param   
     * @return  
     */
    public function search($q, $params = [], $options = [])
    {
        $params = array_merge(['q' => $q], $params);
        return $this->client->get( 'taxpayers/search', $params, [], $options);
    }
}