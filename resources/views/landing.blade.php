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

<body style="background-color: #F5F5F5;">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #08044C;">
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
                    <li class="nav-item active">
                        <a class="nav-link text-uppercase" href="{{ route('landing') }}"><i
                                class="bi bi-house-door-fill"></i>&nbsp;Beranda</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
    <div class="py-3" style="background-color: #F78009;height: auto;">
        <div class="container">
            @if (Session::has('alert'))
                <div class="alert alert-{{ Session::get('alert') }}" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-sm mb-2">
                    <h2 class="mb-0">{{ $settings['judul'] }}</h2>
                    <span class="mt-0 pt-0">{{ $settings['sub_judul'] }}</span>
                </div>
                <div class="col-sm">
                    <div class="bg-white px-3 py-3">
                        <div class="row">
                            <div class="col pr-1">
                                <input type="text" id="filterProduct" class="form-control border-0"
                                    placeholder="Ketik kata kunci pencarian">
                            </div>
                            <div class="col pl-0 border-left">
                                <select name="" id="" class="form-control rounded-0 border-0 select-category">
                                    <option value="" selected disabled>-- Pilih Kategori --</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-5">
                    <select class="border-0 py-2 text-white px-3 select-category"
                        style="background-color: #08044C; width: 320px;">
                        <option value="" selected disabled>SEMUA KATEGORI PRODUK</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm w-100 bg-white py-2 mx-3 text-center" style="font-size: 14px;">
                    <i class="bi bi-clock"></i>&nbsp;&nbsp;{{ $settings['open_order'] }}
                </div>
            </div>
            <div class="row py-1 text-white px-3 mx-0" style="background-color: #08044C; margin-left: 0px;">
                <marquee behavior="" direction="">{{ $settings['text_marquee'] }}</marquee>
            </div>
            <div class="row bg-white ml-0 py-3 px-3 mx-0">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($banners as $index => $item)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/banners/' . $item->image) }}" class="d-block w-100"
                                    alt="...">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls"
                        data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls"
                        data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <section id="produk" class="produk my-5" style="min-height: 500px;">
        @if ($detail)
            <div class="container">
                <div class="text-left mb-4 border-bottom">
                    <h4>{{ $product->name }}</h4>
                </div>
                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col mb-4">
                        <div id="productCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($product->ImageAll as $index => $item)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/products/' . $item->image) }}"
                                            class="d-block w-100" alt="...">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-target="#productCarousel"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-target="#productCarousel"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <h6>Deskripsi Produk</h6>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
                <button class="btn btn-dark w-100 btn-order" data-toggle="modal" data-target="#quikOrderModal"
                    data-id="{{ $item->id }}" data-whatsapp="{{ $product->whatsapp }}"
                    data-name="{{ $product->name }}" data-image="{{ $product->Image->image }}"><i
                        class="bi bi-bag-check"></i> ORDER SEKARANG</button>
            </div>
        @else
            <div class="container">
                <div class="text-center mb-4 border-bottom">
                    <h4>{{ count($products) < 1 ? 'Produk Tidak Ditemukan' : 'Produk' }}</h4>
                </div>
                <div class="row row-cols-2 row-cols-md-4">
                    @foreach ($products as $index => $item)
                        <div class="col mb-4 row-product" id="{{ strtolower(str_replace(' ', '-', $item->name)) }}">
                            <div class="card h-100 card-product">
                                <button class="btn btn-light btn-card btn-order" data-toggle="modal"
                                    data-target="#quikOrderModal" data-id="{{ $item->id }}"
                                    data-whatsapp="{{ $item->whatsapp }}" data-name="{{ $item->name }}"
                                    data-image="{{ $item->Image->image }}">
                                    <i class="bi bi-send-check-fill"></i>&nbsp;
                                    Quick Order
                                </button>
                                <img src="{{ asset('storage/products/' . $item->Image->image) }}" width="200px"
                                    height="200px" class="card-img-top image-product" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $item->name }}</h5>
                                    <p class="card-text text-center mb-0 pb-0">*Harga hubungi CS</p>
                                    <p class="card-text text-center mt-0 text-success"><i class="bi bi-check"></i>
                                        Ready
                                        Stock
                                    </p>
                                </div>
                                <div class="card-footer p-0">
                                    <button class="btn btn-primary w-100 rounded-0 btn-hubungi btn-order"
                                        data-toggle="modal" data-target="#quikOrderModal" data-id="{{ $item->id }}"
                                        data-whatsapp="{{ $item->whatsapp }}" data-name="{{ $item->name }}"
                                        data-image="{{ $item->Image->image }}">Hubungi
                                        Kami</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>
    <div class="modal fade" id="quikOrderModal" tabindex="-1" aria-labelledby="quikOrderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="quikOrderModalLabel">Nama Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row row-cols-2 row-cols-md-">
                        <div class="col">
                            <img src="#" height="250px" width="250px" class="imageee img-thumbnail">
                        </div>
                        <div class="col">
                            <a href="#" class="whatsapp btn btn-success w-100 mb-2" target="_blank">
                                <i class="bi bi-whatsapp"></i> Whatsapp
                            </a>
                            <a href="#" class="detail btn btn-dark w-100">
                                <i class="bi bi-eye-fill"></i> Lihat Detail Produk
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <section id="footerr" class="footerr" style="background-color: #08044C;">
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
        $('.btn-order').on('click', function() {
            var id = $(this).attr('data-id')
            var whatsapp = $(this).attr('data-whatsapp')
            var image = $(this).attr('data-image')
            var name = $(this).attr('data-name')

            $('.whatsapp').attr('href', 'http://wa.me/62' + whatsapp)
            $('.detail').attr('href', "{{ url('detail') }}/" + id)
            $('.imageee').attr('src', "{{ asset('storage/products') }}/" + image)
            $('.modal-title').html(name)
        })

        $('.select-category').on('change', function() {
            window.location.href = "{{ url('') }}?category=" + $(this).val()
        })



        $('#filterProduct').on('keyup', function(e) {
            let query = $(this).val();
            if (query) {
                query = query.replace(/ /g, "-");
                query = query.toLowerCase();
                $('.row-product').hide();
                $("[id*=" + query + "]").show();
            } else {
                $('.row-product').show();
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
