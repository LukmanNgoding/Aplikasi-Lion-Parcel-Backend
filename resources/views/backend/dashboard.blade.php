@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Beranda</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content" style="color: white;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-4">
                        <div class="small-box shadow bg-dark">
                            <div class="inner">
                                <h3>{{ $member }}</h3>
                                <p>Total Member</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users" style="color: white;"></i>
                            </div>
                            <a style="background-color: #ff0000; color: black;" href="{{ route('backend.member') }}" class="small-box-footer">Baca selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4">
                        <div class="small-box shadow bg-dark">
                            <div class="inner">
                                <h3>{{ $paket }}</h3>
                                <p>Total Paket</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-box-open" style="color: white;"></i>
                            </div>
                            <a style="background-color: #ff0000; color: black;" href="{{ route('backend.paket') }}" class="small-box-footer">Baca selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-4">
                        <div class="small-box shadow bg-dark">
                            <div class="inner">
                                <h3>{{ $paket }}</h3>
                                <p>Total Notifikasi</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-bell" style="color: white;"></i>
                            </div>
                            <a style="background-color: #ff0000; color: black;" href="{{ route('backend.paket') }}" class="small-box-footer">Baca selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
