<?php
date_default_timezone_set('America/Bogota');
class Plato
{
    private $db;

    private $db_table = "plato";
    
    public $IdPlato;
    public $Nombre;
    public $Descripcion;
    public $Precio;
    public $Creado;
    public $result;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getPlatos()
    {
        $sqlQuery = "SELECT IdPlato, Nombre, Descripcion, Precio, Creado FROM " . $this->db_table . "";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }

    public function createPlato()
    {
        $this->Nombre = htmlspecialchars(strip_tags($this->Nombre));
        $this->Descripcion = htmlspecialchars(strip_tags($this->Descripcion));
        $this->Precio = htmlspecialchars(strip_tags($this->Precio));
        $this->Creado = htmlspecialchars(strip_tags($this->Creado));
        $sqlQuery = "INSERT INTO " . $this->db_table . " SET Nombre = '" . $this->Nombre . "', Descripcion = '" . $this->Descripcion . "', Precio = '" . $this->Precio . "',Creado = '" . $this->Creado . "'";
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    public function getSinglePlato()
    {
        $sqlQuery = "SELECT IdPlato, Nombre, Descripcion, Precio, Creado FROM
        " . $this->db_table . " WHERE IdPlato = " . $this->IdPlato;
                $record = $this->db->query($sqlQuery);
                $dataRow = $record->fetch_assoc();
                $this->Nombre = $dataRow['Nombre'];
                $this->Descripcion = $dataRow['Descripcion'];
                $this->Precio = $dataRow['Precio'];
                $this->Creado = $dataRow['Creado'];
    }
    public function updatePlato()
    {
        $this->Nombre = htmlspecialchars(strip_tags($this->Nombre));
        $this->Descripcion = htmlspecialchars(strip_tags($this->Descripcion));
        $this->Precio = htmlspecialchars(strip_tags($this->Precio));
        $this->Creado= htmlspecialchars(strip_tags($this->Creado));
        $this->IdPlato = htmlspecialchars(strip_tags($this->IdPlato));

        $sqlQuery = "UPDATE " . $this->db_table . " SET Nombre = '" . $this->Nombre . "',Descripcion = '" . $this->Descripcion . "',Precio = '" . $this->Precio . "',Creado = '" . $this->Creado . "'WHERE IdPlato = " . $this->IdPlato;

        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    function deletePlato()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE IdPlato = " . $this->IdPlato;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }
   
}