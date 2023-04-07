@extends('layouts.admin_layout')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Abouts Create</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">abouts</li>
            </ol>
            <form action="{{ route('admin.abouts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4 form-group mt-3">
                        <div class="title">
                            <label for="title">
                                <h4>Work Year</h4>
                            </label>
                            <input type="text" name="title" id="title" value="" class="form-control" >
                        </div>
                        <div class="title2 mt-3">
                            <label for="title2">
                                <h4>Title</h4>
                            </label>
                            <input type="text" name="title2" value="" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <div class="img">
                            <h4>Image</h4>
                            <img src="" class="img">
                            <input type="file" name="img" >
                        </div>
                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <div class="description">
                            <label for="description">
                                <h4>Description</h4>
                            </label>
                            <textarea name="description" class="form-control"  rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <input class="btn btn-primary mt-5" type="submit" value="Submit">
            </form>
<div style="height: 100vh"></div>
</div>
</main>
@endsection
