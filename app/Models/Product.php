<?php 
namespace App\Models;

use App\Classes\Database;

class Product
{
    protected $table = 'products';
    protected $id;
    protected $title;
    protected $description;
    protected $price;
    protected $sku;
    protected $image;
    protected $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    // GET METHODS
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getImage()
    {
        return $this->image;
    }

    // SET METHODS
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function setPrice(string $price)
    {
        $this->price = $price;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }

    // CRUD OPERATIONS
    public function create(array $data)
    {
        $table = $this->table;
        $keys = implode(",", array_keys($data));
        $values = implode(",", array_values($data));
        $this->database->query("INSERT INTO $table($keys) VALUES($values)");
        $this->database->getQuery()->execute();
    }

    public function select(int $id)
    {
        $table = $this->table;
        $this->database->query("SELECT * from $table WHERE id = $id");
        return json_encode($this->database->single());
    }

    public function selectAll(): string
    {
        $table = $this->table;
        $this->database->query("SELECT * from $table");
        return json_encode($this->database->resultset());
    }


    public function update(int $id, array $data)
    {

    }

    public function delete(int $id)
    {

    }
}