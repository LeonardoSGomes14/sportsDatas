<?php
class LocaleModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createLocale($street, $neighborhood, $number, $cep, $city, $state, $country)
    {
        $sql = "INSERT INTO locales (street, neighborhood, number, cep, city, state, country) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$street, $neighborhood, $number, $cep, $city, $state, $country]);

        return $stmt->rowCount();
    }

    public function listLocales()
    {
        $sql = "SELECT * FROM locales";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateLocale(
        $id_locale,
        $street,
        $neighborhood,
        $number,
        $cep,
        $city,
        $state,
        $country
    ) {
        // Remover o parêntese extra
        $sql = "UPDATE locales SET street = ?, neighborhood = ?, number = ?, cep = ?, city = ?, state = ?, country = ? WHERE id_locale = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$street, $neighborhood, $number, $cep, $city, $state, $country, $id_locale]);
    }

    public function deleteLocale($id_locale)
    {
        $sql = "DELETE FROM locales WHERE id_locale = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_locale]);
    }
}
