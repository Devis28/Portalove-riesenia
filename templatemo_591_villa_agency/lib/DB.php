<?php

namespace PO\Lib;

class DB
{
    private $host = "localhost";
    private $port = 3306;
    private $username = "root";
    private $password = "";
    private $dbName = "project";

    private \PDO $connection;

    public function __construct(
        string $host = "",
        int $port = 3306,
        string $username = "",
        string $password = "",
        string $dbName = ""
    )
    {
        if (!empty($host)) {
            $this->host = $host;
        }

        if (!empty($port)) {
            $this->port = $port;
        }

        if (!empty($username)) {
            $this->username = $username;
        }

        if (!empty($password)) {
            $this->password = $password;
        }

        if (!empty($dbName)) {
            $this->dbName = $dbName;
        }

        try {
            $this->connection = new \PDO(
                "mysql:host=$this->host;dbname=$this->dbName;charset=utf8mb4",
                $this->username,
                $this->password
            );
            
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getMenuItems(): array
    {
        $sql = "SELECT nazov, url FROM menu";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        $finalMenu = [];

        foreach ($data as $menuItem) {
            $finalMenu[$menuItem['nazov']] = $menuItem['url'];
        }

        return $finalMenu;
    }

    public function getItems(): array
    {
        $sql = "SELECT id, category, filtercat, price, address, bedrooms, bathrooms, area, floor, parking, img, url FROM realestate";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $data;
    }

    public function deleteItem(int $id): bool
    {
        $sql = "DELETE FROM realestate WHERE id = ".$id;
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function editItem(int $id, string $category = "", string $filtercat = "", int $price, string $address = "", int $bedrooms, int $bathrooms, int $area, int $floor, int $parking, string $img = "", string $url = ""): bool
    {
        $sql = "UPDATE realestate SET";

        if (!empty($category)) {
            $sql .= " category = '" . $category . "'";
        }

        if (!empty($filtercat)) {
            $sql .= ", filtercat = '" . $filtercat . "'";
        }

        if (!empty($price)) {
            $sql .= ", price = '" . $price . "'";
        }

        if (!empty($address)) {
            $sql .= ", address = '" . $address . "'";
        }

        if (!empty($bedrooms)) {
            $sql .= ", bedrooms = '" . $bedrooms . "'";
        }

        if (!empty($bathrooms)) {
            $sql .= ", bathrooms = '" . $bathrooms . "'";
        }

        if (!empty($area)) {
            $sql .= ", area = '" . $area . "'";
        }

        if (!empty($floor)) {
            $sql .= ", floor = '" . $floor . "'";
        }

        if (!empty($parking)) {
            $sql .= ", parking = '" . $parking . "'";
        }

        if (!empty($img)) {
            $sql .= ", img = '" . $img . "'";
        }

        if (!empty($url)) {
            $sql .= ", url = '" . $url . "'";
        }

        $sql .= " WHERE id = " . $id;

        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }


    public function getItem(int $id): array
    {
        $sql = "SELECT * FROM realestate WHERE id = ".$id;
        $query = $this->connection->query($sql);
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return $data;
    }

    public function insertItem(string $category, string $filtercat, int $price, string $address, int $bedrooms, int $bathrooms, int $area, int $floor, int $parking, string $img, string $url): bool
    {
        $sql = "INSERT INTO realestate(category, filtercat, price, address, bedrooms, bathrooms, area, floor, parking, img, url) VALUE ('" . $category . "', '" . $filtercat . "', '" . $price . "', '" . $address . "', '" . $bedrooms . "', '" . $bathrooms . "', '" . $area . "', '" . $floor . "', '" . $parking . "', '" . $img . "', '" . $url . "')";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

}
