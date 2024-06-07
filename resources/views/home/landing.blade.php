<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mechanical Service Landing Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            scroll-behavior: smooth;
            color: #333;
            background-color: #f4f4f4;
            /* backcrounf image fixed */
            background: url('https://wallpapers.com/images/hd/garage-background-eo7ejezj0i6lzf7c.jpg') no-repeat center center/cover;
            background-attachment: fixed;
            background-size: cover;
            
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        h1, h2 {
            margin-bottom: 20px;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
            display: inline-block;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        /* Hero Section */
        .hero {
            
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
        }

        .hero-content {
            max-width: 700px;
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        .hero p {
            font-size: 1.5rem;
            margin-bottom: 20px;
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Services Section */
        .services {
            padding: 60px 0;background: url('https://www.shutterstock.com/shutterstock/photos/1764788840/display_1500/stock-vector-gear-blueprint-technical-background-cogs-and-wheels-in-gray-color-abstract-parts-of-engine-1764788840.jpg') no-repeat center center/cover;
            background-attachment: fixed;
            background-size: cover;
            text-align: center;
        }

        .services h2 {
            font-size: 2.5rem;
            margin-bottom: 40px;
        }

        .service-cards {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            
        }

        .service-card {
            background: rgb(253, 248, 248);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            margin: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            text-align: center;
            background: transparent;
            opacity: 1;
            backdrop-filter: blur(5px);
        }

        .service-card:hover {
            transform: translateY(-10px);
        }

        .service-card i {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #007bff;
        }

        .service-card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        /* About Section */
        .about {
            padding: 60px 0;
            background: #f1f1f1;
            text-align: center;
        }

        .about h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .about p {
            font-size: 1.25rem;
        }

        /* Testimonials Section */
        .testimonials {
            padding: 60px 0;
            background: #fff;
        }

        .testimonials h2 {
            font-size: 2.5rem;
            margin-bottom: 40px;
            text-align: center;
        }

        .testimonial-cards {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .testimonial-card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            margin: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            text-align: center;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
        }

        .testimonial-card img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
        }

        .testimonial-card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .testimonial-card p {
            font-size: 1rem;
            font-style: italic;
        }

        

        

        /* Responsive Design */
        @media (max-width: 768px) {
            .service-cards, .testimonial-cards {
                flex-direction: column;
                align-items: center;
            }

            .service-card, .testimonial-card {
                width: 80%;
            }
        }

        

    .footer {
      color: #ffffff;
      padding: 40px 0;
      background:transparent;
      opacity: 1;
      backdrop-filter: blur(5px);
      border-radius: 30px
    }

    .containerfooter {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    .footer-section {
      flex: 1;
      margin: 20px;
      

    }

    .footer-section h3 {
      border-bottom: 2px solid #ffffff;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }

    .footer-section p,
    .footer-section ul {
      margin: 0;
      padding: 0;
      list-style: none;
    }

    .footer-section a {
      color: #ffffff;
      text-decoration: none;
      transition: color 0.3s;
    }

    .footer-section a:hover {
      color: #3498db;
    }

    .footer-bottom {
      text-align: center;
      padding: 20px 0;
      border-top: 1px solid #ecf0f1;
      margin-top: 20px;
    }

    .footer-bottom p {
      margin: 0;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
      .container {
        flex-direction: column;
        text-align: center;
      }

      .footer-section {
        margin: 10px 0;
      }
    }

    .btn2 {
  position: fixed;
  display: inline-block;
  padding: 15px 30px;
  border: 2px solid #fefefe;
  text-transform: uppercase;
  color: #fefefe;
  text-decoration: none;
  font-weight: 600;
  font-size: 20px;
  transition: 0.3s;
  margin-left: 500px;
}

.btn2::before {
  content: '';
  position: absolute;
  top: -2px;
  left: -2px;
  width: calc(100% + 4px);
  height: calc(100% - -2px);
  background-color: #212121;
  transition: 0.3s ease-out;
  transform: scaleY(1);
}

.btn2::after {
  content: '';
  position: absolute;
  top: -2px;
  left: -2px;
  width: calc(100% + 4px);
  height: calc(100% - 50px);
  background-color: #212121;
  transition: 0.3s ease-out;
  transform: scaleY(1);
}

.btn2:hover::before {
  transform: translateY(-25px);
  height: 0;
}

.btn2:hover::after {
  transform: scaleX(0);
  transition-delay: 0.15s;
}

.btn2:hover {
  border: 2px solid #fefefe;
}

.btn2 span {
  position: relative;
  z-index: 3;
}

button {
  text-decoration: none;
  border: none;
  background-color: transparent;
}
    </style>
</head>
<body>
    <button>
        <a href="{{ route('login') }}" class="btn2"><span class="spn2">Login now !</span></a>
      </button>
    <header id="home" class="hero">
        <div class="hero-content">
            <h1>Welcome to Mechanical Services</h1>
            <p>Your one-stop solution for all mechanical needs.</p>
            <a href="#services" class="btn">Learn More</a>
            
        </div>
    </header>

    <section id="services" class="services">
        <div class="container">
            <h2>Our Services</h2>
            <div class="service-cards">
                <div class="service-card">
                    <i class="fas fa-wrench"></i>
                    <h3>Repair</h3>
                    <p>High-quality repair services for all types of vehicles.</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-car"></i>
                    <h3>Maintenance</h3>
                    <p>Regular maintenance to keep your vehicle running smoothly.</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-cogs"></i>
                    <h3>Diagnostics</h3>
                    <p>Advanced diagnostics to identify and fix issues efficiently.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="about">
        <div class="container">
            <h2>About Us</h2>
            <p>We are a team of experienced mechanics dedicated to providing top-notch services. Our goal is to ensure your vehicle is always in optimal condition.</p>
        </div>
    </section>
    
    <footer class="footer">
        <div class="containerfooter">
            <div class="footer-section company-info">
                <h3>@lang('about_us')</h3>
                <p>@lang('about_us_text')</p>
            </div>
            <div class="footer-section quick-links">
                <h3>@lang('quick_links')</h3>
                <ul>
                    <li><a href="#">@lang('home')</a></li>
                    <li><a href="#">@lang('about')</a></li>
                    <li><a href="#">@lang('services')</a></li>
                    <li><a href="#">@lang('contact')</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>@lang('our_services')</h3>
                <ul>
                    <li><a href="#">@lang('mechanical_engineering')</a></li>
                    <li><a href="#">@lang('consulting')</a></li>
                    <li><a href="#">@lang('maintenance')</a></li>
                    <li><a href="#">@lang('repair')</a></li>
                </ul>
            </div>
            <div class="footer-section contact-info">
                <h3>@lang('contact_us')</h3>
                <p>@lang('email'): emgarage@gmail.com</p>
                <p>@lang('phone'): (+212) 618 64 02 96</p>
                <p>@lang('address'): Barbourine Hay DarMoursia Rue n° 3, Tetouan, Morocco</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 @lang('site_name'). @lang('all_rights_reserved').</p>
        </div>
    </footer>
</body>
</html>
