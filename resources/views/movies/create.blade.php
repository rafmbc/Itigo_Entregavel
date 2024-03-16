<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Register a movie</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method='post' action= "{{route('movie.store')}}">
        @csrf
        @method('POST')
        <div>
            <label>Title</label>
            <input type="text" name='title' placeholder="Title"/>
        </div>
        <div>
            <label>Duration</label>
            <input type="number" name='duration' placeholder="Duration"/>
        </div>
        <div>
            <label>Rating</label>
            <input type="number" min="0" max="5" step=0.1 name='rating' placeholder="Rating"/>
        </div>
        <div>
            <input type="submit" value="Save a new movie"/>
        </div>
    </form>
</body>
</html>