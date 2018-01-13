<?php
class ProductManager {

    private $_db;

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }

    // Adds a product
    public function add(User $account) {
        $q = $this->_db->prepare('INSERT INTO products SET name = :name, color = :color, price = :price, stock = :stock, description = :description, category = :category, jsondata = :jsondata');

        $q->bindValue(':name',$account->name);
        $q->bindValue(':color',$account->color);
        $q->bindValue(':stock',$account->stock);
        $q->bindValue(':description',$account->description);
        $q->bindValue(':category',$account->category);
        $q->bindValue(':jsondata',$account->jsondata);

        $q->execute();

        return ($this->_db->lastInsertId());
    }

    // Deletes a product
    public function delete(Product $product) {
        $q = $this->_db->prepare('DELETE FROM products WHERE id = :id');
        $q->bindValue(':id',$product->id);
        $q->execute();
        return (true);
    }

	// Returns a Product object according to the id given as a parameter
    public function get($id) {
        if($id = filter_var($id,FILTER_VALIDATE_INT))
        {
            $q = $this->_db->prepare('SELECT * FROM products WHERE id = :id');
            $q->bindValue(':id',$id);
            $q->execute();
            $productData = $q->fetch(PDO::FETCH_ASSOC);
            $product = new Product;
            $product->hydrate($productData);
            return ($product);
        }
        return (false);
    }

    public function getByColor($color) {
		$idx = -1;
		$arr = [];

        $q = $this->_db->prepare('SELECT * FROM products WHERE color = :color');
        $q->bindValue(':color',$color);
        $q->execute();
        $products = $q->fetchAll(PDO::FETCH_ASSOC);
		while ($products[++$idx])
		{
      	  $product = new Product;
      	  $arr[] = $product->hydrate($products);
		}
        $product = new Product;
        $product->hydrate($products);
		return ($arr);
    }

    public function getByCategory($category) {
		$idx = -1;
		$arr = [];

        $q = $this->_db->prepare('SELECT * FROM products WHERE category = :category');
        $q->bindValue(':category',$category);
        $q->execute();
        $products = $q->fetchAll(PDO::FETCH_ASSOC);
		while ($products[++$idx])
		{
      	  $product = new Product;
      	  $arr[] = $product->hydrate($products);
		}
        return ($arr);
    }

	public function getByName($name) {
		$idx = -1;
		$arr = [];

        $q = $this->_db->prepare('SELECT * FROM products WHERE name = :name');
        $q->bindValue(':name',$name);
        $q->execute();
        $products = $q->fetchAll(PDO::FETCH_ASSOC);
		while ($products[++$idx])
		{
      	  $product = new Product;
      	  $arr[] = $product->hydrate($products);
		}
        return ($arr);
	}

    public function getAll() {
		$q = $this->_db->prepare('SELECT * FROM products');
		$q->execute();
		$data = $q->fetchAll(PDO::FETCH_ASSOC);
		$products = [];
		foreach ($data as $prd) {
			$prod = new Product;
			$products[] = $prod->hydrate($prd);
		}
		file_put_contents('/tmp/prod.data', json_encode($data));
        return ($products);
    }

	public function getFilters($s) {
		$idx = -1;
		$arr = explode(' ', $s);
		$tmp = [NULL, NULL. NULL];

		while ($arr[++$idx])
		{
			if (count(getByName($arr[$idx])->id))
				$tmp[0] .= 'SELECT * FROM products WHERE color name = :search';
			if (count(getByColor($arr[$idx])))
				$tmp[1] .= 'SELECT * FROM products WHERE color = :search';
			if (count(getByCategory($arr[$idx])))
				$tmp[2] .= 'SELECT * FROM products WHERE category = :search';
		}
		$idx = -1;
		while (++$idx < 3)
		{
			if ($tmp[$idx] !== NULL)
				$sq .= $sq ? ' UNION '.$tmp[$idx] : $tmp[$idx];
		}
		$q = $this->_db->prepare($sq);
		$q->execute();
		$products = $q->fetchAll(PDO::FETCH_ASSOC);
		$idx = -1;
		while ($products[++$idx])
		{
      	  $product = new Product;
      	  $ret[] = $product->hydrate($products);
		}
		return ($ret);
	}

	public function getSearch($s) {
		$idx = -1;
		$arr = explode(' ', $s);
		$tmp = [NULL, NULL. NULL];

		while ($arr[++$idx])
		{
			if (count(getByName($arr[$idx])->id))
				$tmp[0] .= 'name = :category, ';
			if (count(getByColor($arr[$idx])))
				$tmp[1] .= 'color = :search, ';
			if (count(getByCategory($arr[$idx])))
				$tmp[2] .= 'category = :search, ';
		}
		$idx = -1;
		while (++$idx < 3)
			if ($tmp[$idx] !== NULL)
				$sq .= $tmp[$idx];
		$sq = trim($sq, ',');
		$q = $this->_db->prepare($sq);
		$q->execute();
		$products = $q->fetchAll(PDO::FETCH_ASSOC);
		$idx = -1;
		while ($products[++$idx])
		{
      	  $product = new Product;
      	  $ret[] = $product->hydrate($products);
		}
		return ($ret);
	}

	private function validArg($s) {
		$ret = FALSE;

		$q->bindValue(':data',$s);
		if ($q = $this->_db->query('SELECT * FROM products WHERE * = :data'))
			$ret = TRUE;
		return ($ret);
	}

    public function update(Product $product) {
        $q = $this->_db->prepare('UPDATE product SET name = :name, color = :color, price = :price, stock = :stock, description = :description, category = :category, jsondata = :jsondata WHERE id = :id');

        $q->bindValue(':id',$product->id);
        $q->bindValue(':name',$product->name);
        $q->bindValue(':color',$product->color);
        $q->bindValue(':stock',$product->stock);
        $q->bindValue(':description',$product->description);
        $q->bindValue(':category',$product->category);
        $q->bindValue(':jsondata',$product->jsondata);

        $q->execute();
        return (true);
    }
}

?>
