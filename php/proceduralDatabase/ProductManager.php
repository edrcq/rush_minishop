<?php
    function ProductManagerAdd($p) {
		global $mysqli;

		$stmt = mysqli_prepare($mysqli, 'INSERT INTO products SET name = ?, color = ?, price = ?, img = ?, stock = ?, description = ?, category = ?, jsondata = ?');
		mysqli_stmt_bind_param($stmt, 'ssssss', $p['name'], $p['color'], $p['price'], $p['img'], $p['stock'], $p['description'], $p['category'], $p['jsondata']);
		mysqli_execute($stmt);
        return (mysqli_insert_id($mysqli));
    }

    function ProductManagerDelete($product) {
		global $mysqli;

		$stmt = mysqli_prepare($mysqli, 'DELETE FROM products WHERE id = ?');
		mysqli_stmt_bind_param($stmt, 's', $p['id']);
		mysqli_execute($stmt);
        return (mysqli_affected_rows($mysqli));
    }

    function ProductManagerGet($id) {
		global $mysqli;

        if($id = filter_var($id,FILTER_VALIDATE_INT))
        {
			$stmt = mysqli_prepare($mysqli, 'SELECT * FROM products WHERE id = ?');
			mysqli_stmt_bind_param($stmt, 's', $id['id']);
			mysqli_execute($stmt);
			mysqli_stmt_bind_result($stmt, $p['id'], $p['name'], $p['category'], $p['color'], $p['description'], $p['stock'], $p['jsondata'], $p['img'], $p['price']);
			while (mysqli_stmt_fetch($stmt))
			{
			}
            return ($p);
        }
        return (false);
    }

    function ProductManagerGetByColor($col) {
		global $mysqli;

		$stmt = mysqli_prepare($mysqli, 'SELECT * FROM products WHERE color = ?');
		mysqli_stmt_bind_param($stmt, 's', $col);
		mysqli_execute($stmt);
		mysqli_stmt_bind_result($stmt, $id, $name, $cat, $col, $desc, $st, $jd, $img, $pr);
		while (mysqli_stmt_fetch($stmt))
			$p[] = ['id' => $id, 'name' => $name, 'category' => $cat, 'color' => $col, 'description' => $desc, 'stock' => $st, 'jsondata' => $jd, 'img' => $img, 'price' => $pr];
		return ($p);
    }

    function ProductManagerGetByCategory($cat) {
		global $mysqli;

		$stmt = mysqli_prepare($mysqli, 'SELECT * FROM products WHERE category = ?');
		mysqli_stmt_bind_param($stmt, 's', $cat);
		mysqli_execute($stmt);
		mysqli_stmt_bind_result($stmt, $id, $name, $cat, $col, $desc, $st, $jd, $img, $pr);
		while (mysqli_stmt_fetch($stmt))
			$p[] = ['id' => $id, 'name' => $name, 'category' => $cat, 'color' => $col, 'description' => $desc, 'stock' => $st, 'jsondata' => $jd, 'img' => $img, 'price' => $pr];
        return ($p);
    }

	function ProductManagerGetByName($name) {
		global $mysqli;

		$stmt = mysqli_prepare($mysqli, 'SELECT * FROM products WHERE name = ?');
		mysqli_stmt_bind_param($stmt, 's', $name['name']);
		mysqli_execute($stmt);
		mysqli_stmt_bind_result($stmt, $id, $name, $cat, $col, $desc, $st, $jd, $img, $pr);
		while (mysqli_stmt_fetch($stmt))
			$p[] = ['id' => $id, 'name' => $name, 'category' => $cat, 'color' => $col, 'description' => $desc, 'stock' => $st, 'jsondata' => $jd, 'img' => $img, 'price' => $pr];
        return ($p);
	}

    function ProductManagerGetAll() {
		global $mysqli;

		$stmt = mysqli_prepare($mysqli, 'SELECT * FROM products');
		mysqli_execute($stmt);
		mysqli_stmt_bind_result($stmt, $id, $name, $cat, $col, $desc, $st, $jd, $img, $pr);
		while (mysqli_stmt_fetch($stmt))
			$p[] = ['id' => $id, 'name' => $name, 'category' => $cat, 'color' => $col, 'description' => $desc, 'stock' => $st, 'jsondata' => $jd, 'img' => $img, 'price' => $pr];
        return ($p);
    }

	function ProductManagerGetFilters($s) {
		global $mysqli;
		$idx = -1;
		$arr = explode(' ', $s);
		$tmp = [NULL, NULL. NULL];

		while ($arr[++$idx])
		{
			if (count(getByName($arr[$idx])->id))
				$tmp[0] .= 'SELECT * FROM products WHERE color name = ?';
			if (count(getByColor($arr[$idx])))
				$tmp[1] .= 'SELECT * FROM products WHERE color = ?';
			if (count(getByCategory($arr[$idx])))
				$tmp[2] .= 'SELECT * FROM products WHERE category = ?';
		}
		$idx = -1;
		while (++$idx < 3)
		{
			if ($tmp[$idx] !== NULL)
				$sq .= $sq ? ' UNION '.$tmp[$idx] : $tmp[$idx];
		}
		$stmt = mysqli_prepare($mysqli, $sq);
		mysqli_stmt_bind_param($stmt, 'sss', $name['name'], $col['color'], $cat['category']);
		mysqli_execute($stmt);
		mysqli_stmt_bind_result($stmt, $id, $name, $cat, $col, $desc, $st, $jd, $img, $pr);
		while (mysqli_stmt_fetch($stmt))
			$p[] = ['id' => $id, 'name' => $name, 'category' => $cat, 'color' => $col, 'description' => $desc, 'stock' => $st, 'jsondata' => $jd, 'img' => $img, 'price' => $pr];
        return ($p);
	}

	function ProductManagerGetSearch($s) {
		global $mysqli;
		$idx = -1;
		$arr = explode(' ', $s);
		$tmp = [NULL, NULL. NULL];

		while ($arr[++$idx])
		{
			if (count(getByName($arr[$idx])->id))
				$tmp[0] .= 'name = ?, ';
			if (count(getByColor($arr[$idx])))
				$tmp[1] .= 'color = ?, ';
			if (count(getByCategory($arr[$idx])))
				$tmp[2] .= 'category = ?, ';
		}
		$idx = -1;
		while (++$idx < 3)
		{
			if ($tmp[$idx] !== NULL)
				$sq .= $sq ? ' UNION '.$tmp[$idx] : $tmp[$idx];
		}
		$sq = trim($sq, ',');
		$stmt = mysqli_prepare($mysqli, $sq);
		mysqli_stmt_bind_param($stmt, 'sss', $name['name'], $col['color'], $cat['category']);
		mysqli_execute($stmt);
		mysqli_stmt_bind_result($stmt, $id, $name, $cat, $col, $desc, $st, $jd, $img, $pr);
		while (mysqli_stmt_fetch($stmt))
			$p[] = ['id' => $id, 'name' => $name, 'category' => $cat, 'color' => $col, 'description' => $desc, 'stock' => $st, 'jsondata' => $jd, 'img' => $img, 'price' => $pr];
        return ($p);
	}

	function ProductManagerValidArg($s) {
		global $mysqli;
		$ret = FALSE;

		$stmt = mysqli_prepare($mysqli, 'SELECT * FROM products WHERE * = ?');
		mysqli_stmt_bind_param($stmt, 's', $s);
		mysqli_execute($stmt);
		mysqli_stmt_bind_result($stmt, $jd);
		if (mysqli_stmt_fetch($stmt))
			$ret = TRUE;
		return ($ret);
	}

    function ProductManagerUpdate($p) {
		global $mysqli;

		$stmt = mysqli_prepare($mysqli, 'UPDATE product SET name = ?, category = ?, color = ?, description = ?, stock = ?, jsondata = ?, img = ?, price = ? WHERE id = ?');
		mysqli_stmt_bind_param($stmt, 'ssssssss', $p['name'], $p['category'], $p['color'], $p['description'], $p['stock'], $p['jsondata'], $p['img'], $p['price'], $p['id']);
		mysqli_execute($stmt);
        return (mysqli_affected_rows($mysqli));
    }
?>
