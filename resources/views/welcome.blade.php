<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appoint CMS</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            padding: 20px 0; /* Add spacing */
        }

        .navbar-brand, .nav-link {
            font-weight: bold; /* Make text bold */
            text-decoration: none !important; /* Remove underlining */
            padding: 10px 20px; /* Add padding */
        }

        .carousel-caption {
            bottom: 20px;
        }

        .hero-section {
            margin-top: -20px; /* Negative margin to cover the navbar */
            padding-top: 20px; /* Add padding to the top */
        }

        .section-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 50px;
        }

        .section-content img {
            width: 40%;
            animation: slideInLeft 1s ease-in-out;
        }

        @keyframes slideInLeft {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .section-content .text {
            width: 50%;
            animation: slideInRight 1s ease-in-out;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body class="antialiased">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Appoint System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/home') }}" class="nav-link">Home page</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Log in</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link btn btn-primary">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero section -->
    <div class="hero-section">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://via.placeholder.com/1200x400" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Creativity never goes wrong</h5>
                        <p>All you need is the right direction</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1200x400" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Creativity never goes wrong</h5>
                        <p>All you need is the right direction</p>
                    </div>
                </div>
                <!-- Add more carousel items with different images if needed -->
            </div>
        </div>
    </div>

    <!-- Paragraph section -->
    <div class="container mt-4">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut urna non felis aliquam accumsan. Duis eu lacus nec nisl hendrerit feugiat. Nulla facilisi. Vivamus consectetur libero in mi fermentum, ac fringilla mi sagittis.</p>
    </div>

    <!-- Image and text section -->
    <div class="container section-content">
        <img src="https://via.placeholder.com/400x300" alt="Image" class="img-fluid">
        <div class="text">
            <h2>Section Title</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut urna non felis aliquam accumsan. Duis eu lacus nec nisl hendrerit feugiat. Nulla facilisi. Vivamus consectetur libero in mi fermentum, ac fringilla mi sagittis.</p>
        </div>
    </div>
<!-- Features section -->
<div class="container section-content">
    <div class="text">
        <h2>Why Choose Our Appointment Booking System?</h2>
        <ul>
            <li>User-friendly interface for easy appointment scheduling.</li>
            <li>Customizable booking forms to suit your business needs.</li>
            <li>Multi-platform accessibility for clients and staff.</li>
            <li>Automated reminders and notifications to reduce no-shows.</li>
            <li>Integration with popular calendar applications.</li>
            <li>Secure payment processing for appointments requiring prepayment.</li>
            <li>Comprehensive reporting and analytics tools for tracking appointment metrics.</li>
        </ul>
    </div>
    <img src="https://via.placeholder.com/400x300" alt="Image" class="img-fluid">
</div>
 <!-- Footer -->
 <footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>Contact Us</h4>
                <p>Email: info@appoint.com</p>
                <p>Phone: +1234567890</p>
            </div>
            <div class="col-md-6">
                <h4>Follow Us</h4>
                <ul class="social-icons">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>&copy; 2024 Appoint System. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
