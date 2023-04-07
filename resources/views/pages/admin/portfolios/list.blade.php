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
                        <th scope="col">Title</th>
                        <th scope="col">Subtitle</th>
                        <th scope="col">Big Image</th>
                        <th scope="col">Small Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Client</th>
                        <th scope="col">Category</th>
                        <th scope="col">Time</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($portfolios as $portfolio)
                        <tr>
                            <th scope="row">{{ $portfolio->id }}</th>
                            <td scope="row">{{ $portfolio->title }}</td>
                            <td scope="row">{{ $portfolio->sub_title }}</td>
                            <td scope="row">
                                <img width="100" src="{{ url($portfolio->big_img) }}" alt="">
                            </td>
                            <td scope="row">
                                <img width="100" src="{{ url($portfolio->small_img) }}" alt="">
                            </td>
                            <td scope="row">{{ $portfolio->description }}</td>
                            <td scope="row">{{ $portfolio->client }}</td>
                            <td scope="row">{{ $portfolio->category }}</td>
                            <td scope="row">{{ $portfolio->created_at }}</td>

                            <td scope="row">
                                <div class="row">
                                    <div class="col-sm-2 ">
                                        <a class="btn btn-primary"
                                            href="{{ route('admin.portfolios.edit', $portfolio->id) }}">Edit</a>
                                    </div>

                                    <div class="col-sm-2 mx-2">
                                        <form style="margin-left:25px;"
                                            action="{{ route('admin.portfolios.destroy', $portfolio->id) }}" method="POST">
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
