<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Movie</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        <div>
            <a href="{{route('movie.create')}}">Create a Movie</a>
        </div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th>DURATION</th>
                <th>RATING</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($movies as $movie)
                <tr>
                    <td>{{$movie->id}}</td>
                    <td>{{$movie->title}}</td>
                    <td>{{$movie->duration}}</td>
                    <td>{{$movie->rating}}</td>
                    <td>
                        <a href="{{route('movie.edit', ['movie' => $movie])}}">Edit</a>
                    </td>
                    <td>
                        <form method='post' action = "{{route('movie.destroy', ['movie' => $movie])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>