<?php
require_once '../config/database.php';

class Sponsor {
    protected $db;

    public function __construct() {
        try {
            $database = new Database();
            $this->db = $database->connect();
            
            if ($this->db === null) {
                throw new Exception("Database connection failed");
            }
        } catch (Exception $e) {
            error_log("Sponsor class initialization error: " . $e->getMessage());
            throw $e;
        }
    }

    public function getAllSponsors() {
        try {
            $query = $this->db->query("SELECT * FROM sponsor");
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getting sponsors: " . $e->getMessage());
            throw $e;
        }
    }

    public function addSponsor($nama_event, $nama_sponsor, $kontribusi_sponsor, $besaran_kontribusi) {
        try {
            $query = $this->db->prepare("INSERT INTO sponsor (nama_event, nama_sponsor, kontribusi_sponsor, besaran_kontribusi) VALUES (:nama_event, :nama_sponsor, :kontribusi_sponsor, :besaran_kontribusi)");
            $query->bindParam(':nama_event', $nama_event);
            $query->bindParam(':nama_sponsor', $nama_sponsor);
            $query->bindParam(':kontribusi_sponsor', $kontribusi_sponsor);
            $query->bindParam(':besaran_kontribusi', $besaran_kontribusi);
            return $query->execute();
        } catch (PDOException $e) {
            error_log("Error adding sponsor: " . $e->getMessage());
            throw $e;
        }
    }
}