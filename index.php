<?php
include('add_task.php');
?>
<!doctype html>
<html lang="en">

<head>
  <title>TodoList</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  <style>
    span.badge {
      cursor: pointer;
    }

    .list-group-item {
      font-size: 1.1em;
      font-weight: 500;
    }

    .remark {
      text-decoration: line-through;
    }
  </style>
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main class="container pt-5">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Registrar tarea</h4>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="mb-3">
                <label for="" class="form-label">Tarea</label>
                <input type="text" class="form-control" name="task" id="task" placeholder="Ingrese la tarea" />
              </div>
              <div class="mb-3">
                <div class="d-grid gap-2">
                  <button name="btn_save" id="btn_save" class="btn btn-primary">
                    Guardar
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-8 mx-auto mt-4">
        <ul class="list-group">
          <?php
          foreach ($tasks as $task) :
          ?>
            <li class="list-group-item">
              <div class="row ps-5">
                <div class="form-check">
                  <form class="m-0" action="/" method="post">
                    <input type="hidden" name="id_completed" value="<?php echo $task['id']; ?>">
                    <input type="hidden" name="completed" value="<?php echo $task['completed']; ?>">
                    <input class="form-check-input" type="checkbox" name="checked" onchange="this.form.submit();" <?php echo $task['completed'] === 1 ? 'checked' : '' ?> />
                  </form>
                  <label class="form-check-label <?php echo $task['completed'] === 1 ? 'remark' : '' ?>"> <?php echo $task['description']; ?> </label>
                  <a href="/?id=<?php echo $task['id']; ?>"><span class="badge bg-danger float-end">X</span></a>
                </div>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>

      </div>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>

</body>

</html>