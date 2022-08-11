<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Alten</title>
        @livewireStyles
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="{{route('cards.index')}}">Cartes</a></li>
                    <li><a href="{{Route('devices.index')}}">Devices</a></li>
                </ul>
            </nav>
        </header>
        <main>
            @yield('contenu')
        </main>
    </body>
    @livewireScripts
</html>