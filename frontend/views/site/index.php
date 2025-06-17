<?php
use yii\helpers\Url;
?>

<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <title>⛪ Kanisa la Kisasa Iziwa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
        .scroll-box {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            background: transparent;
            border: none;
            height: 60px;
            position: relative;
        }

        .scroll-text {
            display: inline-block;
            font-size: 2rem;
            font-weight: bold;
            color: #003366;
            animation: scroll-left 30s linear infinite;
            padding-left: 100%;
        }

        @keyframes scroll-left {
            0% {
                transform: translateX(0%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        body {
            font-family: 'Poppins', 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #e8f0ff, #ffffff);
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
        }

        /* Hero Section */
        .hero {
            position: relative;
            height: 90vh;
            max-width: 100vw;
            overflow: hidden;
            background: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            padding: 0 15px;
        }

        .slider {
            position: relative;
            width: 100%;
            max-width: 1200px;
            height: 90vh;
            overflow: visible;
            perspective: 1500px;
            user-select: none;
        }

        .slide {
            position: absolute;
            width: 100%;
            height: 90vh;
            top: 0;
            left: 0;
            background-size: cover;
            background-position: center;
            border-radius: 20px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.6);
            filter: brightness(1.1);
            backface-visibility: hidden;
            transition: transform 1s ease, opacity 1s ease;
        }

        .slide.hidden {
            opacity: 0;
            pointer-events: none;
            transform: translateX(100%) rotateY(-60deg);
        }

        .slide.active {
            opacity: 1;
            pointer-events: all;
            transform: translateX(0) rotateY(0deg);
            z-index: 10;
        }

        .hero-text {
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translateX(-50%);
            z-index: 20;
            font-weight: 900;
            font-size: 4.5rem;
            color: brown;
            text-shadow: 3px 3px 0 #ffeb3b, 6px 6px 10px #fdd835, 9px 9px 20px #fbc02d;
            letter-spacing: 5px;
            user-select: none;
            pointer-events: none;
        }

        .hero-subtext {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translateX(-50%);
            z-index: 20;
            font-size: 1.8rem;
            font-weight: 600;
            color: #eee;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.7);
            user-select: none;
            pointer-events: none;
        }

        @keyframes pageFlipIn {
            0% {
                transform: rotateY(-90deg);
                opacity: 0;
            }
            100% {
                transform: rotateY(0deg);
                opacity: 1;
            }
        }

        .slide.active {
            animation: pageFlipIn 1s ease forwards;
        }

        .slider-dots {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 15px;
            z-index: 30;
        }

        .dot {
            width: 16px;
            height: 16px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.6);
        }

        .dot.active {
            background-color: #ffd600;
            box-shadow: 0 0 15px #ffd600;
        }

        .section-title {
            text-align: center;
            font-weight: 700;
            margin-bottom: 40px;
            font-size: 2.5rem;
            color: #003366;
            letter-spacing: 1px;
        }

        .dashboard-card {
            border: none;
            border-radius: 20px;
            background: #ffffff;
            box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11),
                        0 1px 3px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            padding: 2rem 1.5rem;
        }

        .dashboard-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 10px 20px rgba(50, 50, 93, 0.2),
                        0 6px 6px rgba(0, 0, 0, 0.15);
        }

        .card-icon {
            font-size: 3.5rem;
            color: #0d6efd;
            margin-bottom: 20px;
            transition: color 0.3s ease;
        }

        .dashboard-card:hover .card-icon {
            color: #ffc107;
        }

        .dashboard-card h5 {
            font-weight: 700;
            font-size: 1.6rem;
            margin-bottom: 10px;
            color: #003366;
        }

        .dashboard-card p {
            font-size: 1rem;
            color: #555;
            margin-bottom: 1.5rem;
            min-height: 65px;
        }

        .dashboard-card a.btn {
            font-weight: 600;
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .dashboard-card a.btn-outline-primary:hover {
            background-color: #0d6efd;
            color: white;
            border-color: #0d6efd;
        }

        .dashboard-card a.btn-outline-success:hover {
            background-color: #198754;
            color: white;
            border-color: #198754;
        }

        .dashboard-card a.btn-outline-info:hover {
            background-color: #0dcaf0;
            color: white;
            border-color: #0dcaf0;
        }

        .quick-links {
            margin-top: 30px;
            text-align: center;
        }

        .quick-links a {
            margin: 0 15px;
            font-size: 2rem;
            color: #0d6efd;
            transition: color 0.3s ease;
        }

        .quick-links a:hover {
            color: #ffc107;
        }

        .footer {
            background: #003366;
            color: white;
            padding: 30px 0;
            text-align: center;
            font-size: 1rem;
            margin-top: 60px;
            user-select: none;
        }

        @media (max-width: 768px) {
            .hero-text {
                font-size: 2.8rem;
                letter-spacing: 3px;
            }
            .hero-subtext {
                font-size: 1.2rem;
            }
            .dashboard-card {
                padding: 1.5rem 1rem;
            }
            .card-icon {
                font-size: 2.8rem;
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>

<!-- HERO SECTION -->
<section class="hero">
    <div class="slider" id="slider">
        <div class="slide active" style="background-image: url('<?= Yii::getAlias("@web") ?>/picha/kanisa1.jpg');"></div>
        <div class="slide hidden" style="background-image: url('<?= Yii::getAlias("@web") ?>/picha/kanisa2.jpg');"></div>
        <div class="slide hidden" style="background-image: url('<?= Yii::getAlias("@web") ?>/picha/kanisa3.jpg');"></div>
        <div class="slide hidden" style="background-image: url('<?= Yii::getAlias("@web") ?>/picha/kanisa4.jpg');"></div>
        <div class="slide hidden" style="background-image: url('<?= Yii::getAlias("@web") ?>/picha/kanisa5.jpg');"></div>
    </div>
    <h1 class="hero-text">Karibu Kanisa la Waadventista Wasabato Iziwa</h1>
    <div class="slider-dots" id="slider-dots">
        <div class="dot active" data-index="0"></div>
        <div class="dot" data-index="1"></div>
        <div class="dot" data-index="2"></div>
        <div class="dot" data-index="3"></div>
        <div class="dot" data-index="4"></div>
    </div>
</section>

<!-- DASHBOARD SECTION -->
<section class="container py-5">
    <div class="scroll-box">
        <div class="scroll-text">📚Dashibodi ya Kanisa la waadventista wa sabato IZIWA-MBEYA,TANZANIA</div>
    </div>
    <div class="row g-4">
        <!-- Matukio -->
        <div class="col-md-4">
            <div class="card dashboard-card h-100 text-center">
                <div class="card-icon"><i class="bi bi-calendar2-check-fill"></i></div>
                <h5>Matukio</h5>
                <p>Ratiba ya mikutano, ubatizo, na shughuli muhimu za kanisa.</p>
                <a href="<?= Url::to(['matukio/index']) ?>" class="btn btn-outline-primary w-100">Fungua</a>
            </div>
        </div>
        <!-- Huduma -->
        <div class="col-md-4">
            <div class="card dashboard-card h-100 text-center">
                <div class="card-icon"><i class="bi bi-heart-pulse-fill"></i></div>
                <h5>Huduma</h5>
                <p>Huduma za vijana, wamama, wanaume, na vikundi mbalimbali.</p>
                <a href="<?= Url::to(['huduma/index']) ?>" class="btn btn-outline-success w-100">Angalia</a>
            </div>
        </div>
        <!-- Matangazo -->
<div class="col-md-4">
    <div class="card dashboard-card h-100 text-center">
        <div class="card-icon"><i class="bi bi-megaphone-fill"></i></div>
        <h5>Matangazo</h5>
        <p>Tangazo rasmi la kanisa linalohusu tukio au taarifa maalum.</p>
        <a href="<?= Url::to(['matangazo/index']) ?>" class="btn btn-outline-primary w-100">Tazama Matangazo</a>
    </div>
</div>

        <!-- Washirika -->
        <div class="col-md-4">
            <div class="card dashboard-card h-100 text-center">
                <div class="card-icon"><i class="bi bi-people-fill"></i></div>
                <h5>Washirika</h5>
                <p>Orodha na taarifa muhimu za washirika wetu wa Iziwa.</p>
                <a href="<?= Url::to(['washirika/index']) ?>" class="btn btn-outline-info w-100">Tazama</a>
            </div>
        </div>
    </div>
</section>

<!-- QUICK LINKS -->
<section class="quick-links">
    <a href="https://255626618171" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
    <a href="https://facebook.com" title="Facebook"><i class="bi bi-facebook"></i></a>
    <a href="https://instagram.com" title="Instagram"><i class="bi bi-instagram"></i></a>
</section>

<!-- FOOTER -->
<footer class="footer">
    &copy; <?= date('Y') ?> Kanisa la Kisasa Iziwa | Imetengenezwa kwa Upendo 💙
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    let currentIndex = 0;
    const totalSlides = slides.length;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
            slide.classList.toggle('hidden', i !== index);
        });
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
        currentIndex = index;
    }

    let slideInterval = setInterval(() => {
        let nextIndex = (currentIndex + 1) % totalSlides;
        showSlide(nextIndex);
    }, 6000);

    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            clearInterval(slideInterval);
            showSlide(parseInt(dot.dataset.index));
            slideInterval = setInterval(() => {
                let nextIndex = (currentIndex + 1) % totalSlides;
                showSlide(nextIndex);
            }, 6000);
        });
    });
</script>

</body>
</html>
