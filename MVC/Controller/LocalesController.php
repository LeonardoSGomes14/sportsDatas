<?php
require_once 'C:\xampp\htdocs\SportData\sportsDatas\MVC\Model\LocaleModel.php';

class localeController
{
    private $localemodel;

    public function __construct($pdo)
    {
        $this->localemodel = new localeModel($pdo);
    }

    public function createLocale($name)
    {
        $this->localemodel->createLocale($name);
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

    public function updateLocale($id_locale, $name)
    {
        $this->localemodel->updateLocale($id_locale, $name);
    }

    
    public function deleteLocale($id_locale)
    {
        $this->localemodel->deleteLocale($id_locale);
    }

}
