<?php

namespace TeamZac\ZacTax;

class Regions extends ApiResource
{
    /**
     * Get all available regions
     * 
     * @return  
     */
    public function all()
    {
        return $this->client->get('regions');
    }

    /**
     * Find a specific region
     * 
     * @param   string $id
     * @return  
     */
    public function find($id)
    {
        return $this->client->get( sprintf('regions/%s', $id) );
    }

    /**
     * Find payments for a given region
     * 
     * @param   string $id
     * @return  
     */
    public function payments($id, $params = [], $options = [])
    {
        return $this->client->get( sprintf('regions/%s/payments', $id), $params, [], $options );
    }

    /**
     * Get the outlets in a given region
     * 
     * @param   string $id
     * @return  
     */
    public function outlets($id, $params = [], $options = [])
    {
        return $this->client->get( sprintf('regions/%s/outlets', $id), $params, [], $options );
    }
}