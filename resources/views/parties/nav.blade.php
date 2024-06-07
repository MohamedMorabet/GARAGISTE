<!DOCTYPE html>
<html @if(app()->getLocale() == 'ar') dir="rtl" @endif
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/nav.css')
    <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
</head>
<body>
    
    

    @auth
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    
    <a class="navbar-brand" href="#">
          {{-- <img src="https://images.vexels.com/media/users/3/259080/isolated/preview/52a317c52ff6b8d502b0773d87906a06-llave-de-iconos-de-supervivencia.png" alt="Mechanical Logo" class="rounded-circle" > --}}
          {{-- <img src="https://as1.ftcdn.net/v2/jpg/01/39/37/10/1000_F_139371028_2iYuU4wZDtCZQk1lj3zVEUgRmjrq0G1s.jpg" alt="Mechanical Logo" class="rounded-circle" > --}}
          {{-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4ZIZdyhtf_B-gLQ0hhTbI1DTZiDRhXC-8LA&s" alt="Mechanical Logo" class="rounded-circle" > --}}
          {{-- <img src="https://images.vexels.com/media/users/3/314307/isolated/preview/d67f4ce13d90e7161fce969518e23a27-man-holding-an-adjustable-wrench.png" alt="Mechan/ical Logo" style="width: 60px; height: 55px"> --}}
          {{-- <img src="https://images.vexels.com/media/users/3/314307/isolated/preview/d67f4ce13d90e7161fce969518e23a27-man-holding-an-adjustable-wrench.png" alt="Mechanical Logo" style="width: 60px; height: 55px"> --}}
          {{-- <img src="https://images.vexels.com/media/users/3/350714/isolated/preview/f0697a284bf89111fbfa481151e30da6-wrenches-on-black-background.png" alt="Mechanical Logo" style="width: 60px; height: 55px"> --}}
          {{-- <img src="https://images.vexels.com/media/users/3/331160/isolated/preview/cd3af79afac0b6e745fc1f84338b6a2c-icon-of-a-wrench-on-a-computer-screen.png" alt="Mechanical Logo" style="width: 60px; height: 55px"> --}}
          {{-- <img src="https://images.vexels.com/media/users/3/304544/isolated/preview/5a8a2740d18c51608280ac4e2f50d816-fist-holding-a-wrench-with-stars-in-the-background.png" alt="Mechanical Logo" style="width: 60px; height: 55px"> --}}
          <img src="https://images.vexels.com/media/users/3/314304/isolated/preview/4a3c7dba7e385db25d4be77779b56993-a-hand-grasping-a-wrench.png" alt="Mechan/ical Logo" style="width: 60px; height: 55px">
          {{-- <img src="https://images.vexels.com/media/users/3/304449/isolated/preview/a0bd79977e33945e73863d5e341e3861-cartoon-image-of-a-worker-with-a-wrench.png" alt="Mechanical Logo" style="width: 60px; height: 55px"> --}}
    </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="{{ route('homepage') }}">@lang('Home')</a>
            </li>
            @if (auth()->user()->role == 'admin')
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" aria-expanded="false">
                    @lang('Mechanicals')
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('mechanical_create')}}">@lang('Add Mechanical') </a></li>
                    <li><a class="dropdown-item" href="{{route('mechanicals.index')}}">@lang('View Mechanicals')</a></li>
                </ul>
            </li>
            @endif
            <li class="nav-item">
                  <a class="nav-link" href="{{ route('settings.index') }}">@lang('My profile')</a>
            </li>

            @if (auth()->user()->role == 'admin')
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" aria-expanded="false">
                    @lang('Clients')
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('client_create')}}">@lang('Add Client')</a></li>
                            <li><a class="dropdown-item" href="{{ route('clients.index') }}">@lang('View Clients')</a></li>
                        </ul>
            </li>
            
            <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" aria-expanded="false">
                            @lang('Profiles')
                        </a>
                        <ul class="dropdown-menu" >
                            <li><a class="dropdown-item" href="{{route('profile_create')}}">@lang('Add new Profile')</a></li>
                            <li><a class="dropdown-item" href="{{ route('profiles.index') }}">@lang('View Profiles')</a></li>
                        </ul>
            </li>
            @endif

            
            @if ( auth()->user()->role == 'admin')
            <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" aria-expanded="false">
                            @lang('Cars')
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="clientsDropdown">
                            <li><a class="dropdown-item" href="{{route('car_create')}}">@lang('Add Car')</a></li>
                            <li><a class="dropdown-item" href="{{ route('cars.index') }}">@lang('View Cars')</a></li>
                        </ul>
            </li>
            @endif


            @if (auth()->user()->role == 'client')
            <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" aria-expanded="false">
                            @lang('Cars')
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="clientsDropdown">
                            <li><a class="dropdown-item" href="{{ route('cars.indexclient') }}">@lang('My Cars')</a></li>
                            <li><a class="dropdown-item" href="{{route('car_create')}}">@lang('Add Car')</a></li>
                        </ul>
            </li>
            @endif


            @if (auth()->user()->role == 'admin')
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" aria-expanded="false">
                    @lang('Repairs')
                </a>
                <ul class="dropdown-menu" aria-labelledby="repairsDropdown">
                    {{-- <li><a class="dropdown-item" href="">@lang('Add Repair')</a></li> --}}
                    <li><a class="dropdown-item" href="{{ route('repairs.list') }}">@lang('View Repairs')</a></li>
                </ul>
            </li>
            @endif

            @if (auth()->user()->role == 'mechanical')
            <li class="nav-item dropdown">
                <a class="nav-link" href="{{ route('repairs.list2') }}" role="button" aria-expanded="false">
                    @lang('Repairs')
                </a>
                <ul class="dropdown-menu" aria-labelledby="repairsDropdown">
                    {{-- <li><a class="dropdown-item" href="">@lang('Add Repair')</a></li> --}}
                    <li><a class="dropdown-item" href="{{ route('repairs.list2') }}">@lang('My Repairs')</a></li>
                </ul>
            </li>
            @endif

            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'mechanical')
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" aria-expanded="false">
                    @lang('spareParts')
                </a>
                <ul class="dropdown-menu" aria-labelledby="repairsDropdown">
                    {{-- <li><a class="dropdown-item" href="">@lang('Add Repair')</a></li> --}}
                    <li><a class="dropdown-item" href="{{ route('spareParts.index') }}">@lang('View spareParts')</a></li>
                </ul>
            </li>
            @endif

            @if (auth()->user()->role == 'client')
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" aria-expanded="false">
                    @lang('Repairs')
                </a>
                <ul class="dropdown-menu" aria-labelledby="repairsDropdown">
                    {{-- <li><a class="dropdown-item" href="">@lang('Add Repair')</a></li> --}}
                    <li><a class="dropdown-item" href="{{ route('repairs.listclient') }}">@lang('My Repairs')</a></li>
                </ul>
            </li>
            @endif
              
        </ul>
            
        </div>
            @if (auth()->user()->role == 'mechanical')
            <h6>@lang('mechanical')</h6>
            @elseif (auth()->user()->role == 'client')
            <h6>@lang('client')</h6>
            @elseif (auth()->user()->role == 'admin')
            <h6 style="color: rgb(50, 156, 250)">@lang('admin')</h6>
            @endif
            <span class="user-name" style="color: aqua">{{ auth()->user()->email ?? auth()->user()->name }}
            </span>
            <a class="" href="{{ route('login.logout') }}">
                <button class="Btnout">
  
                    <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
                    
                    <div class="text">Logout</div>
                </button>
                                    
            </a>
        
            
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login.show') }}">@lang('Login')</a>
            </li>
            @endguest
        </div>
    </nav><br><br><br>
    @endauth
</div>

<div class="select-wrapper">
    @auth
    <a href="{{ url()->previous() }}" >
        <button class="buttonback">
            <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
            <span>Back</span>
        </button>
    </a>
    @endauth
    <select class="select-css" id="languageSelect" name="selectLocal">
        <option value="" disabled>@lang('Choose your language')</option>
        <option @if(app()->getLocale() == 'en') selected @endif value="en">en</option>
        <option @if(app()->getLocale() == 'fr') selected @endif value="fr">fr</option>
        <option @if(app()->getLocale() == 'ar') selected @endif value="ar">ar</option>
        <option @if(app()->getLocale() == 'es') selected @endif value="es">es</option>
    </select>
</div>



<script>
    $("#languageSelect").on('change',function(){
          var locale = $(this).val();
  
          window.location.href = "/changeLocale/"+locale;
      })
  
</script>
</body>
</html>