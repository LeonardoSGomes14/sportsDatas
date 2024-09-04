<?php
require_once 'C:\xampp\htdocs\SportData\sportsDatas\MVC\Model\CompetitorsModel.php';

class competitorController
{
    private $competitormodel;

    public function __construct($pdo)
    {
        $this->competitormodel = new competitorModel($pdo);
    }

    public function createCompetitor($name)
    {
        $this->competitormodel->createCompetitor($name);
    }

    public function listCompetitors()
    {
        return $this->competitormodel->listCompetitors();
    }

    public function showcompetitorsList()
    {
        $competitors = $this->competitormodel->listcompetitors();
        include 'C:\xampp\htdocs\SportData\sportsDatas\MVC\View\Competitors\view.php';
    }

    public function updatecompetitor($id_competitor, $name)
    {
        $this->competitormodel->updatecompetitor($id_competitor, $name);
    }

    
    public function deletecompetitor($id_competitor)
    {
        $this->competitormodel->deletecompetitor($id_competitor);
    }

}
