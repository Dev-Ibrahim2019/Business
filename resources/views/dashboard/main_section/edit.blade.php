@extends('layouts.dashboard')
@section('title', 'Main Section')
@section('breadcrumb')
    @parent
    <span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Main Section</span>
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">Home</h4>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{ route('dashboard.home.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <x-form.input label="Title" type="text" name="title" id="title" :value="$home->title ?? '' " />
                        </div>
                        <div class="form-group">
                            <x-form.textarea label="Description" name="desc" id="desc" :value="$home->desc ?? '' " />
                        </div>
                        <div class="form-group">
                            <x-form.label id="image">Image</x-form.label>
                            <x-form.input type="file" name="image" id="image" accept="image/*" />
                            {{-- @if ($home->image)
                                <img src="{{ $home->image_url }}" alt="" width="100" height="100" class="m-3">
                            @endif --}}
                        </div>
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--
@extends('layouts.dashboard')
@section('title', 'About Us')
@section('breadcrumb')
    @parent
    <span class="text-muted mt-1 tx-13 ms-2 mb-0">/ About Page</span>
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">About Us</h4>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{ route('dashboard.about.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <x-form.input label="Title" type="text" name="title" id="title" :value="$about->title ?? '' " />
                        </div>
                        <div class="form-group">
                            <x-form.textarea label="Who We Are?!" name="about" id="about" :value="$about->about ?? '' " />
                        </div>
                        <div class="form-group">
                            <x-form.textarea label="Vision" name="vision" id="vision" :value="$about->vision ?? '' "  />
                        </div>
                        <div class="form-group">
                            <x-form.textarea label="History" name="history" id="history" :value="$about->history ?? ''" />
                        </div>
                        <div class="form-group">
                            <x-form.label id="image">About Image</x-form.label>
                            <x-form.input type="file" name="image" id="image" accept="image/*" />
                            {{-- @if ($about->image)
                                <img src="{{ $about->image_url }}" alt="" width="100" height="100"
                                    class="m-3">
                            @endif --}}
                        {{-- </div>
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection --}} 
