<?php

try {
  $conn = new PDO('mysql:host=localhost;dbname=db_todolist', 'root', '');
  echo 'Conectado';
  $query = "SELECT * FROM tasks";

  // get all tasks
  $tasks = $conn->query($query);
} catch (PDOException $e) {
  echo 'Error de conexión: ' . $e->getMessage();
}
