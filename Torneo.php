<?php 

/**
 * Implementar la clase Torneo que contiene la colección de partidos y un importe que será parte del premio. 
  Cuando un Torneo es creado la colección de partidos debe ser creada como una colección vacía.
 */

class Torneo {

    //!ATRIBUTOS
    private $colPartidos;
    private $premios;

    //!CONSTRUCTOR
    public function __construct($premios) {
        $this->colPartidos = [];
        $this->premios = $premios;
    }

    //!GETTERS
    public function getColPartidos() {
        return $this->colPartidos;
    }
    public function getPremios() {
        return $this->premios;
    }

    //!SETTERS
    public function setColPartidos($colPartidos) {
        $this->colPartidos = $colPartidos;
    }

    public function setPremios($premios) {
        $this->premios = $premios;
    }

    //!__toString
    public function __toString() {

        return "Partidos: " . $this->getColPartidos() . "\n" .
         " Premios: " . $this->getPremios() . "\n";
    }

    //!METODOS 

    /**
     * Implementar el método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) en la  clase Torneo el cual 
      recibe por parámetro 2 equipos, la fecha en la que se realizará el partido y si se trata de un partido de futbol o basquetbol . 
      El método debe crear y retornar la instancia de la clase Partido que corresponda y almacenarla en la colección de partidos del 
      Torneo. Se debe chequear que los 2 equipos tengan la misma categoría e igual cantidad de jugadores, caso contrario no podrá ser 
      registrado ese partido en el torneo.
     */

    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido){


        $colPartidos = $this->getColPartidos();
        $instanciaPartido = null;
        $fecha = date("d-m-Y");

            if ($objEquipo1->getObjCategoria() == $objEquipo2->getObjCategoria() && $objEquipo1->getCantJugadores() == $objEquipo2->getCantJugadores()) {

                if ($tipoPartido instanceof Futbol) {

                    $ultimoPartido = count($this->getColPartidos()) + 1;
                    $instanciaPartido = new Futbol($ultimoPartido,$fecha, $objEquipo1, 0, $objEquipo2, 0, null, null, null);
                    array_push($colPartidos, $instanciaPartido);
                    $this->setColPartidos($colPartidos);

                } else if ($tipoPartido instanceof Basquet) {

                    $ultimoPartido = count($this->getColPartidos()) + 1;
                    $instanciaPartido = new Basquet($ultimoPartido, $fecha, $objEquipo1, 0, $objEquipo2, 0, null, null, null);
                    array_push($colPartidos, $instanciaPartido);
                    $this->setColPartidos($colPartidos);

                }

            }

        return $instanciaPartido;
    }

    /**
     * Implementar el método darGanadores($deporte) en la clase Torneo que recibe por parámetro si se trata de un partido de fútbol o de básquetbol y en 
     base  al parámetro busca entre esos partidos los equipos ganadores ( equipo con mayor cantidad de goles). El método retorna una colección con los 
     objetos de los equipos encontrados.
     */

     public function darGanadores($deporte){

        $colParidos = $this->getColPartidos();
        $colGanadores = [];

            foreach ($colParidos as $partido) {

                if ($deporte == "futbol" && $partido instanceof Futbol) {

                    $colGanadores = $partido->darEquipoGanador();
                }else if ($deporte == "basquet" && $partido instanceof Basquet) {
                    
                    $colGanadores = $partido->darEquipoGanador();
                }
            }

        return $colGanadores;

    }

    /**
     * Implementar el método calcularPremioPartido($OBJPartido) que debe retornar un arreglo asociativo donde una de sus claves es ‘equipoGanador’  
     * y contiene la referencia al equipo ganador; y la otra clave es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido por el 
     * importe configurado para el torneo. 
(premioPartido = Coef_partido * ImportePremio)
     */

     public function calcularPremioPartido($objPartido){

        $premio = $objPartido->coeficientePartido() * $this->getPremios();
        $equipoGanador = $objPartido->darEquipoGanador();

        return ['equipoGanador' => $equipoGanador, 'premioPartido' => $premio];
     }
}

