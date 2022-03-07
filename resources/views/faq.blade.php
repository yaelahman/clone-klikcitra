<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./style.css">

    <title>{{ $settings['judul'] }}</title>
    <style>
        .card-product {
            transition: transform .2s;
        }

        .card-product:hover {
            transform: scale(1.02);
            /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }

        .btn-card {
            width: auto;
            position: absolute;
            margin: 10px;
            border-radius: 0;
            padding: 4px;
            font-size: 14px;
        }

        .btn-hubungi {
            display: none;
            margin-top: -20px;
        }

        .card-product:hover .btn-hubungi {
            display: unset;
        }

        .wabutton {
            position: fixed;
            width: 160px;
            height: 40px;
            bottom: 110px;
            right: 120px;
            /* left: 0; */
            opacity: .9
        }

        .wabutton:hover {
            bottom: 108px;
            opacity: 1
        }

    </style>
</head>

<body style="background-image: url('{{ $settings['background'] }}');  background-position: center;
background-repeat: no-repeat;
background-size: cover;">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top"
        style="background-color: {{ $settings['color_primary'] }};">
        <div class="container">
            <a class="navbar-brand" href="#kontak" style="font-size: 14px"><i
                    class="bi bi-telephone mr-2"></i>&nbsp;Kontak
                Kami</a>
            <span class="navbar-brand" style="font-size: 14px">{{ $settings['navbar_kanan'] }}</span>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-white" style="margin-top: 50px;">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{ route('landing') }}"><i
                                class="bi bi-house-door-fill"></i>&nbsp;Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{ route('landing.faq') }}"><i
                                class="bi bi-patch-question"></i></i>&nbsp;FAQ</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>

    <section id="faq" class="faq my-5" style="min-height: 500px;">
        <div class="container">
            <h2 class="mb-2">FAQ {{ $settings['judul'] }}</h2>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end my-2">
                        <input type="search" id="filterFAQ" class="form-control" placeholder="Cari Sesuatu">
                    </div>
                    <div class="accordion" id="accordionExample">
                        @foreach ($faq as $index => $item)
                            <div class="card card-faq rounded-0"
                                id="{{ strtolower(str_replace(' ', '-', $item->question)) }}">
                                <div class="card-header p-0 rounded-0" id="heading-{{ $index }}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-primary btn-block text-left rounded-0" type="button"
                                            data-toggle="collapse" data-target="#collapse-{{ $index }}"
                                            aria-expanded="true" aria-controls="collapse-{{ $index }}">
                                            {{ $item->question }}
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapse-{{ $index }}" class="collapse"
                                    aria-labelledby="heading-{{ $index }}" data-parent="#accordionExample">
                                    <div class="card-body">
                                        {{ $item->answer }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="kontak" class="kontak mt-5 bg-white" style="min-height: 70px;">
        <div class="container">
            <div class="d-flex justify-content-center py-5">
                <a href="{{ $settings['facebook'] }}" target="blank" title="Temukan kami di Facebook">
                    <img width="170" height="34"
                        src="https://klikcitra.com/wp-content/themes/lapax-2.0.1ad72/images/facebook.jpg">
                </a>
                <a href="{{ $settings['instagram'] }}" target="blank" title="Temukan kami di Instagram">
                    <img width="170" height="34"
                        src="https://klikcitra.com/wp-content/themes/lapax-2.0.1ad72/images/instagram.jpg">
                </a>
            </div>
        </div>
    </section>
    <section id="footerr" class="footerr" style="background-color: {{ $settings['color_primary'] }};">
        <div class="container">
            <div class="d-flex justify-content-center py-5 text-white">
                <h6>{{ $settings['footer'] }}</h6>
            </div>
        </div>
    </section>

    <div class="wabutton">
        <a href="https://api.whatsapp.com/send?phone=62{{ $settings['whatsapp'] }}&amp;text=Halo%20!" target="blank">
            <img src="https://klikcitra.com/wp-content/themes/lapax-2.0.1ad72/images/wa/cs-2.png">
        </a>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        $('#filterFAQ').on('keyup', function(e) {
            let query = $(this).val();
            if (query) {
                query = query.replace(/ /g, "-");
                query = query.toLowerCase();
                $('.card-faq').hide();
                $("[id*=" + query + "]").show();
            } else {
                $('.card-faq').show();
            }
        });
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
