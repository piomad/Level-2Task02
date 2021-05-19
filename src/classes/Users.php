<?php


namespace Acme;


class Users extends Dbh
{

    function loginAsUser($login, $password)
    {
        $sql = "SELECT * FROM users WHERE username = :login AND password = :password";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":login", $login);
        $stmt->bindValue(":password", $password);
        $stmt->execute();
        $results = $stmt->fetch();
        return $results['id'];
    }

    function getUserData($userID)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $userID);
        $stmt->execute();
        return $stmt->fetch();
    }

    function getUsersList()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function deleteUser($userId)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $userId);
        $stmt->execute();
    }

    function updateUser($password, $firstName, $userId)
    {
        $sql = "UPDATE users SET password=:password, first_name=:firstName WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $userId);
        $stmt->bindValue(":password", $password);
        $stmt->bindValue(":firstName", $firstName);
        $stmt->execute();
    }

    function insertUser($username, $password, $firstName)
    {
        if ($this->checkIfUsernameIsAvailable($username)) {
            $sql = "INSERT INTO users (username, password, first_name) VALUES (:username, :password, :firstName)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(":username", $username);
            $stmt->bindValue(":password", $password);
            $stmt->bindValue(":firstName", $firstName);
            $stmt->execute();
            $_SESSION['success'] = "Successfully registered!";
        } else {
            $_SESSION['errors'] = "Username is already taken!";
        }
    }

    function checkIfUsernameIsAvailable($username): bool
    {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":username", $username);
        $stmt->execute();
        $results = $stmt->fetchAll();
        if (empty($results)) {
            return true;
        } else return false;
    }
}