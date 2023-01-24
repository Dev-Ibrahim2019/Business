@extends('layouts.dashboard')
@section('title', 'Dashbaord')
@section('breadcrumb')
    @parent
    <span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Home</span>
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-4 col-xl-3">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">Settings</div>
                </div>
                <div class="main-content-left main-content-left-mail card-body pt-0 ">
                    <div class="main-settings-menu">
                        <nav class="nav main-nav-column">
                            <a class="nav-link thumb active mb-2" href="javascript:void(0);"><i class="fe fe-home"></i> Main
                            </a>
                            <a class="nav-link border-top-0 thumb mb-2" href="javascript:void(0);"><i
                                    class="fe fe-grid"></i> Web Apps</a>
                            <a class="nav-link border-top-0 thumb mb-2" href="javascript:void(0);"><i
                                    class="fe fe-server"></i> General</a>
                            <a class="nav-link border-top-0 thumb mb-2" href="javascript:void(0);"><i
                                    class="fe fe-globe"></i> Components</a>
                            <a class="nav-link border-top-0 thumb mb-2" href="javascript:void(0);"><i
                                    class="fe fe-layers"></i> Pages</a>
                            <a class="nav-link border-top-0 thumb mb-2" href="javascript:void(0);"><i
                                    class="fe fe-flag"></i> Language & Region</a>
                            <a class="nav-link border-top-0 thumb mb-2" href="javascript:void(0);"><i
                                    class="fe fe-bell"></i> Notifications</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xl-9">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">Overview</div>
                    <p>Used to customize and manage all settngs about this Dashboard</p>
                </div>
            </div>
        </div>
    </div>
    <!--/ row -->
@endsection
