// scripts.js

document.addEventListener('DOMContentLoaded', () => {
    // Function to display an alert when a student is clicked
    const studentElements = document.querySelectorAll('.student');

    studentElements.forEach(student => {
        student.addEventListener('click', () => {
            const studentName = student.querySelector('.student-name').textContent;
            alert(`You clicked on ${studentName}`);
        });
    });

    // Example: A button to reset the battle log
    const resetButton = document.getElementById('reset-battle-log');
    
    if (resetButton) {
        resetButton.addEventListener('click', () => {
            const battleLog = document.getElementById('battle-log');
            battleLog.innerHTML = ''; // Clear the battle log
            alert('Battle log has been reset!');
        });
    }
});
