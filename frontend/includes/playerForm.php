
<div id="popupDialog" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4 z-50">
    <div class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-xl shadow-2xl p-6 max-w-3xl w-full max-h-[90vh] overflow-y-auto relative">
        <!-- Close button -->
        <button onclick="closeFn()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div id="response" class="success-message"></div>

        <!-- Player Form -->
        <form id="playerForm" class="space-y-6">
            <h2 class="text-xl font-bold">Add Player</h2>

    <!-- Inputs Row -->
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium">Player Name</label>
            <input type="text" name="nom_player" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
            <span class="error-span text-red-500 text-sm "></span> <!-- Error Message -->
        </div>

        <div>
            <label class="block text-sm font-medium">Position</label>
            <select name="positions" id="position" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                <option value="">Select</option>
                <option value="GK">GK</option>
                <option value="LW">LW</option>
                <option value="RW">RW</option>
                <option value="ST">ST</option>
                <option value="CM">CM</option>
                <option value="LCB">LCB</option>
            </select>
            <span class="error-span text-red-500 text-sm"></span> <!-- Error Message -->
        </div>

        <div>
            <label class="block text-sm font-medium">Club</label>
            <select id="club_id" name="club_select" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                <option value="">Select</option>
                <option value="1">PSG</option>
                <option value="2">Real Madrid</option>
                <option value="3">Bayern Munich</option>
                <option value="4">Man City</option>
                <option value="5">Barcelona</option>
            </select>
            <span class="error-span text-red-500 text-sm "></span> <!-- Error Message -->
        </div>

        <div>
            <label class="block text-sm font-medium">Nationality</label>
            <select id="nationalite_id" name="nationality_select" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                <option value="">Select</option>
                <option value="1">France</option>
                <option value="2">Brazil</option>
                <option value="3">Germany</option>
                <option value="4">Argentina</option>
                <option value="5">Spain</option>
            </select>
            <span class="error-span text-red-500 text-sm "></span> <!-- Error Message -->
        </div>

        <div>
            <label class="block text-sm font-medium">Rating</label>
            <input type="number" name="rating" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
            <span class="error-span text-red-500 text-sm "></span> <!-- Error Message -->
        </div>
    </div>

    <!-- File Inputs -->
    <div class="space-y-4">
        <div>
            <label class="block text-sm font-medium">Flag</label>
            <input type="file" name="flag" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
            <span class="error-span text-red-500 text-sm"></span> <!-- Error Message -->
        </div>
        <div>
            <label class="block text-sm font-medium">Logo</label>
            <input type="file" name="logo" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
            <span class="error-span text-red-500 text-sm"></span> <!-- Error Message -->
        </div>
        <div>
            <label class="block text-sm font-medium">Photo Player</label>
            <input type="file" name="photo_player" class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
            <span class="error-span text-red-500 text-sm"></span> <!-- Error Message -->
        </div>
    </div>


            <!-- Dynamic Stats -->
            <div id="goalkeeperStats" class="hidden space-y-4">
                <h3 class="text-lg font-semibold">Goalkeeper Stats</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium">Diving</label>
                        <input type="number" name="diving" 
                            class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <span class="error-span text-red-500 text-sm"></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Handling</label>
                        <input type="number" name="handling" 
                            class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <span class="error-span text-red-500 text-sm"></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Kicking</label>
                        <input type="number" name="kicking" 
                            class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <span class="error-span text-red-500 text-sm"></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Positioning</label>
                        <input type="number" name="positioning" 
                            class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <span class="error-span text-red-500 text-sm"></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Reflexes</label>
                        <input type="number" name="reflexes" 
                            class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <span class="error-span text-red-500 text-sm"></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Speed</label>
                        <input type="number" name="speed" 
                            class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <span class="error-span text-red-500 text-sm"></span>
                    </div>
                </div>
            </div>

            <div id="playerStats" class="hidden space-y-4">
                <h3 class="text-lg font-semibold">Player Stats</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium">Pace</label>
                        <input type="number" name="pace" 
                            class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <span class="error-span text-red-500 text-sm"></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Shooting</label>
                        <input type="number" name="shooting" 
                            class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <span class="error-span text-red-500 text-sm"></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Passing</label>
                        <input type="number" name="passing" 
                            class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <span class="error-span text-red-500 text-sm"></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Dribbling</label>
                        <input type="number" name="dribbling" 
                            class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <span class="error-span text-red-500 text-sm"></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Defending</label>
                        <input type="number" name="defending" 
                            class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <span class="error-span text-red-500 text-sm"></span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Physical</label>
                        <input type="number" name="physical" 
                            class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <span class="error-span text-red-500 text-sm"></span>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200">
                Add Player
            </button>
        </form>
    </div>
</div>
<script src="../../frontend/assets/js/formplayerToggle.js"></script>
<script> 

    
        document.getElementById("playerForm").addEventListener("submit", function (event) {

            event.preventDefault();

            let spans = document.querySelectorAll(".error-span")
            
            spans.forEach(span => {
                    span.innerText = "";
             });
            
            const formData = new FormData(this);
            
            fetch("../../backend/formProcess.php", {
                method: "POST",
                body: formData
                
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    this.reset();
                } else {

                    if (data.nameplayer) {
                        spans[0].innerText = data.nameplayer;
                    }
                    if (data.positions) { 
                        spans[1].innerText = data.positions;

                    }
                    if (data.club_select) { 
                        spans[2].innerText = data.club_select;

                    }
                    if (data.nationality_select) { 
                        spans[3].innerText = data.nationality_select;

                    }
                    if (data.rating) { 
                        spans[4].innerText = data.rating;

                    }
                    if (data.flag) { 
                        spans[5].innerText = data.flag;

                    }
                    if (data.logo) { 
                        spans[6].innerText = data.logo;

                    }
                    if (data.photo) { 
                        spans[7].innerText = data.photo;

                    }


        const gkStats = ['diving', 'handling', 'kicking', 'positioning', 'reflexes', 'speed'];
        const gkErrorSpans = document.querySelectorAll('#goalkeeperStats .error-span');
        
        const playerStats = ['pace', 'shooting', 'passing', 'dribbling', 'defending', 'physical'];
        const playerErrorSpans = document.querySelectorAll('#playerStats .error-span');
        

        gkStats.forEach((stat, index) => {
            if (data[stat]) {
                gkErrorSpans[index].innerText = data[stat];
            }
        });

        
        playerStats.forEach((stat, index) => {
            if (data[stat]) {
                playerErrorSpans[index].innerText = data[stat];
            }
        });
                    
                }
                    })
            .catch(error => {
                    console.error("Error:", error);
                    document.getElementById("response").innerText = "An error occurred while submitting the form.";
                });
            });




</script>
