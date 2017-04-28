<?php

namespace TeamZac\ZacTax;

class Jurisdictions extends ApiResource
{
    /**
     * Fetch all industries
     * 
     * @param   array $options
     * @return  
     */
    public function all($params = [], $options = [])
    {
        return $this->client->get('jurisdictions', $params, [], $options);
    }

    /**
     * Fetch a single jurisdiction
     * 
     * @param   
     * @return  
     */
    public function find($jurisdictionId, $options = [])
    {
        return $this->client->get(
            sprintf('jurisdictions/%s', $jurisdictionId), 
            [], 
            [], 
            $options
        );
    }
}