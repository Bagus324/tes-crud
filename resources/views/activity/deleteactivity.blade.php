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
    <form action="{{route('deleteactivity.destroy', $activity->id)}}" method="POST">
        @method('DELETE')
        @csrf
        <label for="taskName">Task Name:</label>
        <input type="text" id="taskName" name="taskName" required value="{{$activity->activities_name}}">
            <br>
        <input type="submit" value="Hapus" id="add">
    </form>
    <script src="{{asset('js/index.js')}}"></script>
</body>
</html>
