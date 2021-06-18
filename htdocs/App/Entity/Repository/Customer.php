<?php

namespace App\Entity;

class Customer implements EntityInterface
{
    public function findAll()
    {
        $products = [];

        foreach ($this->getConnexion()->query('SELECT * from products') as $row) {
            $product = new \App\Entity\Customer($row['nom'], $row['prenom'], $row['adresse']);
            array_push($products, $product);
        }

        return $products;
    }

    /**
     * @param $id
     * @return EntityInterface
     */
    public function find($id)
    {
        $request = $this->getConnexion()->prepare("SELECT * FROM products WHERE id = :id");
        $request->bindParam(':id', $id);
        $request->execute();
        $result = $request->fetch();

        if ($result != null) {
            return new \App\Entity\Customer($result['nom'], $result['prenom'], $result['adresse']);
        }

        return null;
    }

    /**
     * @param $column
     * @param $value
     * @return EntityInterface[]
     */
    public function findBy($column, $value)
    {
        $sql = "SELECT * FROM products WHERE {$column} LIKE '{$value}'";
        $request = $this->getConnexion()->prepare($sql);
        $request->execute();
        $result = $request->fetch();

        if ($result != null) {
            return new \App\Entity\Customer($result['nom'], $result['prenom'], $result['adresse']);
        }

        return null;
    }
}