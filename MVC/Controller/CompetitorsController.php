<?php
require_once 'MVC\Model\CompetitorModel.php';

class CompetitorController
{
    private $competitormodel;

    public function __construct($pdo)
    {
        $this->competitormodel = new CompetitorModel($pdo);
    }

    public function createCompetitor($name, $age, $height, $weight, $gender, $cpf, $rg, $team)
    {
        $this->competitormodel->createCompetitor($name, $age, $height, $weight, $gender, $cpf, $rg, $team);
    }

    public function listCompetitors()
    {
        return $this->competitormodel->listCompetitors();
    }

    public function showCompetitorsList()
    {
        $competitors = $this->listCompetitors();
        include 'C:\xampp\htdocs\sportsDatas\View\Competitors\view.php'; // Inclua a view
    }

    public function updateCompetitor($id_competitor, $name, $age, $height, $weight, $gender, $cpf, $rg, $team)
    {
        $this->competitormodel->updateCompetitor($id_competitor, $name, $age, $height, $weight, $gender, $cpf, $rg, $team);
    }

    public function deleteCompetitor($id_competitor)
    {
        $this->competitormodel->deleteCompetitor($id_competitor);
    }
}
