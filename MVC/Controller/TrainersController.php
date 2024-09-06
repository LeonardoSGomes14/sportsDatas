<?php
require_once 'C:\xampp\htdocs\sportsDatas\MVC\Model\TrainerModel.php';

class trainerController
{
    private $trainermodel;

    public function __construct($pdo)
    {
        $this->trainermodel = new trainerModel($pdo);
    }

    public function createTrainer($name, $age, $height, $weight, $cpf, $rg)
    {
        $this->trainermodel->createTrainer($name, $age, $height, $weight, $cpf, $rg);
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

    public function updateTrainer($id_trainer, $name, $age, $height, $weight, $cpf, $rg)
    {
        $this->trainermodel->updateTrainer($id_trainer, $name, $age, $height, $weight, $cpf, $rg);
    }

    public function deleteTrainer($id_trainer)
    {
        $this->trainermodel->deleteTrainer($id_trainer);
    }
}
?>
