<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-yEPZ7jP9S0QKiUQ0m3jjsO4ProIW7wvR9gXkI7JOGa2XVsw53Yke2bsdkBbjmmiX" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/facor.css') }}">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">
    <title>Distribuidora FACOR</title>
</head>
<body>
    <header>
    @if (Route::has('login'))
        <nav class="navbar">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo FACOR" width="190" height="55">
            </a>
            <div class="nav-links">
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        </nav>
    @endif
</header>  
    <main>
        <div id="main text" class="container mt-4">
            <h4 class="text-center mt-4">Distribuidora Autorizada • Importadora FACOR</h4>
            <h1 class="text-center mt-4">Bienvenido a Importadora FACOR</h1>
            <div class="line"></div>
            <p class="text-center">Importadora FACOR es una empresa dedicada a la distribución de productos de alta calidad para satisfacer las necesidades de nuestros clientes.</p>
            <a class="btn" href="#catalogo">Ver catálogo</a>
            <a class="btn alt" href="https://wa.me/50242140008?text=Hola,%20quiero%20información" target="_blank">Escríbenos</a>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/ScanzoDiamond.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/ScanzoMT.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/ScanzoOrtho.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/ScanzoSpace.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </main>
    <section id="catalogo" class="container mt-4">
        <h2 class="text-center">Catálogo de Productos</h2>
        <div class="line"></div>
        <div id="allcards" class="row mt-4">
            <div class="card" style="width: 20rem;">
                <img src="{{ asset('images/RM.png') }}" class="card-img-top" alt="RM image">
                <div class="card-body">
                    <h5 class="card-title">Rest Master</h5>
                    <p class="card-text">Colchón de doble cara con dos niveles de confort. Disfruta de un lado más suave para un descanso renovador y otro más firme para mayor soporte y estabilidad durante la noche.</p>
                </div>
            </div>
            <div class="card" style="width: 20rem;">
                <img src="{{ asset('images/MasterTech.png') }}" class="card-img-top" alt="Master Technology image">
                <div class="card-body">
                    <h5 class="card-title">Master Technology</h5>
                    <p class="card-text">Diseñado con tela importada Cool Max, fresca y suave al tacto. Combina elegancia y confort gracias a sus dos niveles de firmeza, adaptándose a diferentes preferencias de descanso.</p>
                </div>
            </div>
            <div class="card" style="width: 20rem;">
                <img src="{{ asset('images/DobleP.png') }}" class="card-img-top" alt="Caprilux Doble Pillow image">
                <div class="card-body">
                    <h5 class="card-title">Caprilux Doble Pillow</h5>
                    <p class="card-text">Un colchón cómodo y resistente con doble pillow, resortes Bonnell y esquinas reforzadas. Su estructura brinda soporte uniforme y una agradable sensación de confort diario.</p>
                </div>
            </div>
            <div class="card" style="width: 20rem;">
                <img src="{{ asset('images/LuxOrtho.png') }}" class="card-img-top" alt="Caprilux Ortho image">
                <div class="card-body">
                    <h5 class="card-title">Caprilux Ortho</h5>
                    <p class="card-text">Modelo semi rígido con resortes Bonnell y esquinas reforzadas, ideal para quienes buscan un descanso firme y un excelente soporte para la espalda.</p>
                </div>
            </div>
            <div class="card" style="width: 20rem;">
                <img src="{{ asset('images/Oslo.png') }}" class="card-img-top" alt="Sala Oslo image">
                <div class="card-body">
                    <h5 class="card-title">Sala Oslo</h5>
                    <p class="card-text">La Sala Oslo combina diseño moderno y comodidad en un formato ideal para el hogar. Cuenta con dimensiones de 2.60 m × 1.56 m, altura de 0.72 m y fondo de 0.85 m.</p>
                </div>
            </div>
            <div class="card" style="width: 20rem;">
                <img src="{{ asset('images/Vancouver.png') }}" class="card-img-top" alt="Sala Vancouver image">
                <div class="card-body">
                    <h5 class="card-title">Sala Vancouver</h5>
                    <p class="card-text">La Sala Vancouver está compuesta por tres módulos que brindan amplitud y versatilidad. Con una altura de 0.96 m y fondo de 0.80 m, es una excelente opción para espacios familiares y acogedores.</p>
                </div>
            </div>
            <div class="card" style="width: 20rem;">
                <img src="{{ asset('images/Michigan.png') }}" class="card-img-top" alt="Sala Michigan image">
                <div class="card-body">
                    <h5 class="card-title">Sala Michigan</h5>
                    <p class="card-text">La Sala Michigan ofrece un equilibrio perfecto entre estilo y confort. Sus dimensiones de 2.55 m × 2.47 m permiten aprovechar el espacio sin renunciar a la comodidad.</p>
                </div>
            </div>
            <div class="card" style="width: 20rem;">
                <img src="{{ asset('images/SalaViena.png') }}" class="card-img-top" alt="Sala Viena image">
                <div class="card-body">
                    <h5 class="card-title">Sala Viena</h5>
                    <p class="card-text">La Sala Viena destaca por su elegancia y amplitud. Con medidas de 3.00 m × 2.15 m, es ideal para quienes buscan una sala espaciosa y con presencia.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="why" id="nosotros">
        <h2>¿Por qué elegirnos?</h2>
        <div class="line"></div>
            <div class="mision">
                <div class="feats">
                    <b>Calidad premium</b>
                    Telas resistentes y acabados de primera, para garantizar el mejor sueño.
                </div>
                <div class="price">
                    <b>Precios de distribuidor</b>
                    Para clientes finales y mayoristas.
                </div>
                <div class="design">
                    <b>Diseños modernos</b>
                    Modulares y 3-2-1 para cada espacio.
                </div>
                <div class="atencion">
                    <b>Atención directa</b>
                    Cotiza rápido por WhatsApp.
            </div>
        </div>
        </div>
    </section>
    <section id="contacto">
        <h2>Contáctanos</h2>
        <div class="line"></div>
        <div class="contact">
            <div class="contactwa">
                <h3>WhatsApp</h3>
                <a href="https://wa.me/50242140008" target="_blank">+(502) 4214-0008</a>
            </div>
            <div class="contacttel">
                <h3>Teléfono</h3>
                <a href="tel:+50242140008">+(502) 4214-0008</a>
            </div>
            <div class="contactdir">
                <h3>Dirección</h3>
                33 Avenida, 5ta Calle, Zona 12<br>Guatemala, Guatemala
            </div>
        </div>
        <div class="social">
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
        </div>
    </section>
    <footer>© 2026 Muebles Primiun · Distribuidora de FACOR Importadora · Guatemala</footer>
    <a class="wa" href="https://wa.me/50242140008" target="_blank" aria-label="WhatsApp">✆</a>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.9/dist/js/bootstrap.bundle.min.js" integrity="sha384-WyOxWvTyr1QaMPfiPJSv76iReVthorl5uWlFtZPyK0IEB0hGzo9y5Bp9mYanr8Bu" crossorigin="anonymous"></script>
</html>