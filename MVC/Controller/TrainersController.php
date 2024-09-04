<?php
require_once 'C:\xampp\htdocs\SportData\sportsDatas\MVC\Model\TrainersModel.php';

class trainerController
{
    private $trainermodel;

    public function __construct($pdo)
    {
        $this->trainermodel = new trainerModel($pdo);
    }

    public function createTrainer($name)
    {
        $this->trainermodel->createTrainer($name);
    }

    public function listTrainers()
    {
        return $this->trainermodel->listTrainers();
    }

    public function showTrainersList()
    {
        $trainers = $this->trainermodel->listTrainers();
        include 'C:\xampp\htdocs\SportData\sportsDatas\MVC\View\Trainer\view.php';
    }

    public function updateTrainer($id_trainer, $name)
    {
        $this->trainermodel->updateTrainer($id_trainer, $name);
    }

    
    public function deleteTrainer($id_trainer)
    {
        $this->trainermodel->deleteTrainer($id_trainer);
    }

}
