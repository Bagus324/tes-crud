const datePicker = document.getElementById('datePicker');
const taskName = document.getElementById('taskName');
const addButton = document.getElementById('add');

addButton.addEventListener('click', () => {
    console.log(taskName.value.trim());
    console.log(datePicker.value);
});