<?php


namespace Acme;


use Acme\Dbh;

class Admins extends Dbh
{
    function loginAsAdmin($login, $password)
    {
        $sql = "SELECT * FROM admins WHERE username = :login AND password = :password";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":login", $login);
        $stmt->bindValue(":password", $password);
        $stmt->execute();
        $results = $stmt->fetch();
        return $results['id'];
    }

    function getAdminList()
    {
        $sql = "SELECT * FROM admins";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getAdminData($adminId)
    {
        $sql = "SELECT * FROM admins WHERE id=:adminId";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':adminId', $adminId);
        $stmt->execute();
        return $stmt->fetch();
    }
}