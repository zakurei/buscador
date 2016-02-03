<?php
class auto{
    private $Id;
    private $Marca;
    private $Modelo;
    private $Consumo;
    private $Emisiones;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param mixed $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->Marca;
    }

    /**
     * @param mixed $Marca
     */
    public function setMarca($Marca)
    {
        $this->Marca = $Marca;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->Modelo;
    }

    /**
     * @param mixed $Modelo
     */
    public function setModelo($Modelo)
    {
        $this->Modelo = $Modelo;
    }

    /**
     * @return mixed
     */
    public function getConsumo()
    {
        return $this->Consumo;
    }

    /**
     * @param mixed $Consumo
     */
    public function setConsumo($Consumo)
    {
        $this->Consumo = $Consumo;
    }

    /**
     * @return mixed
     */
    public function getEmisiones()
    {
        return $this->Emisiones;
    }

    /**
     * @param mixed $Emisiones
     */
    public function setEmisiones($Emisiones)
    {
        $this->Emisiones = $Emisiones;
    }

}
?>