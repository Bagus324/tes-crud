<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <title>To-Do Application</title>

</head>

<body>
    <!-- Inside the container, we'll add an input field for adding tasks, a list to display the tasks, and buttons for adding and removing tasks. -->
    <form action="{{ route('reload.index') }}" method="post">
    @csrf
    @method('GET')
    <table>
        <caption style="font-weight: bold; font-size: 20px;">To Do List</caption>
        <tr>
            <th>Nama Task</th>
            <th>Tanggal Task</th>
            <th>Action</th>
            <!-- Add more headers as needed -->
        </tr>

        @forelse ($activities as $activity)
        @if($activity->activities_status == 'incomplete')

        <tr>
            <td>{{$activity->activities_name}}</td>
            <input type="hidden" name="all" value="{{$activities}}">
            <td>{{$activity->activities_date}}</td>
            <td>
                <a class="move-up-btn">Move Up</a>
                <a class="move-down-btn">Move Down</a>
                <a href="{{ route('editactivity.show', $activity->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                <a href="{{ route('deleteactivity.show', $activity->id) }}" class="btn btn-sm btn-primary">HAPUS</a>
            </td>
        </tr>
        @endif
        @empty
        @endforelse

        <!-- Add more data cells as needed -->

        <!-- Add more rows as needed -->
    </table>
    <button class="btn btn-sm btn-primary" type="submit">Reload</button>

    </form>
    <br />
    <a href="{{ route('activity.add') }}" class="btn btn-sm btn-primary">Tambah Task Baru</a>
    <br />
    <br />
    <br />
    <table>
        <caption style="font-weight: bold; font-size: 20px;">History Task</caption>
        <tr>
            <th>Nama Task</th>
            <th>Tanggal Task</th>
            <th>Tanggal Task Selesai</th>
            <!-- Add more headers as needed -->
        </tr>

        <br />
        <br />


        @forelse ($activities as $activity)
        @if($activity->activities_status == 'completed')

        <tr>
            <td>{{$activity->activities_name}}</td>
            <td>{{$activity->activities_date}}</td>
            <td>{{$activity->activities_end_time}}</td>
        </tr>
        @endif
        @empty
        @endforelse

        <!-- Add more data cells as needed -->

        <!-- Add more rows as needed -->
    </table>

    <!-- Include your JavaScript file -->
    <script src="{{asset('js/index.js')}}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const moveUpBtns = document.querySelectorAll('.move-up-btn');
            const moveDownBtns = document.querySelectorAll('.move-down-btn');

            moveUpBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const row = this.closest('tr');
                    if (row.previousElementSibling && row.previousElementSibling.querySelector('.move-up-btn')) {
                        row.parentNode.insertBefore(row, row.previousElementSibling);
                    }
                });
            });

            moveDownBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const nextRow = row.nextElementSibling;
                    if (nextRow && nextRow.querySelector('.move-down-btn') && nextRow.nextElementSibling) {
                        row.parentNode.insertBefore(nextRow, row);
                    }
                });
            });
        });
    </script>


</body>

</html>