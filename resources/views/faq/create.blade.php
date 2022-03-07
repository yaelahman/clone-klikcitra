@extends('layouts/app')
@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">FAQ</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <div class="text-end upgrade-btn">
                    <a href="{{ route('faq.index') }}" class="btn btn-success d-none d-md-inline-block text-white">
                        <i class="fas fa-bars"></i>&nbsp;
                        List FAQ</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material mx-2" method="post" action="{{ route('faq.store') }}">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Pertanyaan</label>
                        <div class="col-md-12">
                            <textarea name="question" id="question" cols="30" rows="10" required
                                class="form-control ps-0 form-control-line" placeholder="Pertanyaan ?"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 mb-0">Jawaban</label>
                        <div class="col-md-12">
                            <textarea name="answer" id="answer" cols="30" rows="10" required
                                class="form-control ps-0 form-control-line" placeholder="Jawaban..."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 d-flex">
                            <button class="btn btn-success mx-auto mx-md-0 text-white">Save FAQ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
