@extends('layouts/app')
@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Banner</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Banner</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <div class="text-end upgrade-btn">
                    <a href="{{ route('banner.index') }}" class="btn btn-success d-none d-md-inline-block text-white">
                        <i class="fas fa-bars"></i>&nbsp;
                        List Banner</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material mx-2" method="post" action="{{ route('banner.store') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-sm-6 mt-3">
                            <div class="form-group mt-3">
                                <div class="col-md-12">
                                    <input type="file" id="image" onchange="preview(1)" name="image" required
                                        class="form-control ps-0 form-control-line">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Urutan</label>
                                <input type="number" name="order" id="order" class="form-control" placeholder="1"
                                    required>
                            </div>
                            <div class="btn-group">
                                <a href="#" class="btn btn-info mt-3 d-none lihat-gambar-1" target="_blank"><i
                                        class="fas fa-eye"></i>&nbsp;Lihat
                                    Gambar</a>
                                &nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="col-sm-12 d-flex">
                            <button class="btn btn-success mx-auto mx-md-0 text-white">Save Banner</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function preview(index) {
            console.log(event.target.files)
            $('.lihat-gambar-' + index).removeClass('d-none')
            $('.lihat-gambar-' + index).attr('href', URL.createObjectURL(event.target.files[0]))
        }

        $('#image').on('change', function(e) {
            console.log(e.target.files[0])
        })
    </script>
@endsection
