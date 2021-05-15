<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create Post</h1>

    <form action="" method="post">

        <select name="channel_id" id="channel_id">
            @foreach ($channels as $channel)
                <option value="{{$channel->id}}">{{$channel->name}}</option>
            @endforeach
        </select>
    </form>
</body>
</html>
