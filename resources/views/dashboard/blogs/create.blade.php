@extends('layouts.dashboard')
@section('title', 'Create Blogs')
@section('breadcrumb')
    @parent
    <span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Create Blogs</span>
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">Create Blogs</h4>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{ route('dashboard.blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('dashboard.blogs._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

