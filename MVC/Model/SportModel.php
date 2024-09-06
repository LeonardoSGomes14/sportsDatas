<?php
class sportModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createSport($modality, $olimpic_year)
    {
        $sql = "INSERT INTO sports (modality, olimpic_year) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$modality, $olimpic_year]);

        return $stmt->rowCount(); // Retorna o número de linhas afetadas
    }

    public function listSports()
    {
        $sql = "SELECT * FROM sports";    
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateSport($id_sport, $modality, $olimpic_year)
    {
        $sql = "UPDATE sports SET modality = ?, olimpic_year = ? WHERE id_sport = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$modality, $olimpic_year, $id_sport]);

        return $stmt->rowCount();
    }

    public function deleteSport($id_sport)
    {
        $sql = "DELETE FROM sports WHERE id_sport = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_sport]);

        return $stmt->rowCount();
    }
}
