<div class="min-h-screen bg-gradient-to-br from-gray-900 via-slate-900 to-gray-900 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        <!-- Header Section with Stats -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Title and Add Button -->
            <div class="lg:col-span-2 bg-gray-800/50 backdrop-blur-sm rounded-2xl p-8 border border-gray-700/50 shadow-xl">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">Player Management</h2>
                        <p class="text-gray-400 mt-1">Total 24 active players</p>
                    </div>
                    <button onclick="popupFn()" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-medium rounded-lg 
                                hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 shadow-lg shadow-blue-500/20">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Add Player
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl p-6 border border-gray-700/50 shadow-xl">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-blue-500/10">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-400">Average Rating</p>
                        <p class="text-lg font-semibold text-white">84.5</p>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl p-6 border border-gray-700/50 shadow-xl">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-indigo-500/10">
                        <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-400">Total Teams</p>
                        <p class="text-lg font-semibold text-white">8</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filters -->
        <div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-700/50 shadow-xl p-6">
            <div class="grid md:grid-cols-12 gap-6">
                <div class="md:col-span-6 xl:col-span-7">
                    <div class="relative">
                        <input type="text" 
                               placeholder="Search players..." 
                               class="w-full bg-gray-900/50 text-white pl-12 pr-4 py-3 rounded-xl border border-gray-700
                                      focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                                      placeholder-gray-500 transition-all duration-200">
                        <svg class="absolute left-4 top-3.5 h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>

                <div class="md:col-span-6 xl:col-span-5 grid grid-cols-2 gap-4">
                    <select class="appearance-none w-full bg-gray-900/50 text-white px-4 py-3 rounded-xl border border-gray-700
                                 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option>All Positions</option>
                        <option>Forward</option>
                        <option>Midfielder</option>
                        <option>Defender</option>
                        <option>Goalkeeper</option>
                    </select>

                    <select class="appearance-none w-full bg-gray-900/50 text-white px-4 py-3 rounded-xl border border-gray-700
                                 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option>All Teams</option>
                        <option>Team A</option>
                        <option>Team B</option>
                        <option>Team C</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-700/50 shadow-xl overflow-hidden">
            <div class="overflow-x-auto">               
                 <table class="w-full">
                    <thead>
                        <tr class="bg-gray-900/50">
                            <th class="text-left py-4 px-6">
                                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">ID</span>
                            </th>
                            <th class="text-left py-4 px-6">
                                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Player</span>
                            </th>
                            <th class="text-left py-4 px-6">
                                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Position</span>
                            </th>
                            <th class="text-left py-4 px-6">
                                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Team</span>
                            </th>
                            <th class="text-left py-4 px-6">
                                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Rating</span>
                            </th>
                            <th class="text-right py-4 px-6">
                                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700/50">
                        <?php
                        include '../../backend/config.php';
                                  
                        $query = "SELECT p.id,p.nom_player,p.positions,p.rating,club.name_club FROM player p inner join club on (p.club_id = club.id);";
                        $result = mysqli_query($conn, $query);
                
                        while($row = mysqli_fetch_array($result)) {
                            echo "<tr id='row{$row['id']}' class='group hover:bg-gray-700/30 transition-all duration-200'>";
                            echo "<td class='px-6 py-4 text-sm text-gray-400'>#" . $row['id'] . "</td>";
                            echo "<td class='px-6 py-4 text-sm text-white'>" . $row['nom_player'] . "</td>";
                            echo "<td class='px-6 py-4'>
                                    <span class='inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-900/50 text-blue-300 border border-blue-800/50' data-position='{$row['positions']}'>" 
                                    . $row['positions'] . 
                                    "</span>
                                  </td>";
                            echo "<td class='px-6 py-4 text-sm text-white'>" . $row['name_club'] . "</td>";
                            echo "<td class='px-6 py-4'>
                                     <div class='flex items-center'>
                                         <svg class='w-4 h-4 text-yellow-400' fill='currentColor' viewBox='0 0 20 20'>
                                             <path d='M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z'/>
                                         </svg>
                                         <span class='ml-1.5 text-sm font-medium text-white'>" . $row['rating'] . "</span>
                                     </div>
                                 </td>";
                            echo "<td class='px-6 py-4'>
                                    <div class='flex items-center justify-end space-x-3'>
                                        <button class='text-gray-400 hover:text-blue-400 transition-colors duration-200'>
                                            <svg class='h-5 w-5' fill='none' stroke='currentColor' viewBox='0 0 24 24'>
                                                <path stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' 
                                                      d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'/>
                                            </svg>
                                        </button>
                                        <button class='delete-btn' data-id='{$row['id']}' data-position='{$row['positions']}' class='text-gray-400 hover:text-red-400 transition-colors duration-200'>
                                            <svg class='h-5 w-5' fill='none' stroke='currentColor' viewBox='0 0 24 24'>
                                                <path stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' 
                                                      d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'/>
                                            </svg>
                                        </button>
                                    </div>
                                  </td>";
                            echo "</tr>";
                        }
                        
                        mysqli_close($conn);
                        ?>
                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<script>
        
    document.addEventListener('DOMContentLoaded', function () {

    const deleteButtons = document.querySelectorAll('.delete-btn');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {

            const id = this.dataset.id; 
            const position = this.dataset.position;

            if (confirm('Are you sure you want to delete this row?')) {
                fetch('../../backend/deleteplayer.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ id: id, position: position }) 
                })
                .then(response => response.json())
                .then(result => {
                    if (result.status) {
                        document.getElementById('row' + id).remove();
                    } else {
                        alert('Error deleting record: ' + result.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred');
                });
            }
        });
    });
});
</script>