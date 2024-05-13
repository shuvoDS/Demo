<?php
class RiderModel {
    private $dbConnection;

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function getAllRiders() {
        $query = "SELECT * FROM rider";
        $result = $this->dbConnection->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteRider($id) {
        $query = "DELETE FROM rider WHERE rider_id = ?";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    public function getRiderById($id) {
        $query = "SELECT * FROM rider WHERE rider_id = ?";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateRider($id, $name) {
        $query = "UPDATE rider SET name = ? WHERE rider_id = ?";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bind_param("si", $name, $id);
        $stmt->execute();
    }
}
