<?php

try {
  $conn = new PDO('mysql:host=localhost;dbname=db_todolist', 'root', '');
  echo 'Conectado';


  // insert task
  if (isset($_POST['btn_save'])) {
    insertTask($conn);
  }

  // delete task
  if (isset($_GET['id'])) {
    deleteTask($conn);
  }

  // update task
  if (isset($_POST['completed'])) {
    updateTask($conn);
  }

  // get all tasks
  $tasks = [];
  getTasks($conn);
} catch (PDOException $e) {
  echo 'Error de conexión: ' . $e->getMessage();
}

function getTasks($conn)
{
  $query = "SELECT * FROM tasks";
  $GLOBALS['tasks'] = $conn->query($query);
}

function insertTask($conn)
{
  $task = $_POST['task'];
  $query = "INSERT INTO tasks (task) VALUES (:task)";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':task', $task);
  $stmt->execute();
}

function deleteTask($conn)
{
  $id = $_GET['id'];
  $query = "DELETE FROM tasks WHERE id = :id";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
}

function updateTask($conn)
{
  $id = $_POST['id'];
  $completed = $_POST['completed'] === 1 ? 0 : 1;
  $query = "UPDATE tasks SET completed = :completed WHERE id = :id";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':completed', $completed);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
}
