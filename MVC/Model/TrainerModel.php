<?php
class trainerModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createTrainer($name, $age, $height, $weight, $cpf, $rg)
    {
        $sql = "INSERT INTO trainers (name, age, height, weight, cpf, rg) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $age, $height, $weight, $cpf, $rg]);

        return $stmt->rowCount();
    }

    public function listTrainers()
    {
        $sql = "SELECT * FROM trainers";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateTrainer($id_trainer, $name, $age, $height, $weight, $cpf, $rg)
    {
        $sql = "UPDATE trainers SET name = ?, age = ?, height = ?, weight = ?, cpf = ?, rg = ? WHERE id_trainer = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $age, $height, $weight, $cpf, $rg, $id_trainer]);
    }

    public function deleteTrainer($id_trainer)
    {
        $sql = "DELETE FROM trainers WHERE id_trainer = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_trainer]);
    }
}
?>
