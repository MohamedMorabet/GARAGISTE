<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@lang('Garage') | {{$title}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
    margin: auto;
    font-family: -apple-system, BlinkMacSystemFont, sans-serif;
    overflow: auto;
    background: linear-gradient(315deg, rgb(209, 199, 229) 3%, rgb(161, 167, 173) 38%, rgb(166, 170, 177) 68%, rgb(211, 233, 211) 98%);
    animation: gradient 15s ease infinite;
    background-size: 400% 400%;
    background-attachment: fixed;
}

@keyframes gradient {
    0% {
        background-position: 0% 0%;
    }
    25% {
        background-position: 25% 25%;
    }
    50% {
        background-position: 100% 100%;
    }
    75% {
        background-position: 75% 75%;
    }
    100% {
        background-position: 0% 0%;
    }
}

.wave {
    background: rgb(255 255 255 / 25%);
    border-radius: 1000% 1000% 0 0;
    position: fixed;
    width: 200%;
    height: 12em;
    animation: wave 10s -3s linear infinite;
    transform: translate3d(0, 0, 0);
    opacity: 0.8;
    bottom: 0;
    left: 0;
    z-index: -1;
}

.wave:nth-of-type(2) {
    bottom: -1.25em;
    animation: wave 18s linear reverse infinite;
    opacity: 0.8;
}

.wave:nth-of-type(3) {
    bottom: -2.5em;
    animation: wave 20s -1s reverse infinite;
    opacity: 0.9;
}

@keyframes wave {
    2% {
        transform: translateX(1);
    }

    15% {
        transform: translateX(-15%);
    }

    25% {
        transform: translateX(-25%);
    }

    35% {
        transform: translateX(-35%);
    }

    50% {
        transform: translateX(-50%);
    }

    60% {
        transform: translateX(-35%);
    }

    75% {
        transform: translateX(-25%);
    }

    85% {
        transform: translateX(-15%);
    }

    100% {
        transform: translateX(1);
    }
}
    </style>
</head>
<style> 
    body {

        /* background-image: url('https://coolbackgrounds.io/images/backgrounds/white/white-trianglify-b79c7e1f.jpg'); */
        /* background-image: url('https://coolbackgrounds.io/images/backgrounds/white/white-triangle-369b8d2d.jpg'); */
        /* background-image: url('https://www.ivins.com/wp-content/uploads/2017/02/bgimg3.jpg'); */
        /* background-image: url('https://www.shutterstock.com/shutterstock/photos/1764788840/display_1500/stock-vector-gear-blueprint-technical-background-cogs-and-wheels-in-gray-color-abstract-parts-of-engine-1764788840.jpg'); */
        /* background-image: url(''); */
        /* background-image: url(''); */
        /* background-size: cover; */
    /* background-position: center; 
    background-repeat: no-repeat;
    background-attachment: fixed; */

    /* background: #f4f7f6;
    background-image: linear-gradient(to right, #e9ecef 1px, transparent 1px), 
                      linear-gradient(to bottom, #e9ecef 1px, transparent 1px);
    background-size: 20px 20px;  */

        /* background-color: #f5f5f5;
        background-image: radial-gradient(circle, #d3d3d3 1px, transparent 1px), radial-gradient(circle, #d3d3d3 1px, transparent 1px);
        background-size: 20px 20px;
        background-position: 0 0, 10px 10px; */
    }

    
</style>
<body>

<nav>
    @include('parties.nav')

</nav>


    <main>
        <div class="container">
            <div class="row my-3">
                @include('parties.flashbags')
            </div>
            {{-- @yield('main') --}} {{-- with layouts --}}

            {{$slot}}                {{-- with component --}}

            
        </div>
    </main>


    @include('parties.footer')

    <div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
     </div>


</body>
</html>