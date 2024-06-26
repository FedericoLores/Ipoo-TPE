<?php

class Viaje {
    private $codigo;//int
    private $destino;//string
    private $pasajeros;//arreglo de objetos nombre/apellido/numDoc/telefono
    private $maxPasajeros;//int
    private $responsableViaje;//obj nombre/apellido/

    public function __construct($codigoCnstr ,$destinoCnstr, $pasajerosCnstr, $maxPasajerosCnstr, $responsableViajeCnstr){
        $this->codigo = $codigoCnstr;
        $this->destino = $destinoCnstr;
        $this->pasajeros = $pasajerosCnstr;
        $this->maxPasajeros = $maxPasajerosCnstr;
        $this->responsableViaje = $responsableViajeCnstr;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function getDestino(){
        return $this->destino;
    }

    public function getPasajeros(){
        return $this->pasajeros;
    }

    //
    public function getUnPasajero($indice){
        return $this->pasajeros[$indice];
    }

    //
    public function getDatoUnPasajero($indice, $llave){
        return $this->pasajeros[$indice][$llave];
    }

    public function getMaxPasajeros(){
        return $this->maxPasajeros;
    }

    public function getResponsableViaje(){
        return $this->responsableViaje;
    }


    public function setCodigo($codigoNew){
        $this->codigo = $codigoNew;
    }

    public function setDestino($destinoNew){
        $this->destino = $destinoNew;
    }

    public function setPasajeros($pasajerosNew){
        $this->pasajeros = $pasajerosNew;
    }

    //
    public function setUnPasajero($indice, $unPasajero){
        $this->pasajeros[$indice] = $unPasajero;
    }

    //
    public function setDatoUnPasajero($indice, $llave, $dato){
        $this->pasajeros[$indice][$llave] = $dato;
    }

    public function setMaxPasajeros($maxPasajerosNew){
        $this->maxPasajeros =$maxPasajerosNew;
    }

    public function setResponsableViaje($responsableViajeNew){
        $this->responsableViaje = $responsableViajeNew;
    }

    public function __toString(){
        $i=1;
        $string = "codigo: " . $this->getCodigo() . " \ndestino: " . $this->getDestino() . " \npasajeros: ";
        foreach($this->getPasajeros() as $pasajero){
            $string = $string . "pasajero " . $i . ": " . $pasajero . " \n";
            $i++;
        }
        $string = $string . "maximo de pasajeros: " . $this->getMaxPasajeros() . " \nresponsable del viaje: " . $this->getResponsableViaje() . "\n";
        return $string;
    }

    /** recibe documento de pasajero y revisa que el pasajero no sea parte del viaje
     * @param int $numeroDocumento
     * @return boolean
     */
    function seRepite($numeroDocumento){
        $i = 0;
        $repetido = false;
        while ($i<count($this->getPasajeros()) && $this->getPasajeros()[$i]->getNumDoc() != $numeroDocumento){
            $i++;
        }
        if ($i<count($this->getPasajeros())){
            $repetido = true;
        }
        return $repetido;
    }

    /** retorna si tiene espacio para mas pasajeros
     * @return boolean
     */
    function revisarMaximo(){
        $tieneEspacio = count($this->getPasajeros()) < $this->getMaxPasajeros();
        return $tieneEspacio;
    }


    /** recibe numero de pasajero, elimina ese pasajero
     * @param int $numeroPasajero
    */
    function borrarPasajero($numeroPasajero){
        $arregloPasajeros = $this->getPasajeros();
        unset($arregloPasajeros[$numeroPasajero]);
        $arregloPasajeros = array_values($arregloPasajeros);
        $this->setPasajeros($arregloPasajeros);
    }

}

?>