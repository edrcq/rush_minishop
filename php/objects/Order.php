<?php

class Order {
    
    private $data = array(
        "id" => "",
        "list" => "",
        "total" => "",
        "nb" => "",
        "status" => "",
        "order_date" => "",
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
        $this->data['jsondata'] = json_encode($data);
    }

    public function getData($data) {
        return json_decode($this->data['jsondata']);
    }

    public function setList($data) {
        $this->data['list'] = json_encode($data);
    }

    public function getList($data) {
        return json_decode($this->data['list']);
    }
}

?>