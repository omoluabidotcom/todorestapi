<?php

// todo class 
class Todo{

    // table name
    private $table = 'todo';

    // dataabse connection property
    private $conn;
    
    // database table variables
    public $id;
    public $topic;
    public $createdat;
    public $user_id;
    public $task;

    // constructor to accept database connection
    public function __construct($conn) {

        $this->conn = $conn;
    }

    // method to fetch all record from database table
    public function read() {

        $query = 'SELECT 
                    t.id,
                    t.topic,
                    l.task,
                    t.createdat,
                    t.user_id
                  FROM 
                    ' . $this->table . ' t
                  RIGHT JOIN
                    task l
                  ON 
                    t.id = l.todo_id
                  ORDER BY
                    t.createdat ASC';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;

    }

    // method to fetch single record from databse record depending on id 
    public function read_single() {

        $query = 'SELECT 
                    t.id,
                    t.topic,
                    l.task,
                    t.createdat,
                    t.user_id
                  FROM 
                    ' . $this->table . ' t
                  RIGHT JOIN
                    task l
                  ON    
                    t.id = l.todo_id
                  WHERE 
                    t.id = ?
                  LIMIT 0,1';

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch();

        $this->topic = $row['topic'];
        $this->task = $row['task'];
        $this->createdat = $row['createdat'];
        $this->user_id = $row['user_id'];

    }

    // method to create new record and add it to databse records
    public function create() {

      $query = 'INSERT INTO
                  ' . $this->table . '
                SET
                  topic = :topic,
                  createdat = :createdat,
                  user_id = :user_id';
      
      $stmt = $this->conn->prepare($query);

      $this->topic = htmlspecialchars(strip_tags($this->topic));
      $this->createdat = htmlspecialchars(strip_tags($this->createdat));
      $this->user_id = htmlspecialchars(strip_tags($this->user_id));
      
      $stmt->bindParam(':topic', $this->topic);
      $stmt->bindParam(':createdat', $this->createdat);
      $stmt->bindParam(':user_id', $this->user_id);

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
                  topic = :topic,
                  createdat = :createdat,
                  user_id = :user_id
                WHERE
                  id = :id';

      $stmt = $this->conn->prepare($query);
      
      $this->id = htmlspecialchars(strip_tags($this->id));
      $this->topic = htmlspecialchars(strip_tags($this->topic));
      $this->createdat = htmlspecialchars(strip_tags($this->createdat));
      $this->user_id = htmlspecialchars(strip_tags($this->user_id));

      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':topic', $this->topic);
      $stmt->bindParam(':createdat', $this->createdat);
      $stmt->bindParam(':user_id', $this->user_id);

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