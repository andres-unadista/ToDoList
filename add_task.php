<?php
$tasks = [];

try {
  $conn = new PDO('mysql:host=localhost;dbname=db_todolist', 'root', '');

  // insert task
  if (isset($_POST['btn_save'])) {
    insertTask($conn);
  }

  // delete task
  if (isset($_GET['id'])) {
    deleteTask($conn);
  }

  // update task
  if (isset($_POST['id_completed'])) {
    updateTask($conn);
  }

  // get all tasks
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
  $query = "INSERT INTO tasks (description) VALUES (:task)";
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
  header('Location: /');
}

function updateTask($conn)
{
  $id = $_POST['id_completed'];
  $completed = intval($_POST['completed']) === 1 ? 0 : 1;
  $query = "UPDATE tasks SET completed = :completed WHERE id = :id";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':completed', $completed);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
}
