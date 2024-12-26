<!-- Modal -->
<div id="userModal" class="fixed inset-0 <?php if(isset($_SESSION['user_id'])){echo 'hidden';}else {echo 'flex';} ?> items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-96">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Bienvenue sur TaskFlow</h2>
        <p class="text-gray-600 mb-6">Veuillez entrer votre nom et votre email pour continuer.</p>
        <form id="userForm" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Nom</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required
                />
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required
                />
            </div>
            <div class="flex justify-end">
                <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg"
                >
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
