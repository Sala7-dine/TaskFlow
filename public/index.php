<?php

require_once '../classes/User.php'; 
require_once '../classes/Task.php'; 

session_start();
$user = new User();
$users = $user->getusers();

$task = new Task();
$tasks = $task->getTasks();

//print_r($task->getTasks()); 

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

  $name = $_POST['name'] ?? '';
  $email = $_POST['email'] ?? '';

  if (!empty($name) && !empty($email)) {

      $existingUserId = $user->userExists($email);

      if ($existingUserId) {
          $_SESSION['user_id'] = $existingUserId;
      } else {
          $userId = $user->create($name, $email);
          $_SESSION['user_id'] = $userId;
      }
  } else {
      echo "<script>alert('Veuillez remplir tous les champs.');</script>";
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TaskFlow - Modern Board</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-gray-50 to-gray-200 min-h-screen text-gray-800">

  <div class="flex h-screen overflow-hidden">
    
    <!-- Sidebar -->
     <?php require_once "../templates/sidebar.php" ?>

     <?php require_once "../templates/ModalUser.php" ?>

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto">
      <!-- Header -->
      <header class="flex justify-between items-center">
        <h2 class="text-2xl font-bold">Task Board</h2>

        <div class="flex gap-2">
            <button id="addtask" class="flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700">
            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Task
            </button>
            
              <a href="deconnexion.php" class="flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700">
                  Deconnexion
              </a>
            
            
        </div>

      </header>

      <!-- Modal de Formulaire de creation de Tache  -->

      <div
            id="taskModal" class="fixed inset-0 p-4 hidden flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
            <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-8 relative">
                <div class="flex items-center">
                    <h3 class="text-indigo-600 text-xl font-bold flex-1">Add New Task</h3>
                    <svg id="close" xmlns="http://www.w3.org/2000/svg" class="w-3 ml-2 cursor-pointer shrink-0 fill-gray-400 hover:fill-red-500"
                        viewBox="0 0 320.591 320.591">
                        <path
                            d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                            data-original="#000000"></path>
                        <path
                            d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                            data-original="#000000"></path>
                    </svg>
                </div>

                <form class="space-y-4 mt-8" action="createTask.php" method="POST">
                    <div>
                        <label class="text-gray-800 text-sm mb-2 block">Title Task</labe>
                        <input type="text" name="title" placeholder="enter title task..."
                            class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-indigo-600 focus:bg-transparent rounded-lg" />
                    </div>

                    <div>
                        <label class="text-gray-800 text-sm mb-2 block">Descriptions</labe>
                        <textarea placeholder='write about the task...' name="description"
                            class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-indigo-600 focus:bg-transparent rounded-lg" rows="3"></textarea>
                    </div>

                   <!-- Status -->
                    <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Assigné à</label>
                    <select id="assinedTo" name="assinedTo" class="px-4 py-4 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-indigo-600 focus:bg-transparent rounded-lg">
                      
                        <?php 
                        foreach($users as $user){
                            echo "<option value='".$user['id']."'>".$user['name']."</option>";
                        }
                        ?>
                    </select>
                    </div>

                    <!-- Type -->
                    <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                    <select id="type" name="type" class="px-4 py-4 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-indigo-600 focus:bg-transparent rounded-lg" required>
                        <option value="simple">Simple Tache</option>
                        <option value="bug">Bug</option>
                        <option value="feature">Feature</option>
                    </select>
                    </div>
                    
                    <div id="TypeTask">
                      

                    </div>

                    <div class="flex justify-end gap-4 !mt-8">
                        <button type="button" id="close1"
                            class="px-6 py-3 rounded-lg text-gray-800 text-sm border-none outline-none tracking-wide bg-gray-200 hover:bg-gray-300">Cancel</button>
                        <button type="submit"
                            class="px-6 py-3 rounded-lg text-white text-sm border-none outline-none tracking-wide bg-indigo-600 hover:bg-indigo-700">Submit</button>
                    </div>
                </form>
            </div>
        </div>


        

      <!-- Task Board -->
      <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Column: To Do -->
        <div class="bg-white rounded-lg shadow-md">
          <div class="bg-indigo-500 text-white font-semibold p-4 rounded-t-lg">To Do</div>
          <div class="p-4 space-y-4">
             <!-- Task Card -->
            <?php

            foreach($tasks as $task){

              if($task['status'] === "To Do"){

                echo '

                <div class="bg-gray-100 p-4 rounded-lg shadow-sm hover:shadow-md">
                            <a href="taskDetail.php?idTask='.$task["task_id"].'" class="font-semibold text-gray-700 hover:underline hover:cursor-pointer">'.$task["titre"].'</a>
                  <p class="text-sm text-gray-500 mt-2">Assigned to '.$task["username"].'</p>
                  <div class="mt-2 text-xs flex justify-between text-gray-400">
                    <span>Due: '.$task["created_at"].'</span>
                  
                  </div>

                  <select name="status" class="mt-1 block w-full p-2 border rounded-md bg-white text-gray-700 focus:ring focus:ring-blue-300">
                      <option value="to_do" <?= $task["status"] === "to_do" ? "selected" : "" ?>To Do</option>
                      <option value="in_progress" <?= $task["status"] === "in_progress" ? "selected" : "" ?>In Progress</option>
                      <option value="done" <?= $task["status"] === "done" ? "selected" : "" ?>Done</option>
                  </select>
                  
                </div> ';

              }
            }
            
            ?>

            
            
          </div>
        </div>

        <!-- Column: In Progress -->
        <div class="bg-white rounded-lg shadow-md">
          <div class="bg-yellow-500 text-white font-semibold p-4 rounded-t-lg">In Progress</div>
          <div class="p-4 space-y-4 ">
              <!-- Task Card -->
              <?php

                        foreach($tasks as $task){

                          if($task['status'] === "In Progress"){
                            echo '
                            <div class="bg-gray-100 p-4 rounded-lg  shadow-sm hover:shadow-md">
                            <a href="taskDetail.php?idTask='.$task["task_id"].'" class="font-semibold text-gray-700 hover:underline hover:cursor-pointer">'.$task["titre"].'</a>
                              <p class="text-sm text-gray-500 mt-2">Assigned to '.$task["username"].'</p>
                              <div class="mt-2 text-xs flex justify-between text-gray-400">
                                <span>Due: '.$task["created_at"].'</span>
                              </div>
                            </div> ';

                          }
                        }

                  ?>
          </div>
        </div>

        <!-- Column: Done -->
        <div class="bg-white rounded-lg shadow-md">
          <div class="bg-green-500 text-white font-semibold p-4 rounded-t-lg">Done</div>
          <div class="p-4 space-y-4">
            <!-- Task Card -->
            <?php

                      foreach($tasks as $task){

                        if($task['status'] === "Done"){

                          echo '

                          <div class="bg-gray-100 p-4 rounded-lg shadow-sm hover:shadow-md">
                            <a href="taskDetail.php?idTask='.$task["task_id"].'" class="font-semibold text-gray-700 hover:underline hover:cursor-pointer">'.$task["titre"].'</a>
                            <p class="text-sm text-gray-500 mt-2">Assigned to '.$task["username"].'</p>
                            <div class="mt-2 text-xs flex justify-between text-gray-400">
                              <span>Due: '.$task["created_at"].'</span>
                            
                            </div>
                          </div> ';

                        }
                      }

                      ?>
          </div>
        </div>
      </div>
    </main>
  </div>



<script>

  let addtask = document.getElementById("addtask");
  let taskModal = document.getElementById("taskModal");
  let close = document.getElementById("close");
  let close1 = document.getElementById("close1");
  let type = document.getElementById("type");
  let TypeTask = document.getElementById("TypeTask");  

  addtask.addEventListener("click" , ()=>{

    taskModal.classList.remove("hidden");
    taskModal.classList.add("flex");

  });

  close.addEventListener("click" , ()=>{

    taskModal.classList.add("hidden");
    taskModal.classList.remove("flex");

  });

  close1.addEventListener("click" , ()=>{

    taskModal.classList.add("hidden");
    taskModal.classList.remove("flex");

  });


  function SevertyInput(){
      div = `
          <div class="mb-4">
            <label for="type" class="block text-sm font-medium text-gray-700">Severity</label>
            <select id="severity" name="severity" class="px-4 py-4 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-indigo-600 focus:bg-transparent rounded-lg" required>
                <option value="Minor">Minor</option>
                <option value="Major">Major</option>
                <option value="Critical">Critical</option>
        </select>
        </div>
      `
    return div;
  }

  function PriorityInput(){
      div = `
          <div class="mb-4">
            <label for="type" class="block text-sm font-medium text-gray-700">Priority</label>
            <select id="priority" name="priority" class="px-4 py-4 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-indigo-600 focus:bg-transparent rounded-lg" required>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
          </select>
          </div>
         `

      return div;
  }


  type.addEventListener("change" , (e)=>{
    console.log(e.target.value);
    let value = e.target.value;
    if(value === "bug"){

      TypeTask.innerHTML = "";
      TypeTask.innerHTML += SevertyInput();

    }else if(value === "feature"){

      TypeTask.innerHTML = "";
      TypeTask.innerHTML += PriorityInput();
      
    }else{
    
      TypeTask.innerHTML = "";
    }
  })








</script>

</body>
</html>
