<?php
class CompetitorModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createCompetitor($name, $age, $height, $weight, $gender, $cpf, $rg, $team)
    {
        $sql = "INSERT INTO competitors (name, age, height, weight, gender, cpf, rg, team) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $age, $height, $weight, $gender, $cpf, $rg, $team]);
        return $stmt->rowCount();
    }

    public function listCompetitors()
    {
        $sql = "SELECT * FROM competitors";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateCompetitor($id_competitor, $name, $age, $height, $weight, $gender, $cpf, $rg, $team)
    {
        $sql = "UPDATE competitors SET name = ?, age = ?, height = ?, weight = ?, gender = ?, cpf = ?, rg = ?, team = ? WHERE id_competitor = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $age, $height, $weight, $gender, $cpf, $rg, $team, $id_competitor]);
    }

    public function deleteCompetitor($id_competitor)
    {
        $sql = "DELETE FROM competitors WHERE id_competitor = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_competitor]);
    }
}
