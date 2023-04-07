@extends('layouts.admin_layout')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">List of Services</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">List of Services</li>
            </ol>

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                    <tr>
                        <th scope="row">{{$service->id}}</th>
                        <td><i class="{{$service->icon}}"></i></td>
                        <td>{{$service->title}}</td>
                        <td>{{$service->description}}</td>
                        <td>
                          <div class="row">
                            <div class="col-sm-2">
                              <a class="btn btn-primary" href="{{route('admin.services.edit', $service->id)}}">Edit</a>
                            </div>

                            <div class="col-sm-2">
                                <form action="{{route('admin.services.destroy', $service->id)}}" method="POST">
                                    @csrf
                                    @method('Delete')
                                    <input type="submit" onclick="return confirm('Are you sure?')" value="delete" class="btn btn-danger">
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
