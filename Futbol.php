<?php 


//Si se trata de un partido de fútbol, se deben gestionar el valor de 3 coeficientes que serán aplicados según la 
//categoría del partido (coef_Menores,coef_juveniles,coef_Mayores) .  A continuación se presenta una tabla en 
//la que se detalla los valores por defecto de cada  coeficiente aplicado a una categoría de un partido  fútbol:
class Futbol extends Partido{

    //!ATRIBTOS 
    private $coef_Menores;
    private $coef_juveniles;
    private $coef_Mayores;

    //!CONSTRUCTOR
    
    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2){
        parent:: __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->coef_Menores = 0.13;
        $this->coef_juveniles = 0.19;
        $this->coef_Mayores = 0.27;
    }

    //!GETTERS

    public function getCoef_Menores(){
        return $this->coef_Menores;
    }

    public function getCoef_juveniles(){
        return $this->coef_juveniles;
    }

    public function getCoef_Mayores(){
        return $this->coef_Mayores;
    }

    //!SETTERS

    public function setCoef_Menores($coef_Menores){
        $this->coef_Menores = $coef_Menores;
    }

    public function setCoef_juveniles($coef_juveniles){
        $this->coef_juveniles = $coef_juveniles;
    }

    public function setCoef_Mayores($coef_Mayores){
        $this->coef_Mayores = $coef_Mayores;
    }

    //!__toString

    public function __toString(){
        
        return "---------------\n". 
        "Menores: " . $this->getCoef_Menores() . "\n" .
        "Juveniles: " . $this->getCoef_juveniles() . "\n" .
        "Mayores: " . $this->getCoef_Mayores() . "\n" .
        "---------------\n";
    }



    //!METODOS

    public function coeficientePartido() {
        
        $coefBase = parent::coeficientePartido();

        $coefCategoria = 0;
        $categoria = $this->getObjEquipo1()->getObjCategoria()->getDescripcion();

            if ($categoria == "Menores") {
                
                $coefCategoria = $this->getCoef_Menores();

            }else if ($categoria == "Juveniles") {

                $coefCategoria = $this->getCoef_juveniles();

            }else if ($categoria == "Mayores") {

                $coefCategoria = $this->getCoef_Mayores();

            }

        return $coefBase * $coefCategoria;

    }
}