<?php 

/**
 * si se trata de un partido de basquetbol  se almacena la cantidad de infracciones de manera tal que al coeficiente base se 
    debe restar un coeficiente de penalización, cuyo valor por defecto es: 0.75, * (por) la cantidad de infracciones. Es decir:
    coef  = coeficiente_base_partido  - (coef_penalización*cant_infracciones);
 */

 class Basquet extends Partido{

    //!ATRIBUTOS
    private $cantInfracciones;
    private $coeficientePenalizacion;

    //!CONSTRUCTOR
    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $cantInfracciones){
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->cantInfracciones = $cantInfracciones;
        $this->coeficientePenalizacion = 0.75;
    }

    //!GETTERS
    public function getCantInfracciones(){
        return $this->cantInfracciones;
    }
    public function getCoeficientePenalizacion(){
        return $this->coeficientePenalizacion;
    }

    //!SETTERS
    public function setCantInfracciones($cantInfracciones){
        $this->cantInfracciones = $cantInfracciones;
    }
    public function setCoeficientePenalizacion($coeficientePenalizacion){
        $this->coeficientePenalizacion = $coeficientePenalizacion;
    }

    //!__toString 

    public function __toString(){
        return parent::__toString() . 
        " CANTIDAD DE INFRACCIONES: " . $this->getCantInfracciones() . "\n" .
        " COEFICIENTE PENALIZACION: " . $this->getCoeficientePenalizacion() . "\n";
    }

    //!METODOS

    public function coeficientePartido(){
        
            $coefBase = parent::coeficientePartido();
            $coefPenalizacion = $this->getCoeficientePenalizacion();
            $cantInfracciones = $this->getCantInfracciones();
            $coef = $coefBase - ($coefPenalizacion*$cantInfracciones);

        return $coef;
    }
 }