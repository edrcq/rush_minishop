<?php
class OrderManager {

    private $_db;

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }

    // Ajouter une commande
    public function add(Order $order) {
        $q = $this->_db->prepare('INSERT INTO orders SET list = :list, nb = :nb, total = :total, status = :status, order_date = NOW(), jsondata = :jsondata');

        $q->bindValue(':list',$order->list);
        $q->bindValue(':total',$order->total);
        $q->bindValue(':nb',$order->nb);
        $q->bindValue(':status',$order->status);
        $q->bindValue(':jsondata',$order->jsondata);

        $q->execute();

        return ($this->_db->lastInsertId());
    }

    // Supprimer une commande
    public function delete(User $order) {
        $q = $this->_db->prepare('DELETE FROM orders WHERE id = :id');
        $q->bindValue(':id',$order->id);
        $q->execute();
        return (true);
    }

    // Renvois un objet Order selon l'id
    public function get($id) {
        if($id = filter_var($id,FILTER_VALIDATE_INT))
        {
            $q = $this->_db->prepare('SELECT * FROM orders WHERE id = :id');
            $q->bindValue(':id',$id);
            $q->execute();
            $orderData = $q->fetch(PDO::FETCH_ASSOC);
            $order = new Order;
            if ($orderData === false) {
                return (false);
            }
            $order->hydrate($orderData);
            return ($order);
        }
        return (false);
    }

    public function getAll() {
        $q = $this->_db->query('SELECT * FROM orders');
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return ($data);
    }

    // 
    public function getCount() {
        $q = $this->_db->query('SELECT count(id) FROM orders');
        return $q->fetch()[0];
    }

    public function update(User $order) {
        $q = $this->_db->prepare('UPDATE orders SET list = :list, nb = :nb, total = :total, status = :status, jsondata = :jsondata WHERE id = :id');

        $q->bindValue(':id',$order->id);
        $q->bindValue(':list',$order->list);
        $q->bindValue(':total',$order->total);
        $q->bindValue(':nb',$order->nb);
        $q->bindValue(':status',$order->status);
        $q->bindValue(':jsondata',$order->jsondata);

        $q->execute();
        return (true);
    }
}

?>