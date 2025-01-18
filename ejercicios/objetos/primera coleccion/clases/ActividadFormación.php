<?php

class ActividadFormación {

    private int $código;
    private string $título;
    private int $num_horas_presenciales;
    private int $num_horas_online;
    private int $num_horas_no_presenciales;
    private string $nivel;

    private static array $NIVELES_POSIBLES = ["A", "B", "C"];
    private const MAX_HORAS_PRESENCIALES = 200;
    private const MAX_HORAS_ONLINE = 100;


    function __construct(int $código, string $título, int $num_horas_presenciales, int $num_horas_online, int $num_horas_no_presenciales, string $nivel){
        $this->código = $código;
        $this->título = $título;
        $this->num_horas_presenciales = $num_horas_presenciales;
        $this->num_horas_online = $num_horas_online;
        $this->num_horas_no_presenciales = $num_horas_no_presenciales;
        $this->nivel = $nivel;
    }

    private function setCódigo(int $value){
        $this->código = $value;
    }

    private function setTítulo(string $value){
        $this->título = $value;
    }

    private function setNum_horas_presenciales(int $value){

        if($value > self::MAX_HORAS_PRESENCIALES || $value < 0){
            throw new Exception("El máximo de horas es " . self::MAX_HORAS_PRESENCIALES . "y el mínimo 0", 1);
        }

        $this->num_horas_presenciales = $value;
    }

    private function setNum_horas_online(int $value){

        if($value > self::MAX_HORAS_ONLINE || $value < 0){
            throw new Exception("El máximo de horas es " . self::MAX_HORAS_ONLINE . "y el mínimo 0", 2);
        }

        $this->num_horas_online = $value;
    }

    private function setNum_horas_no_presenciales(int $value){

        if($value < 0){
            throw new Exception("El mínimo de horas es 0", 3);
        }

        $this->num_horas_no_presenciales = $value;
    }

    private function setNivel(string $value){

        if( !array_key_exists($value, self::$NIVELES_POSIBLES) ){
            throw new Exception("Los únicos valores posibles son A,B Y C", 4);
        }

        $this->nivel = $value;
    }

    public function __set($propiedad, $value)
    {
        if( property_exists($this, $propiedad) ){
            $this->$propiedad = $value;
        }
    }

    public function __get($name)
    {
        if( property_exists(self::class, $name) ){
            return $this->$name;
        }
    }

    public function __isset($propiedad)
    {
        return isset($this->$propiedad);
    }

    public function __unset($propiedad)
    {
        unset($propiedad);
    }

    public function __toString()
    {
        return "Actividad de formación de título $this->título, con código $this->código, de nivel $this->nivel.";
    }

}

?>