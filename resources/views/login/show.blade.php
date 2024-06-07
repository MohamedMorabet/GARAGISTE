<x-master>
    <x-slot name="title">
        @lang('connect')
    </x-slot>

    <style>
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        .login-form {
            background: transparent;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 400px;
            opacity: 1;
            backdrop-filter: blur(4px);
        }

        .login-heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-heading h2 {
            color: #343a40;
        }

        .form-control {
            border-radius: 5px;
        }

        .login-button {
            border-radius: 5px;
        }

        .imglog {
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
            margin-left: 100px;
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

.custom-checkbox {
  display: inline-flex;
  align-items: center;
  cursor: pointer;
  user-select: none;
  font-size: 16px;
  color: #333;
  transition: color 0.3s;
}

.custom-checkbox input[type="checkbox"] {
  display: none;
}

.custom-checkbox .checkmark {
  width: 24px;
  height: 24px;
  border: 2px solid #333;
  border-radius: 4px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 10px;
  transition: background-color 0.3s, border-color 0.3s, transform 0.3s;
  transform-style: preserve-3d;
}

.custom-checkbox .checkmark::before {
  content: "\2713";
  font-size: 16px;
  color: transparent;
  transition: color 0.3s, transform 0.3s;
}

.custom-checkbox input[type="checkbox"]:checked + .checkmark {
  background-color: #333;
  border-color: #333;
  transform: scale(1.1) rotateZ(360deg) rotateY(360deg);
}

.custom-checkbox input[type="checkbox"]:checked + .checkmark::before {
  color: #fff;
}

.custom-checkbox:hover {
  color: #666;
}

.custom-checkbox:hover .checkmark {
  border-color: #666;
  background-color: #f0f0f0;
  transform: scale(1.05);
}

.custom-checkbox input[type="checkbox"]:focus + .checkmark {
  box-shadow: 0 0 3px 2px rgba(0, 0, 0, 0.2);
  outline: none;
}

.custom-checkbox .checkmark,
.custom-checkbox input[type="checkbox"]:checked + .checkmark {
  transition: background-color 1.3s, border-color 1.3s, color 1.3s, transform 0.3s;
}

.btn {
  /* font-size: 1.2rem; */
  padding: 0.5rem;
  border: none;
  outline: none;
  border-radius: 0.4rem;
  cursor: pointer;
  text-transform: uppercase;
  background-color: rgb(14, 14, 26);
  color: rgb(234, 234, 234);
  font-weight: 700;
  transition: 0.6s;
  box-shadow: 0px 0px 20px #1f4c65;

}
.d-grid {
    padding-top: 10px
}
.btn:active {
  scale: 0.92;
}

.btn:hover {
  background: rgb(2,29,78);
  background: linear-gradient(270deg, rgba(2, 29, 78, 0.681) 0%, rgba(31, 215, 232, 0.873) 60%);
  color: rgb(4, 4, 38);
}
    </style>

    <body>
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

        <div class="login-container">
            <div class="login-form">
                <img src="https://images.vexels.com/media/users/3/304449/isolated/preview/a0bd79977e33945e73863d5e341e3861-cartoon-image-of-a-worker-with-a-wrench.png" alt="" class="imglog">
                <h2 class="text-center text-dark" style="display: flex; font-weight: bold">
                    <div class="spinner"></div> &nbsp;&nbsp;
                    @lang('welcome_back') 
                </h2>
                <div class="login-heading"></div>
                <form id="login-form" action={{ route('login') }} method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="email" class="form-control" name="login" placeholder="@lang('login')" value="{{ old('login') }}" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="@lang('password')" required value="123456789">
                    </div>
                    @error('login')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    <label class="custom-checkbox">
                        <input type="checkbox" name="remember" id="remember">
                        <span class="checkmark"></span>
                    </label> remember me <br>
                      
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">@lang('sign_in')</button>
                    </div>
                    <br>
                </form>
                <div class="text-center">
                    <a href="{{ route('forget.password.get') }}">@lang('forgot_password')</a>
                </div>
                <div class="text-center mt-3">
                    <p>@lang('no_account') <a href={{ route('profile_create') }}>@lang('sign_up')</a></p>
                </div>
                  
            </div>
        </div>
        <br><br>
        <div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
        </div>

        <script>
            document.getElementById('login-form').addEventListener('submit', function() {
                document.querySelector('.loader-overlay').style.display = 'flex';
            });
        </script>
    </body>
</x-master>