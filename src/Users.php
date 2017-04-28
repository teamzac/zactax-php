<?php

namespace TeamZac\ZacTax;

class Users extends ApiResource
{
    /**
     * Get the authenticated user
     * 
     * @return  
     */
    public function me()
    {
        return $this->client->get('user');
    }

    /**
     * Get the jurisdictions for the authenticated user
     * 
     * @return  
     */
    public function myJurisdictions()
    {
        return $this->client->get('user/jurisdictions');
    }

    /**
     * Find a specific user
     * 
     * @return  
     */
    public function find($id)
    {
        return $this->client->get( sprintf('users/%s', $id) );
    }
}