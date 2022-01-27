<?php

class Demo_Ship extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getShips()
    {
        return $this->customerdb->get('ship')->result();
    }

    public function saveShip($data)
    {
        $this->customerdb->insert('ship', $data);
    }
    
    public function deleteShip($id) 
    {
        $this->customerdb->delete('ship', array('name' => $id));
    }
    
}