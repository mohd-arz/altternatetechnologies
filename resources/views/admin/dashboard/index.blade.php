@extends('admin.layout.app')

@section('title', 'Dashboard')
@section('dashboard', 'active')

@section('content')

    <div class="main-content app-content mt-0">
        <div class="side-app">
            <div class="main-container container-fluid">
                <div class="page-header">
                    <h1 class="page-title">Welcome Admin !</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Home</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="mt-2">
                                            <h6 class="">Total Users</h6>
                                            <h2 class="mb-0 number-font">44,278</h2>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="chart-wrapper mt-1">
                                                <canvas id="saleschart" class="h-8 w-9 chart-dropshadow"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-muted fs-12"><span class="text-secondary"><i class="fe fe-arrow-up-circle  text-secondary"></i> 5%</span>
                                        Last week</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
