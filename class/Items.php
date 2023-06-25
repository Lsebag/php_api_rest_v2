<?php
include_once '../config/Database.php';

class Items {
    private $conn;
    private $itemsTable = "items";

    // Propiedades para los datos del item
    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $created;

    public function __construct($db)
    {
        $this->conn = $db; // Asigna la conexión a la variable $conn
    }

    public function create()
    {
        $stmt = $this->conn->prepare("
            INSERT INTO ".$this->itemsTable."(`name`, `description`, `price`, `category_id`, `created`)
            VALUES(?,?,?,?,?)"
        );

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->created = htmlspecialchars(strip_tags($this->created));

        $stmt->bind_param("ssiis", $this->name, $this->description, $this->price, $this->category_id, $this->created);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function read()
    { 
    if($this->id) {
        $stmt = $this->conn->prepare("SELECT * FROM ".$this->itemsTable." WHERE id = ?");
        $stmt->bind_param("i", $this->id); 
    } else {
        $stmt = $this->conn->prepare("SELECT * FROM ".$this->itemsTable); 
    } 
    $stmt->execute(); 
    $result = $stmt->get_result(); 
        return $result; 
    }

    public function update()
    {

    // Verificar si el ID existe
    $stmt = $this->conn->prepare("SELECT id FROM ".$this->itemsTable." WHERE id = ?");
    $stmt->bind_param("i", $this->id);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows === 0) {
        return false; // ID no encontrado, retorna false
    }
    
    // El ID existe, procede con la actualización
    $stmt = $this->conn->prepare("
        UPDATE ".$this->itemsTable." 
        SET name = ?, description = ?, price = ?, category_id = ?, created = ? 
        WHERE id = ?"
    );

    $this->id = htmlspecialchars(strip_tags($this->id));
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->description = htmlspecialchars(strip_tags($this->description));
    $this->price = htmlspecialchars(strip_tags($this->price));
    $this->category_id = htmlspecialchars(strip_tags($this->category_id));
    $this->created = htmlspecialchars(strip_tags($this->created));

    $stmt->bind_param("ssiisi", $this->name, $this->description, $this->price, $this->category_id, $this->created, $this->id);

    if($stmt->execute()){
    return true;
    }

    return false;
    }

    public function delete()
    {
    // Verificar si el ID existe
    $stmt = $this->conn->prepare("SELECT id FROM ".$this->itemsTable." WHERE id = ?");
    $stmt->bind_param("i", $this->id);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows === 0) {
        return false; // ID no encontrado, retorna false
    }

    $stmt = $this->conn->prepare("
    DELETE FROM ".$this->itemsTable." 
    WHERE id = ?");
        
    $this->id = htmlspecialchars(strip_tags($this->id));
        
    $stmt->bind_param("i", $this->id);
        
    if($stmt->execute()){
        return true;
    }
        
    return false; 
    }

}