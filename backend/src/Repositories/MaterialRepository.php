<?php

namespace Repositories;

use PDO;

class MaterialRepository extends Repository {

    public function addMaterial($material) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO materials (name, description, city, quantity, stock) VALUES (:name, :description, :city, :quantity, :stock)");
            $stmt->bindParam(':name', $material->name);
            $stmt->bindParam(':description', $material->description);
            $stmt->bindParam(':city', $material->city);
            $stmt->bindParam(':quantity', $material->quantity);
            $stmt->bindParam(':stock', $material->stock);
            $stmt->execute();
            return $this->getMaterialById($this->connection->lastInsertId());
        } catch (\PDOException $e) {
            return null;
        }
    }

    public function editMaterial($material) {
        try {
            $stmt = $this->connection->prepare("UPDATE materials SET name = :name, description = :description, city = :city, quantity = :quantity, stock = :stock WHERE id = :id");
            $stmt->bindParam(':id', $material->id);
            $stmt->bindParam(':name', $material->name);
            $stmt->bindParam(':description', $material->description);
            $stmt->bindParam(':city', $material->city);
            $stmt->bindParam(':quantity', $material->quantity);
            $stmt->bindParam(':stock', $material->stock);
            return $stmt->execute();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function deleteMaterial($id) {
        try {
            $stmt = $this->connection->prepare("DELETE FROM materials WHERE id = :id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getMaterialById($id) {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM materials WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            return null;
        }
    }

    public function getMaterialByCity($city) {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM materials WHERE city = :city");
            $stmt->bindParam(':city', $city);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function getAllMaterials() {
        try {
            $stmt = $this->connection->query("SELECT * FROM materials");
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function getHighestStockMaterial() {
        try {
            $stmt = $this->connection->query("SELECT * FROM materials ORDER BY stock DESC LIMIT 1");
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            return null;
        }
    }

    public function getAllQuantities() {
        try {
            $stmt = $this->connection->query("SELECT id, quantity FROM materials");
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            return [];
        }
    }
}