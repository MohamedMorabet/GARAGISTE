
    <style>
        .container {
            max-width: 600px;
            margin-top: 50px;
            opacity: 1;
            backdrop-filter: blur(400px);
        }
        .form-group label {
            font-weight: bold;
        }
        .alert ul {
            margin-bottom: 0;
        }
        .typing-indicator {
            width: 60px;
            height: 30px;
            position: relative;
            z-index: 4;
        }

        .typing-circle {
            width: 8px;
            height: 8px;
            position: absolute;
            border-radius: 50%;
            background-color: #000;
            left: 15%;
            transform-origin: 50%;
            animation: typing-circle7124 0.5s alternate infinite ease;
        }

        @keyframes typing-circle7124 {
            0% {
                top: 20px;
                height: 5px;
                border-radius: 50px 50px 25px 25px;
                transform: scaleX(1.7);
            }
            40% {
                height: 8px;
                border-radius: 50%;
                transform: scaleX(1);
            }
            100% {
                top: 0%;
            }
        }

        .typing-circle:nth-child(2) {
            left: 45%;
            animation-delay: 0.2s;
        }

        .typing-circle:nth-child(3) {
            left: auto;
            right: 15%;
            animation-delay: 0.3s;
        }

        .typing-shadow {
            width: 5px;
            height: 4px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.2);
            position: absolute;
            top: 30px;
            transform-origin: 50%;
            z-index: 3;
            left: 15%;
            filter: blur(1px);
            animation: typing-shadow046 0.5s alternate infinite ease;
        }

        @keyframes typing-shadow046 {
            0% {
                transform: scaleX(1.5);
            }
            40% {
                transform: scaleX(1);
                opacity: 0.7;
            }
            100% {
                transform: scaleX(0.2);
                opacity: 0.4;
            }
        }

        .typing-shadow:nth-child(4) {
            left: 45%;
            animation-delay: 0.2s;
        }

        .typing-shadow:nth-child(5) {
            left: auto;
            right: 15%;
            animation-delay: 0.3s;
        }

        /* Additional CSS for full-page overlay */
        .loader-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            display: none; /* Initially hidden */
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .spinner {
 width: 45px;
 height: 45px;
 border-radius: 50%;
 color: #000000;
 background: linear-gradient(currentColor 0 0) center/100% 4px,
          linear-gradient(currentColor 0 0) center/4px 100%,
          radial-gradient(farthest-side,#0000 calc(100% - 7px),currentColor calc(100% - 6px)),
          radial-gradient(circle 7px,currentColor 94%,#0000 0);
 background-repeat: no-repeat;
 animation: spinner-mu2ebf 1s infinite linear;
 position: relative;
}

.spinner::before {
 content: "";
 position: absolute;
 inset: 0;
 border-radius: inherit;
 background: inherit;
 transform: rotate(45deg);
}

@keyframes spinner-mu2ebf {
 to {
  transform: rotate(.5turn);
 }
}
    </style>

    {{auth()->user()->role}}


    <div class="loader-overlay">
        <div class="typing-indicator">
            <div class="typing-circle"></div>
            <div class="typing-circle"></div>
            <div class="typing-circle"></div>
            <div class="typing-shadow"></div>
            <div class="typing-shadow"></div>
            <div class="typing-shadow"></div>
        </div>
    </div>
<div class="container">
    <h1 class="text-center mb-4">My Profile</h1>
    <form action="{{ route('profile.update') }}" method="POST" id="login-form">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
        </div>
        
        <div class="form-group">
            <label for="adress">adress</label>
            <input type="text" class="form-control" id="adress" name="adress" value="{{ old('adress', auth()->user()->adress) }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', auth()->user()->phone) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
        </div>

        
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div class="form-group">
            <label for="role"></label>
            <input type="text" class="form-control" id="role" name="role" value="{{ old('role', auth()->user()->role) }}" required hidden>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
    </form>
</div>


<script>
    document.getElementById('login-form').addEventListener('submit', function() {
        document.querySelector('.loader-overlay').style.display = 'flex';
    });
</script>