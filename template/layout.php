<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        .sticky-sidebar-content {
            position: sticky;
            top: 0;
            /* Pour qu'elle se colle immédiatement au sommet */
            /* Assurez-vous aussi que sa hauteur permet le défilement du contenu */
            height: 100vh;
            /* Pour occuper toute la hauteur de la fenêtre (Viewport Height) */
            overflow-y: auto;
            /* Permet à la sidebar elle-même d'avoir une barre de défilement si son contenu est long */
        }
        .login-container {
            max-width: 400px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background-color: white;
        }
        .login{
            transform: translateX(150px);
        }
    </style>
</head>

<body>
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top">
    <div class="container">
        
        <a class="navbar-brand fw-bold" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-code-slash me-2" viewBox="0 0 16 16">
                <path d="M10.478 1.647a.5.5 0 1 0-.756-.67l-4.5 5a.5.5 0 0 0 0 .67l4.5 5a.5.5 0 0 0 .756-.67L6.685 8l3.793-3.353z"/>
            </svg>
            Portfolio
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#accueil">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#projets">Projets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#competences">Compétences</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#a-propos">À Propos</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-outline-light btn-sm" href="#contact" role="button">Me Contacter</a>
                </li>
            </ul>
        </div>
    </div>
</nav> -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <div class="container d-flex p-3">
        <?= $contentpage ?>
    </div>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>

</html>