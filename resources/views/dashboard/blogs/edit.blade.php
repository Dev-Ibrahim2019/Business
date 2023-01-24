@extends('layouts.dashboard')
@section('title', 'Edit Blogs')
@section('breadcrumb')
    @parent
    <span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Edit Blogs</span>
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">Edit Blog</h4>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{ route('dashboard.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('dashboard.blogs._form', [
                            'button_label' => 'Update'
                        ])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
