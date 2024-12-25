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
    <aside class="w-72 bg-indigo-900 text-white flex flex-col">

      <div class="p-6">
        <h1 class="text-2xl font-bold tracking-wide text-center">
          <span class="flex items-center justify-center">
            <svg class="w-8 h-8 mr-2 text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 2a10 10 0 100 20 10 10 0 000-20zM8.75 11h6.5a.75.75 0 010 1.5h-6.5a.75.75 0 010-1.5z" />
            </svg>
            TaskFlow
          </span>
        </h1>
        <p class="text-center mt-2 text-gray-300">Efficient Task Management</p>
      </div>

      <nav class="mt-8 space-y-4 px-6">
        <a href="#" class="flex items-center px-3 py-2 text-sm font-medium bg-indigo-800 rounded-lg hover:bg-indigo-700">
            <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
          Dashboard
        </a>
        <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-300 rounded-lg hover:bg-indigo-700">
          <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
          My Tasks
        </a>
        <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-300 rounded-lg hover:bg-indigo-700">
        <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
          Team
        </a>
        <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-300 rounded-lg hover:bg-indigo-700">
            <svg class="w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
          Settings
        </a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto">
      <!-- Header -->
      <header class="flex justify-between items-center">
        <h2 class="text-2xl font-bold">Task Board</h2>

        <div class="flex gap-2">
            <button class="flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700">
            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Task
            </button>
            <button class="flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700">
                Deconnexion
            </button>
        </div>

      </header>

      <!-- Modal de Formulaire de creation de Tache  -->

      <div
            class="fixed inset-0 p-4 hidden flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
            <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-8 relative">
                <div class="flex items-center">
                    <h3 class="text-indigo-600 text-xl font-bold flex-1">Add New Task</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 ml-2 cursor-pointer shrink-0 fill-gray-400 hover:fill-red-500"
                        viewBox="0 0 320.591 320.591">
                        <path
                            d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                            data-original="#000000"></path>
                        <path
                            d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                            data-original="#000000"></path>
                    </svg>
                </div>

                <form class="space-y-4 mt-8">
                    <div>
                        <label class="text-gray-800 text-sm mb-2 block">Title Task</labe>
                        <input type="text" placeholder="Enter Title Task..."
                            class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-indigo-600 focus:bg-transparent rounded-lg" />
                    </div>

                    <div>
                        <label class="text-gray-800 text-sm mb-2 block">Descriptions</labe>
                        <textarea placeholder='Write about the Task'
                            class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-indigo-600 focus:bg-transparent rounded-lg" rows="3"></textarea>
                    </div>

                   <!-- Status -->
                    <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Assigné à</label>
                    <select id="status" name="status" class="px-4 py-4 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-indigo-600 focus:bg-transparent rounded-lg">
                        <option value="To Do">Salah</option>
                        <option value="In Progress">Adil</option>
                        <option value="Done">Badr</option>
                        <option value="Done">Smail</option>
                    </select>
                    </div>

                    <!-- Type -->
                    <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                    <select id="type" name="type" class="px-4 py-4 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-indigo-600 focus:bg-transparent rounded-lg" required>
                        <option value="Bug">Simple Tache</option>
                        <option value="Bug">Bug</option>
                        <option value="Feature">Feature</option>
                    </select>
                    </div>

                    <div class="flex justify-end gap-4 !mt-8">
                        <button type="button"
                            class="px-6 py-3 rounded-lg text-gray-800 text-sm border-none outline-none tracking-wide bg-gray-200 hover:bg-gray-300">Cancel</button>
                        <button type="button"
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
            <div class="bg-gray-100 p-4 rounded-lg shadow-sm hover:shadow-md">
              <h3 class="font-semibold text-gray-700">Design Login Page</h3>
              <p class="text-sm text-gray-500 mt-2">Assigned to Alice</p>
              <div class="mt-2 text-xs flex justify-between text-gray-400">
                <span>Due: 2024-12-30</span>
               
              </div>
            </div>
          </div>
        </div>

        <!-- Column: In Progress -->
        <div class="bg-white rounded-lg shadow-md">
          <div class="bg-yellow-500 text-white font-semibold p-4 rounded-t-lg">In Progress</div>
          <div class="p-4 space-y-4 ">
            <div class="bg-gray-100 p-4 rounded-lg hover:shadow-md border border-red-500">
              <h3 class="font-semibold text-gray-700">Fix Signup Bug</h3>
              <p class="text-sm text-gray-500 mt-2">Assigned to Bob</p>
              <div class="mt-2 text-xs flex justify-between text-gray-400">
                <span>Due: 2024-12-28</span>
               
              </div>
            </div>
          </div>
        </div>

        <!-- Column: Done -->
        <div class="bg-white rounded-lg shadow-md">
          <div class="bg-green-500 text-white font-semibold p-4 rounded-t-lg">Done</div>
          <div class="p-4 space-y-4">
            <div class="bg-gray-100 p-4 rounded-lg shadow-sm hover:shadow-md">
              <h3 class="font-semibold text-gray-700">Deploy Application</h3>
              <p class="text-sm text-gray-500 mt-2">Assigned to Charlie</p>
              <div class="mt-2 text-xs flex justify-between text-gray-400">
                <span>Completed: 2024-12-25</span>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>

</body>
</html>