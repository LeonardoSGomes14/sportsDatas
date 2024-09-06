<?php
require_once 'MVC\Model\SportModel.php';

class SportsController
{
    private $sportModel;

    public function __construct($pdo)
    {
        $this->sportModel = new sportModel($pdo);
    }

    public function createSport($modality, $olimpic_year)
    {
        return $this->sportModel->createSport($modality, $olimpic_year);
    }

    public function listSports()
    {
        return $this->sportModel->listSports();
    }

    public function showSportsList()
    {
        $sports = $this->listSports();  // Obtém a lista de esportes
        include 'C:\xampp\htdocs\sportsDatas\MVC\View\Sport\view.php';  // Inclui a view, passando os esportes
    }

    public function updateSport($id_sport, $modality, $olimpic_year)
    {
        return $this->sportModel->updateSport($id_sport, $modality, $olimpic_year);
    }

    public function deleteSport($id_sport)
    {
        return $this->sportModel->deleteSport($id_sport);
    }
}
