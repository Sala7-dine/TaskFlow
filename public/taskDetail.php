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
        <p class="text-sm text-gray-500">Details for Task ID: <span class="font-medium">12345</span></p>
      </header>

      <!-- General Information -->
      <section class="mb-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">General Information</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <p class="text-sm text-gray-500">Title:</p>
            <p class="text-gray-700 font-medium">Fix Login Bug</p>
          </div>
          <div>
            <p class="text-sm text-gray-500">Assigned User:</p>
            <p class="text-gray-700 font-medium">John Doe</p>
          </div>
          <div>
            <p class="text-sm text-gray-500">Status:</p>
            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-sm rounded-full font-medium">In Progress</span>
          </div>
          <div>
            <p class="text-sm text-gray-500">Created At:</p>
            <p class="text-gray-700 font-medium">2024-12-24</p>
          </div>
        </div>
      </section>

      <!-- Description -->
      <section class="mb-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Description</h2>
        <p class="text-gray-700 leading-relaxed">
          This task involves debugging the login functionality where users experience incorrect password errors despite entering the correct credentials. This issue is critical for user retention.
        </p>
      </section>

      <!-- Bug/Feature Details -->
      <section class="mb-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Additional Details</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <p class="text-sm text-gray-500">Type:</p>
            <p class="text-gray-700 font-medium">Bug</p>
          </div>
          <div>
            <p class="text-sm text-gray-500">Priority:</p>
            <span class="px-2 py-1 bg-red-100 text-red-800 text-sm rounded-full font-medium">High</span>
          </div>
          <div>
            <p class="text-sm text-gray-500">Feature Time Estimate:</p>
            <p class="text-gray-700 font-medium">Not Applicable</p>
          </div>
          <div>
            <p class="text-sm text-gray-500">Bug Description:</p>
            <p class="text-gray-700 font-medium">Users are logged out unexpectedly after login.</p>
          </div>
        </div>
      </section>

      <!-- Actions -->
      <section>
        <h2 class="text-lg font-semibold text-gray-800 mb-2">Actions</h2>
        <div class="flex items-center gap-4">
          <button class="bg-green-500 text-white px-4 py-2 rounded-lg font-medium hover:bg-green-600 focus:ring-2 focus:ring-green-300">
            Mark as Done
          </button>
          <button class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg font-medium hover:bg-gray-400 focus:ring-2 focus:ring-gray-200">
            Edit Task
          </button>
          <button class="bg-red-500 text-white px-4 py-2 rounded-lg font-medium hover:bg-red-600 focus:ring-2 focus:ring-red-300">
            Delete Task
          </button>
        </div>
      </section>
    </div>
  </div>

</body>
</html>
