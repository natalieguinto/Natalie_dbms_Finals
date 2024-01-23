<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><div>
    <h1>Welcome</h1>
        <nav>
            <a href="{{ route('index') }}">Events</a>
            
            <a href="{{ route('show') }}">Participants</a>
        </nav>
    </div>        

    <main>
        <div class="container">
            @yield('content')
        </div>
        
    </main>
