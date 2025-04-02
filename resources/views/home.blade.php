<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Barra de navegación superior -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Mi Aplicación</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mapPage') }}">Mapas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Formulario para cargar archivo TXT -->
    <div class="container mt-5">
        <h1 class="text-center">Cargar Archivo TXT</h1>
        <form action="{{ route('uploadFile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="txtFile" class="form-label">Seleccionar archivo TXT</label>
                <input type="file" class="form-control" id="txtFile" name="txtFile" accept=".txt">
            </div>
            <button type="submit" class="btn btn-primary">Cargar Archivo</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
