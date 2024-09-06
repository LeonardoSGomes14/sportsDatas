<?php
require_once 'MVC\Model\LocaleModel.php';

class localeController
{
    private $localemodel;

    public function __construct($pdo)
    {
        $this->localemodel = new localeModel($pdo);
    }

    public function createLocale($rua, $bairro, $numero, $cep, $cidade, $estado, $pais)
    {
        $this->localemodel->createLocale($rua, $bairro, $numero, $cep, $cidade, $estado, $pais);
    }

    public function listLocales()
    {
        return $this->localemodel->listLocales();
    }

    public function showLocalesList()
    {
        $locales = $this->localemodel->listlocales();
        include 'C:\xampp\htdocs\SportData\sportsDatas\MVC\View\Local\view.php';
    }

    public function updateLocale($id_locale, $rua, $bairro, $numero, $cep, $cidade, $estado, $pais)
    {
        $this->localemodel->updateLocale($id_locale, $rua, $bairro, $numero, $cep, $cidade, $estado, $pais);
    }

    
    public function deleteLocale($id_locale)
    {
        $this->localemodel->deleteLocale($id_locale);
    }

}
