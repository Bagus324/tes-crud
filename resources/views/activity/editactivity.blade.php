<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/new_activity.css')}}">
    <title>Task Form</title>
</head>
<body>
    <h1>Task Details</h1>
    <form action="{{route('editactivity.update', $activity->id)}}" method="POST">
        @method('PUT')
        @csrf
        <label for="taskName">Task Name:</label>
        <input type="text" id="taskName" name="taskName" required value="{{$activity->activities_name}}">
        <br>
        <label for="taskDate">Task Date:</label>
        <input type="date" id="datePicker" name="taskDate" value="{{$activity->activities_date}}" required>
        <br>
        <label for="taskStatus">Task Status:</label>
        <input type="radio" id="inProgress" name="taskStatus" value="incomplete" checked>
        <label for="inProgress">In Progress</label>
        <input type="radio" id="completed" name="taskStatus" value="completed">
        <label for="completed">Completed</label>
        <br>
        <input type="submit" value="Submit Task" id="add">
    </form>
    <script src="{{asset('js/index.js')}}"></script>
</body>
</html>