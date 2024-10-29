<?php 

require_once '../app/models/Sponsor.php';

class SponsorController {
    protected $sponsorModel;

    public function __construct() {
        $this->sponsorModel = new Sponsor();
    }

    public function index() {
        // $users = $this->userModel->getAllUsers();
        require_once '../app/views/sponsor/index.php';
    }

    public function create() {
        require_once '../app/views/sponsor/create.php';
    }

    public function store() {
        $nama_event = $_POST['event_name'];
        $nama_sponsor = $_POST['sponsor_name'];
        $kontribusi_sponsor = $_POST['contribution'];
        $besaran_kontribusi = $_POST['contribution_amount'];
        $this->sponsorModel->addSponsor($nama_event, $nama_sponsor, $kontribusi_sponsor, $besaran_kontribusi);
        header('Location: /sponsor');
    }
}