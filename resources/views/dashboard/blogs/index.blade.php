@extends('layouts.dashboard')
@section('title', 'Blogs')
@section('breadcrumb')
    @parent
    <span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Blogs</span>
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Blogs List</h3>
                    <div class="d-flex">
                        <a class="btn btn-primary text-light mx-3" href="{{ route('dashboard.blogs.create') }}">Create
                            Blog</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-5p"></th>
                                    <th class="wd-5p">ID</th>
                                    <th class="wd-15p">Title</th>
                                    <th class="wd-20p">Description</th>
                                    <th class="wd-15p">Auther</th>
                                    <th class="wd-15p">Created At</th>
                                    <th class="wd-10p">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($blogs as $blog)
                                    <tr>
                                        <td>
                                            <img src="{{ $blog->image_url }}" alt=""
                                                height="50px" width="70px" class="rounded">
                                        </td>
                                        <td>{{ $blog->id }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ Str::limit($blog->desc, 20) }}</td>
                                        <td>{{ $blog->auther }}</td>
                                        <td>{{ $blog->created_at }}</td>
                                        <td name="bstable-actions">
                                            <div class="btn-list d-flex">
                                                <a id="bEdit"
                                                    href="{{ route('dashboard.blogs.edit', $blog->id) }}"
                                                    class="btn btn-sm btn-primary mx-3">
                                                    <span class="fe fe-edit"> </span>
                                                </a>
                                                {{-- <form action="{{ route('dashboard.blogs.destroy', $blog->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button id="bDel" type="submit" class="btn btn-sm btn-danger">
                                                        <span class="fe fe-trash-2"> </span>
                                                    </button>
                                                </form> --}}
                                                <button id="bDel" onclick="confirmDestroy({{ $blog->id }}, this)" class="btn btn-sm btn-danger">
                                                    <span class="fe fe-trash-2"> </span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="7">No Blogs Defined</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $blogs->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    function confirmDestroy(id, reference) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                destroy(id, reference);
            }
        })
    }

    function destroy(id, reference) {
        axios.delete('/dashboard/blogs/' + id)
            .then(function(response) {
                // handle success
                console.log(response);
                reference.closest('tr').remove();
                showMessage(response.data)
            })
            .catch(function(error) {
                // handle error
                console.log(error);
                showMessage(error.response.data);
            })
            .then(function() {
                // always executed
            });
    }

    function showMessage(data) {
        Swal.fire({
            icon: data.icon,
            title: data.title,
            showConfirmButton: false,
            timer: 1500
        })
    }
</script>
@endpush

