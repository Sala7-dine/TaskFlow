<?php 

require_once '../classes/Task.php'; 

$Task = new Task();

if($_SERVER["REQUEST_METHOD"] === "GET"){

    $task_id = $_GET["task_id"];

    $infos = $Task->getTaskDetails($task_id);

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Details</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <div class="min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg max-w-4xl w-full p-6">
      <header class="border-b pb-4 mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Task Details</h1>
        <p class="text-sm text-gray-500">Details for Task ID: <span class="font-medium"> <?php echo $infos["id"] ?></span></p>
      </header>

      <!-- General Information -->
      <section class="mb-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">General Information</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <p class="text-sm text-gray-500">Title:</p>
            <p class="text-gray-700 font-medium"><?php echo $infos["title"] ?></p>
          </div>
          <div>
            <p class="text-sm text-gray-500">Assigned User:</p>
            <p class="text-gray-700 font-medium"><?php echo $infos["name"] ?></p>
          </div>
          <div>
            <p class="text-sm py-2 text-gray-500">Status:</p>
            <span class="px-4 py-2 bg-blue-100 text-blue-800 text-sm rounded-full font-medium"><?php echo $infos["status"] ?></span>
          </div>
          <div>
            <p class="text-sm text-gray-500">Created At:</p>
            <p class="text-gray-700 font-medium"><?php echo $infos["created_at"] ?></p>
          </div>
        </div>
      </section>

      <!-- Description -->
      <section class="mb-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Description</h2>
        <p class="text-gray-700 leading-relaxed">
        <?php echo $infos["description"] ?>
        </p>
      </section>

      <!-- Bug/Feature Details -->
      <section class="mb-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Additional Details</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <p class="text-sm text-gray-500">Type:</p>
            <p class="text-gray-700 font-medium"> <?php echo $infos["type"] ?></p>
          </div>
          <div>
            <p class="text-sm py-2 text-gray-500"><?php echo $infos["type"] === "Bug" ? "severity" : ($infos["type"] === "Feature" ? "Priority" : "Tache simple");  ?></p>
            <span class="px-4 py-2 bg-blue-100 text-blue-800 text-sm rounded-full font-medium"><?php echo $infos["type"] === "Bug" ? $infos["severity"] : ($infos["type"] === "Feature" ? $infos["priority"] : "simple");  ?></span>
          </div>
        </div>
      </section>

      <!-- Actions -->
      <section>
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Actions</h2>
        <div class="flex items-center gap-4">
        <form action="updateTaskStatus.php" method="POST">
          <input type="hidden" name="task_id" value="<?php echo intval($task_id); ?>">
          <input type="hidden" name="status" value="Done">
          <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg font-medium hover:bg-green-600 focus:ring-2 focus:ring-green-300">
              Mark as Done
          </button>
        </form>

          
          <a href="index.php" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg font-medium hover:bg-gray-400 focus:ring-2 focus:ring-gray-200">
            Back To Home
          </a>
        </div>
      </section>
    </div>
  </div>

</body>
</html>
