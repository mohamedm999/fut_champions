function toggleSection(sectionName) {
    const sections = ['sectionHome', 'sectionPlayer', 'sectionNat', 'sectionClub'];
    const buttons = document.querySelectorAll('aside button');
    
    // Hide all sections and remove active states
    sections.forEach(section => {
        document.querySelector(`.${section}`).classList.add('hidden');
    });
    buttons.forEach(button => {
        button.classList.remove('active-nav-item');
    });
    
    // Show selected section and set active state
    document.querySelector(`.${sectionName}`).classList.remove('hidden');
    document.querySelector(`.${sectionName.replace('section', '').toLowerCase()}Button`)
            .classList.add('active-nav-item');
}

// Initial setup
document.addEventListener('DOMContentLoaded', () => {
    toggleSection('sectionHome');
});

// Event listeners
document.querySelector('.homeButton').addEventListener('click', () => toggleSection('sectionHome'));
document.querySelector('.playerButton').addEventListener('click', () => toggleSection('sectionPlayer'));
document.querySelector('.natButton').addEventListener('click', () => toggleSection('sectionNat'));
document.querySelector('.clubButton').addEventListener('click', () => toggleSection('sectionClub'));

function popupFn() {
    document.getElementById(
        "overlay"
    ).style.display = "block";
    document.getElementById(
        "popupDialog"
    ).style.display = "block";
}
function closeFn() {
    document.getElementById(
        "overlay"
    ).style.display = "none";
    document.getElementById(
        "popupDialog"
    ).style.display = "none";
}


