<?php
require_once 'C:\xampp\htdocs\SportData\sportsDatas\MVC\Model\SportsModel.php';

class SportsController
{
    private $sportmodel;

    public function __construct($pdo)
    {
        $this->sportmodel = new sportModel($pdo);
    }

    public function createSport($name)
    {
        $this->sportmodel->createSport($name);
    }

    public function listSports()
    {
        return $this->sportmodel->listSports();
    }

    public function showSportsList()
    {
        $sports = $this->sportmodel->listSports();
        include 'C:\xampp\htdocs\SportData\sportsDatas\MVC\View\Sport\view.php';
    }

    public function updateSport($id_sport, $name)
    {
        $this->sportmodel->updateSport($id_sport, $name);
    }

    
    public function deleteSport($id_sport)
    {
        $this->sportmodel->deleteSport($id_sport);
    }

}
