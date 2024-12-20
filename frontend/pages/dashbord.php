<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUT Builder Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .bg-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            filter: brightness(0.6);
        }
        
        .glass-effect {
            background: rgba(17, 25, 40, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        @keyframes slideIn {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .slide-in {
            animation: slideIn 0.5s ease-out forwards;
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        .active-nav-item {
            background: linear-gradient(to right, #3B82F6, #2563EB);
            border-left: 4px solid #60A5FA;
        }

        .stat-card {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(37, 99, 235, 0.1));
            border: 1px solid rgba(59, 130, 246, 0.2);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(17, 25, 40, 0.7);
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(59, 130, 246, 0.5);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(59, 130, 246, 0.7);
        }

#popupDialog {
    display: none;
    position: fixed;
    top: 35%;
    left: 50%;
    transform: translate(-50%, -50%);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.42);
    z-index: 1000;
    color: #000;
}

#overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 999;
}


    </style>
</head>
<body class="bg-gray-900 font-sans min-h-screen">
    <!-- Background Video -->
    <video class="bg-video" autoplay muted loop playsinline>
        <source src="../src/WhatsApp Video 2024-12-14 at 4.37.25 PM.mp4" type="video/mp4">
    </video>
    <div id="overlay"></div>
    <?php include "../includes/playerForm.php"?>


    <!-- Navbar -->
    <nav class="glass-effect text-white py-4 px-6 sticky top-0 z-50 shadow-lg">
        <div class="container mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <i class="fas fa-futbol text-2xl text-blue-400 hover:text-blue-300 transition-colors duration-300"></i>
                <h1 class="text-xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">
                    FUT Builder Dashboard
                </h1>
            </div>
            <div class="flex items-center space-x-6">
                <div class="relative group">
                    <input type="search" 
                           placeholder="Search..." 
                           class="bg-gray-800/50 text-white pl-10 pr-4 py-2 rounded-lg border border-gray-700/50
                                  focus:outline-none focus:ring-2 focus:ring-blue-500/50 w-64
                                  transition-all duration-300">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="relative group">
                        <img src="../src/admin.jpg" 
                             alt="Profile" 
                             class="w-9 h-9 rounded-lg border-2 border-transparent group-hover:border-blue-400 
                                    transition-all duration-300 object-cover">
                    </div>
                    <span class="font-medium text-gray-200">Admin</span>
                </div>
                <button class="px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 rounded-lg 
                             hover:from-red-600 hover:to-red-700 
                             transition-all duration-300 shadow-lg group">
                    <i class="fas fa-sign-out-alt mr-2 group-hover:translate-x-1 transition-transform"></i>
                    Log Out
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Layout -->
    <div class="flex min-h-[calc(100vh-4rem)] mt-4">
        <!-- Sidebar -->
        <aside class="w-72 glass-effect text-white p-6 m-4 rounded-xl shadow-xl">
            <h2 class="text-xl font-bold mb-6 flex items-center bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">
                <i class="fas fa-cogs mr-2"></i>
                Management
            </h2>
            <ul class="space-y-3">
                <li class="slide-in" style="animation-delay: 0.1s;">
                    <button class="homeButton w-full flex items-center px-4 py-3 rounded-lg transition-all duration-300 hover:bg-blue-600/30">
                        <i class="fas fa-home mr-3"></i>
                        Home
                    </button>
                </li>
                <li class="slide-in" style="animation-delay: 0.2s;">
                    <button class="playerButton w-full flex items-center px-4 py-3 rounded-lg transition-all duration-300 hover:bg-blue-600/30">
                        <i class="fas fa-users mr-3"></i>
                        Player Management
                    </button>
                </li>
                <li class="slide-in" style="animation-delay: 0.3s;">
                    <button class="natButton w-full flex items-center px-4 py-3 rounded-lg transition-all duration-300 hover:bg-blue-600/30">
                        <i class="fas fa-globe mr-3"></i>
                        Nationality Management
                    </button>
                </li>
                <li class="slide-in" style="animation-delay: 0.4s;">
                    <button  class="clubButton w-full flex items-center px-4 py-3 rounded-lg transition-all duration-300 hover:bg-blue-600/30">
                        <i class="fas fa-shield-alt mr-3"></i>
                        Club Management
                    </button>
                </li>
            </ul>

            <!-- Quick Stats -->
            <div class="mt-8 space-y-4">
                <h3 class="text-lg font-semibold mb-4 text-gray-300">Quick Stats</h3>
                <div class="stat-card p-4 rounded-lg">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-300">Total Players</span>
                        <span class="text-blue-400 font-semibold">150</span>
                    </div>
                    <div class="w-full bg-gray-700/50 rounded-full h-2">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-2 rounded-full" style="width: 75%"></div>
                    </div>
                </div>
                <div class="stat-card p-4 rounded-lg">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-300">Active Clubs</span>
                        <span class="text-green-400 font-semibold">20</span>
                    </div>
                    <div class="w-full bg-gray-700/50 rounded-full h-2">
                        <div class="bg-gradient-to-r from-green-500 to-green-600 h-2 rounded-full" style="width: 60%"></div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-4">
            <div class="glass-effect text-white p-6 rounded-xl min-h-full shadow-xl">
                <div class="sectionHome fade-in"><?php include '../includes/sectionHome.php'?></div>
                <div class="sectionPlayer fade-in"><?php include '../includes/sectionPlayer.php'?></div>
                <div class="sectionNat fade-in"></div>
                <div class="sectionClub fade-in"></div>
            </div>
        </main>
    </div>

    <script src="../../frontend/assets/js/main.js"></script>
</body>
</html>