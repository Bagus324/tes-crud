// script.js
const inputField = document.getElementById('task');
const addButton = document.getElementById('add');
const taskList = document.getElementById('taskList');

// Inside the addButton event listener
addButton.addEventListener('click', () => {
    const taskText = inputField.value.trim();
    if (taskText) {
        const listItem = document.createElement('li');
        listItem.textContent = taskText;

        // Create "Move Up" button
        const moveUpButton = document.createElement('button');
        moveUpButton.textContent = 'Move Up';
        moveUpButton.classList.add('move-up'); // Add the class name
        listItem.appendChild(moveUpButton);

        // Create "Move Down" button
        const moveDownButton = document.createElement('button');
        moveDownButton.textContent = 'Move Down';
        moveDownButton.classList.add('move-down'); // Add the class name
        listItem.appendChild(moveDownButton);

        // Create "Move Down" button
        const activityDate = document.createElement('span');
        activityDate.textContent = getCurrentDate();
        activityDate.classList.add('activity-date'); // Add the class name
        listItem.appendChild(activityDate);

        taskList.appendChild(listItem);
        inputField.value = '';
    }
});

// Function to move a task up
function moveTaskUp(taskItem) {
    const prevItem = taskItem.previousElementSibling;
    if (prevItem) {
        taskList.insertBefore(taskItem, prevItem);
    }
}

// Function to move a task down
function moveTaskDown(taskItem) {
    const nextItem = taskItem.nextElementSibling;
    if (nextItem) {
        taskList.insertBefore(nextItem, taskItem);
    }
}

// Event delegation for task movement buttons
taskList.addEventListener('click', (event) => {
    if (event.target.classList.contains('move-up')) {
        moveTaskUp(event.target.closest('li'));
    } else if (event.target.classList.contains('move-down')) {
        moveTaskDown(event.target.closest('li'));
    }
});

// Function to get the current date in a readable format
function getCurrentDate() {
    const currentDate = new Date();
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return currentDate.toLocaleDateString(undefined, options);
}

