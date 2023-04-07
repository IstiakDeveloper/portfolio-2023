@extends('layouts.admin_layout')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">List of Portfolios</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">List of Portfolios</li>
            </ol>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Work Year</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($abouts as $about)
                        <tr>
                            <th scope="row">{{ $about->id }}</th>
                            <td scope="row">{{ $about->title }}</td>
                            <td scope="row">{{ $about->title2 }}</td>
                            <td scope="row">{{ $about->description }}</td>
                            <td scope="row">
                                <img width="100" src="{{ url($about->img) }}" alt="">
                            </td>

                            <td scope="row">
                                <div class="row">
                                    <div class="col-sm-2 ">
                                        <a class="btn btn-primary"
                                            href="{{ route('admin.abouts.edit', $about->id) }}">Edit</a>
                                    </div>

                                    <div class="col-sm-2 mx-2">
                                        <form
                                            action="{{ route('admin.abouts.destroy', $about->id) }}" method="POST">
                                            @csrf
                                            @method('Delete')
                                            <input type="submit" value="delete"  onclick="return confirm('Are you sure?')" class="btn btn-danger">
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="height: 100vh"></div>
        </div>
    </main>
@endsection
