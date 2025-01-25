<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Sumatera Selatan</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Navbar styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #004d40;
            padding: 1rem;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: bold;
            margin: 0 1rem;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        /* Hero Section styling */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2rem;
            background-color: #e8f5e9;
        }

        .hero-text {
            max-width: 50%;
        }

        .hero-text h1 {
            color: #004d40;
            font-size: 2.5rem;
        }

        .hero-text p {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-top: 1rem;
            color: #333;
        }

        .hero-image img {
            width:  100%;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <!-- Navbar Section -->
    <div class="navbar">
        <!-- Navbar Brand (link to home) -->
        <a href="" style="font-size: 1.5rem; font-weight: bold; color: white;">Sumatera Selatan</a>
        
        <!-- Navbar Links -->
        <div>
            <a href="{{ route('populasi') }}">Populasi</a>
            <a href="{{ route('ekonomi') }}">Ekonomi</a>
            <a href="{{ route('jumlah_restoran') }}">Jumlah Restoran</a>
            <a href="{{ route('jumlah_kejahatan') }}">Jumlah Kejahatan</a>
            <a href="{{ route('beragama_islam') }}">Jumlah Orang Beragama Islam</a>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-text">
            <h1>Profil Provinsi Sumatera Selatan</h1>
            <p>
                Provinsi Sumatera Selatan merupakan salah satu wilayah strategis di Indonesia dengan 
                kekayaan sumber daya alam, budaya, dan potensi ekonomi yang sangat besar. 
                Sebagai provinsi yang memiliki luas wilayah sekitar 91.592,43 km², 
                Sumatera Selatan memiliki karakteristik geografis yang beragam, mulai dari pegunungan, 
                dataran rendah, hingga kawasan perairan yang mencakup sungai-sungai besar seperti Sungai Musi. 
                Keberagaman ini memberikan tantangan sekaligus peluang dalam pengelolaan wilayah dan pembangunan daerah.
            </p>
        </div>
        <div class="hero-image">
            <img src="{{ asset('image/Jembatan_Ampera.jpg') }}" lt="{{ asset('images/Jembatan_Ampera.jpg') }}">
        </div>
    </section>
</body>
</html>
