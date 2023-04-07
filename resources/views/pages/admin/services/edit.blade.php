@extends('layouts.admin_layout')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Services Create</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Services</li>
            </ol>
<form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-3 form-group mt-3">
            <h4>Change your Icon</h4>
            <input type="text" name="icon" id="icon" value="{{$service->icon}}">
        </div>

        <div class="col-md-3 form-group mt-3">
            <div class="title">
                <label for="title">
                    <h4>Title</h4>
                </label>
                <input type="text" name="title" id="title" value="{{$service->title}}">
            </div>
            <div class="Description mt-3">
                <label for="description">
                    <h4>Description</h4>
                </label>
                <textarea type="text" name="description" id="description" > {{$service->description}}</textarea>
            </div>
        </div>
    </div>
    <input class="btn btn-primary mt-5" type="submit" value="Submit">
</form>
<div style="height: 100vh"></div>
</div>
</main>
@endsection
