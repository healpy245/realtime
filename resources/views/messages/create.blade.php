<script> import Echo from 'laravel-echo';
    import Pusher from 'pusher-js';
    window.Pusher = Pusher;
    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: 'cbefd2bcb20dc0d87870',
        cluster: 'ap2',
    });
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create Message</h1>
    <form action="{{ route('messages.store') }}" method="post">
        @csrf
        <input type="text" name="message" placeholder="Message">
        <button type="submit">Send</button>
    </form>
    
</body>
</html>

