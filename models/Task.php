<?php

// todo class 
class Task{

    // table name
    private $table = 'task';

    // dataabse connection property
    private $conn;
    
    // database table variables
    public $id;
    public $task;
    public $todo_id;

    // constructor to accept database connection
    public function __construct($conn) {

        $this->conn = $conn;
    }

    // method to fetch all record from database table
    public function read() {

        $query = 'SELECT 
                    id,
                    task,
                    todo_id
                  FROM 
                    ' . $this->table;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;

    }

    // method to fetch single record from databse record depending on id 
    public function read_single() {

        $query = 'SELECT
                    id,
                    task,
                    todo_id
                  FROM  
                    ' . $this->table . '
                  WHERE id = ?';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch();

        $this->task = $row['task'];
        $this->todo_id = $row['todo_id'];

    }

    // method to create new record and add it to databse records
    public function create() {

      $query = 'INSERT INTO
                  ' . $this->table . '
                SET
                  task = :task,
                  todo_id = :todo_id';
      
      $stmt = $this->conn->prepare($query);

      $this->task = htmlspecialchars(strip_tags($this->task));
      $this->todo_id = htmlspecialchars(strip_tags($this->todo_id));
      
      $stmt->bindParam(':task', $this->task);
      $stmt->bindParam(':todo_id', $this->todo_id);

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
                  task = :task,
                  todo_id = :todo_id
                WHERE
                  id = :id';

      $stmt = $this->conn->prepare($query);
      
      $this->id = htmlspecialchars(strip_tags($this->id));
      $this->task = htmlspecialchars(strip_tags($this->task));
      $this->todo_id = htmlspecialchars(strip_tags($this->todo_id));

      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':task', $this->task);
      $stmt->bindParam(':todo_id', $this->todo_id);

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