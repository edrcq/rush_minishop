<?php

class User {
    
    private $data = array(
        "id" => "",
        "email" => "",
        "password" => "",
        "role" => "",
        "registration_date" => "",
        "jsondata" => ""
    );
    
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
    
    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
    }
    
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
    
    public function hydrate(array $datas) {
		foreach ($datas as $key => $value)
		{
			if (isset($this->$key))
			{
				$this->$key = $value;
			}
        }
    }

    public function setData($data) {
        $this->data['data'] = json_encode($data);
    }

    public function getData($data) {
        return json_decode($this->data['data']);
    }

    public function debug() {
        return $this->data;
    }
    
    public function UserRole() {
        if($this->type == 0) return "Banni";
        if($this->type == 1) return "Utilisateur";
        if($this->type == 10) return "Premium";
        if($this->type == 100) return "Administrateur";
    }
}

?>