<?php
    function newUser() {
        return [
            'email' => '',
            'password' => '',
            'role' => 1,
            'jsondata' => ''
        ];
    }
    // Ajouter un utilisateur
    function UserManagerAdd($account) {
        global $mysqli;

        $stmt = mysqli_prepare($mysqli, 'INSERT INTO accounts SET password = ?, email = ?, role = ?, registration_date = NOW(), jsondata = ?');

        $bindBool = mysqli_stmt_bind_param($stmt, 'ssss', $account['password'], $account['email'], $account['role'], $account['jsondata']);
        mysqli_stmt_execute($stmt);

        return (mysqli_insert_id($mysqli));
    }

    // Supprimer un utilisateur
    function UserManagerDelete($id) {
        global $mysqli;

        $stmt = mysqli_prepare($mysqli, 'DELETE FROM accounts WHERE id = ?');
        
        $bindBool = mysqli_stmt_bind_param($stmt, 'd', $id);
        mysqli_stmt_execute($stmt);

        return (true);
    }

    // Renvois un objet User selon l'id
    function UserManagerGet($id) {
        if($id = filter_var($id, FILTER_VALIDATE_INT))
        {
            global $mysqli;
            
            $stmt = mysqli_prepare($mysqli, 'SELECT * FROM accounts WHERE id = ?');
    
            $bindBool = mysqli_stmt_bind_param($stmt, 'd', $id);

            mysqli_stmt_execute($stmt);

            $user = [];

            mysqli_stmt_bind_result($stmt, $user['id'], $user['email'], $user['password'], $user['role'], $user['registration_date'], $user['jsondata']);
    
            while (mysqli_stmt_fetch($stmt)) {
                continue ;
            }

            return ($user);
        }
        return (false);
    }

    // Renvois un objet User selon l'email
    function UserManagerGetByEmail($email) {
        global $mysqli;

        $stmt = mysqli_prepare($mysqli, 'SELECT * FROM accounts WHERE email = ?');
        
        $bindBool = mysqli_stmt_bind_param($stmt, 's', $email);

        mysqli_stmt_execute($stmt);
        
        $user = [];

        mysqli_stmt_bind_result($stmt, $user['id'], $user['email'], $user['password'], $user['role'], $user['registration_date'], $user['jsondata']);

        while (mysqli_stmt_fetch($stmt)) {
            continue ;
        }

        return ($user);
    }

    function UserManagerGetAll() {
        global $mysqli;
        
        $stmt = mysqli_prepare($mysqli, 'SELECT * FROM accounts');
        
        $bindBool = mysqli_stmt_bind_param($stmt, 's', $email);

        mysqli_stmt_execute($stmt);
        
        $users = [];
        $user = [];

        mysqli_stmt_bind_result($stmt, $user['id'], $user['email'], $user['password'], $user['role'], $user['registration_date'], $user['jsondata']);

        while (mysqli_stmt_fetch($stmt)) {
            $users[] = $user;
        }

        return ($users);
    }

    // 
    function UserManagerGetCount() {
        return (count(UserManagerGetAll()));
    }

    function UserManagerUpdate($account) {
        global $mysqli;

        $stmt = mysqli_prepare($mysqli, 'UPDATE accounts SET password = ?, email = ?, role = ?, jsondata = ? WHERE id = ?');

        $bindBool = mysqli_stmt_bind_param($stmt, 'ssssd', $account['password'], $account['email'], $account['role'], $account['jsondata'], $account['id']);
        mysqli_stmt_execute($stmt);

        return (mysqli_affected_rows($mysqli));
    }


?>