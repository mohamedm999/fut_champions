const positionSelect = document.getElementById('position');
positionSelect.addEventListener('change', function () {
    const goalkeeperStats = document.getElementById('goalkeeperStats');
    const playerStats = document.getElementById('playerStats');

    if (this.value === 'GK') {
        goalkeeperStats.classList.remove('hidden');
        playerStats.classList.add('hidden');
    } else if (this.value) {
        goalkeeperStats.classList.add('hidden');
        playerStats.classList.remove('hidden');
    } else {
        goalkeeperStats.classList.add('hidden');
        playerStats.classList.add('hidden');
    }
});