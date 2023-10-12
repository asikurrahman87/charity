@extends('backend.master')

@section('title','Manage Blog Category')

@section('body')
    <div class="row py-3">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Manage Blog Category</h3>
                </div>
                <div class="card-body">
                    <span class="text-success" >{{ session('success') }}</span>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogCategories as $blogCategory)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $blogCategory->name }}</td>
                                    <td>{{ $blogCategory->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('blog-categories.edit', $blogCategory->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                        <form action="{{ route('blog-categories.destroy', $blogCategory->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger ms-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
