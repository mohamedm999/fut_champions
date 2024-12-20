<div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">Dashboard Overview</h2>
                    <div class="flex space-x-2">
                        <button class="px-4 py-2 bg-blue-600 rounded-lg hover:bg-blue-700 transition duration-300">
                            <i class="fas fa-plus mr-2"></i>Add New
                        </button>
                        <button class="px-4 py-2 bg-gray-700 rounded-lg hover:bg-gray-600 transition duration-300">
                            <i class="fas fa-filter mr-2"></i>Filter
                        </button>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6 rounded-xl">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="text-lg font-semibold">Total Players</h3>
                                <p class="text-3xl font-bold mt-2">150</p>
                            </div>
                            <i class="fas fa-users text-4xl opacity-50"></i>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-green-500 to-green-600 p-6 rounded-xl">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="text-lg font-semibold">Active Clubs</h3>
                                <p class="text-3xl font-bold mt-2">20</p>
                            </div>
                            <i class="fas fa-shield-alt text-4xl opacity-50"></i>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-6 rounded-xl">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="text-lg font-semibold">Nationalities</h3>
                                <p class="text-3xl font-bold mt-2">35</p>
                            </div>
                            <i class="fas fa-globe text-4xl opacity-50"></i>
                        </div>
                    </div>
                </div>

                <!-- Content Area -->
                <div class="bg-gray-800 rounded-xl p-6">
                    <h3 class="text-xl font-semibold mb-4">Recent Activities</h3>
                    <div class="space-y-4">
                        <div class="flex items-center p-4 bg-gray-700 rounded-lg">
                            <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center mr-4">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div>
                                <h4 class="font-medium">New Player Added</h4>
                                <p class="text-gray-400 text-sm">Cristiano Ronaldo was added to the database</p>
                            </div>
                            <span class="ml-auto text-sm text-gray-400">2 hours ago</span>
                        </div>
                        <div class="flex items-center p-4 bg-gray-700 rounded-lg">
                            <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center mr-4">
                                <i class="fas fa-sync"></i>
                            </div>
                            <div>
                                <h4 class="font-medium">Club Updated</h4>
                                <p class="text-gray-400 text-sm">Manchester United information updated</p>
                            </div>
                            <span class="ml-auto text-sm text-gray-400">5 hours ago</span>
                        </div>
                    </div>
                </div>
