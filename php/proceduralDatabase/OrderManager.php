<?php

    // Ajouter une commande
    function OrderManagerAdd($order) {
        global $mysqli;
        
        $stmt = mysqli_prepare($mysqli, 'INSERT INTO orders SET list = ?, total = ?, nb = ?, order_date = NOW(), jsondata = ?, status = ?');

        $bindBool = mysqli_stmt_bind_param($stmt, 'sdiss', $order['list'], $order['total'], $order['nb'], $order['jsondata'], $order['status']);
        mysqli_stmt_execute($stmt);

        return (mysqli_stmt_insert_id($stmt));
    }

    // Supprimer une commande
    function OrderManagerDelete($order) {
        global $mysqli;
        
        $stmt = mysqli_prepare($mysqli, 'DELETE FROM orders WHERE id = ?');
        
        $bindBool = mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);

        return (true);
    }

    // Renvois un objet Order selon l'id
    function OrderManagerGet($id) {
        if($id = filter_var($id, FILTER_VALIDATE_INT))
        {
            global $mysqli;
            
            $stmt = mysqli_prepare($mysqli, 'SELECT * FROM orders WHERE id = ?');
    
            $bindBool = mysqli_stmt_bind_param($stmt, 'i', $id);

            mysqli_stmt_execute($stmt);

            $order = [];

            mysqli_stmt_bind_result($stmt, $order['id'], $order['list'], $order['total'], $order['nb'], $order['order_date'], $order['jsondata'], $order['status']);
    
            while (mysqli_stmt_fetch($stmt)) {
                continue ;
            }

            return ($order);
        }
        return (false);
    }

    function OrderManagerGetAll() {
        global $mysqli;
        
        $stmt = mysqli_prepare($mysqli, 'SELECT * FROM orders');
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $list, $total, $nb, $ordate, $jd, $stt);
        while (mysqli_stmt_fetch($stmt)) {
			$u[] = ['id' => $id, 'list' => $list, 'total' => $total, 'nb' => $nb, 'order_date' => $ordate, 'jsondata' => $jd, 'status' => $stt];
        }
        return ($u);
    }

    function OrderManagerUpdate($order) {
        global $mysqli;
        
        $stmt = mysqli_prepare($mysqli, 'UPDATE orders SET list = ?, total = ?, nb = ?, jsondata = ?, status = ? WHERE id = ?');

        $bindBool = mysqli_stmt_bind_param($stmt, 'sssssi', $order['passlistword'], $order['total'], $order['nb'], $order['jsondata'], $order['status'] ,$order['id']);
        mysqli_stmt_execute($stmt);

        return (mysqli_affected_rows($mysqli));
    }


?>