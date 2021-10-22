<?php

// user class 
class User{

    // table name
    private $table = 'user';

    // dataabse connection property
    private $conn;
    
    // database table variables
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $number;

    // constructor to accept database connection
    public function __construct($conn) {

        $this->conn = $conn;
    }

    // method to fetch all record from database table
    public function read() {

        $query = 'SELECT 
                    id,
                    firstname,
                    lastname,
                    email,
                    number
                  FROM ' .
                    $this->table;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;

    }

    // method to fetch single record from databse record depending on id 
    public function read_single() {

        $query = 'SELECT
                    id,
                    firstname,
                    lastname,
                    email,
                    number
                  FROM ' 
                    . $this->table . '
                  WHERE id = ?';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch();

        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->email = $row['email'];
        $this->number = $row['number'];

    }

    // method to create new record and add it to databse records
    public function create() {

      $query = 'INSERT INTO
                  ' . $this->table . '
                SET
                  firstname = :firstname,
                  lastname = :lastname,
                  password = :password,
                  email = :email,
                  number = :number';
      
      $stmt = $this->conn->prepare($query);

      $this->firstname = htmlspecialchars(strip_tags($this->firstname));
      $this->lastname = htmlspecialchars(strip_tags($this->lastname));
      $this->password = htmlspecialchars(strip_tags($this->password));
      $this->email = htmlspecialchars(strip_tags($this->email));
      $this->number = htmlspecialchars(strip_tags($this->number));
      
      $stmt->bindParam(':firstname', $this->firstname);
      $stmt->bindParam(':lastname', $this->lastname);
      $stmt->bindParam(':password', $this->password);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':number', $this->number);

      if ($stmt->execute()) {

        return true;
      } else {

        return false;
      }
    }

    // method to update database record 
    public function update() {

      $query = 'UPDATE 
                  ' . $this->table . '
                SET 
                  firstname = :firstname,
                  lastname = :lastname,
                  email = :email,
                  number = :number
                WHERE
                  id = :id';

      $stmt = $this->conn->prepare($query);
      
      $this->id = htmlspecialchars(strip_tags($this->id));
      $this->firstname = htmlspecialchars(strip_tags($this->firstname));
      $this->lastname = htmlspecialchars(strip_tags($this->lastname));
      $this->email = htmlspecialchars(strip_tags($this->email));
      $this->number = htmlspecialchars(strip_tags($this->number));

      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':firstname', $this->firstname);
      $stmt->bindParam(':lastname', $this->lastname);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':number', $this->number);

      if ($stmt->execute()) {

        return true;
      } else {

        return false;
      }
    }

    // method to delete from database record
    public function delete() {

      $query = 'DELETE FROM 
                  ' . $this->table . '
                WHERE 
                  id = :id';
      
      $stmt = $this->conn->prepare($query);

      $stmt->bindParam(':id', $this->id);

      if ($stmt->execute()) {

        return true;
      } else {

        return false;
      }
    }



}

?>