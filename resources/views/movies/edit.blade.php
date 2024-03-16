<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit a movie</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('movie.update', ['movie' => $movie])}}">
        @csrf
        @method('PUT')
        <div>
            <label>Title</label>
            <input type="text" name='title' placeholder="Title" value="{{$movie->title}}"/>
        </div>
        <div>
            <label>Duration</label>
            <input type="number" name='duration' placeholder="Duration" value = "{{$movie->duration}}" />
        </div>
        <div>
            <label>Rating</label>
            <input type="number" min="0" max="5" step=0.1 name='rating' placeholder="Rating" value = "{{$movie->rating}}"/>
        </div>
        <div>
            <input type="submit" value="Update Movie"/>
        </div>
    </form>
</body>
</html>