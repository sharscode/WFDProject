<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WFD Project</title>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Tags Input CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">

    <!-- Bootstrap Tags Input JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <style>
        /* Di file CSS atau di tag <style> di view */
        #eventTable tbody tr {
            cursor: pointer;
        }
        #eventTable tbody tr:hover {
            background-color: #f5f5f5; /* Atau warna lain yang sesuai */
        }
        .bootstrap-tagsinput {
            display: block !important; 
            width: 100% !important;
            padding: 0.375rem 0.75rem !important;
            font-size: 1rem !important;
            line-height: 1.5 !important;
            background-color: #fff !important; /* Latar belakang putih */
            border: 1px solid #ced4da !important; /* Warna border seperti input Bootstrap */
            border-radius: 0.25rem !important;
            color: #495057 !important; /* Warna teks */
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075) !important;
        }

        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #fff; /* Warna teks tag */
            background-color: #0d6efd; /* Warna biru (sesuai Bootstrap 5) */
            border-radius: 0.2rem;
            padding: 0.2rem 0.5rem;
            display: inline-block;
        }

        .bootstrap-tagsinput input {
            border: none;
            outline: none;
            background: transparent; /* Hilangkan background pada input */
            box-shadow: none;
            margin: 0;
            width: auto;
            max-width: inherit;
        }

    </style>
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">WFD Project</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('events.card') }}">Events</a> 
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Master Data
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('organizers.index') }}">Master Organizer</a></li>
                        <li><a class="dropdown-item" href="{{ route('event_categories.index') }}">Master Event Category</a></li>
                        <li><a class="dropdown-item" href="{{ route('events.index') }}">Master Event</a></li> 
                    </ul>
                </li>
            </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5">
        @yield('content')
    </main>

    <footer class="bg-light py-3 mt-5">
        <div class="container text-center">
            <p>&copy; 2024 (Sharon) WFD Project</p>
        </div>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>