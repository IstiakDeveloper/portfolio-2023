@extends('layouts.admin_layout')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Main Page</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Main</li>
            </ol>
            <form action="{{ route('admin.main.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3 form-group mt-3">
                        <div class="site-title">
                            <label for="site_title">
                                <h4>Site Title</h4>
                            </label>
                            <input class="form-control" type="text" name="site_title" id="site_title" value="{{ $main->site_title }}">
                        </div>

                        <div class="fav-icon mt-3">
                            <h4>Change your Favicon</h4>
                            <img src="{{ url($main->fav_icon) }}" class="img-thumbnail">
                            <input type="file" name="fav_icon" id="fav_icon">
                        </div>
                    </div>
                    <div class="col-md-3 form-group mt-3">
                        <div class="logo">
                            <h4>Change your logo</h4>
                            <img src="{{ url($main->logo) }}" class="img-thumbnail">
                            <input type="file" name="logo" id="logo">
                        </div>
                        <div class="bg_img mt-3">
                            <h4>Background Image</h4>
                            <img src="{{ url($main->bc_img) }}" class="img-thumbnail">
                            <input type="file" name="bc_img" id="bc_img">
                        </div>
                    </div>
                    <div class="col-md-3 form-group mt-3">
                        <div class="title">
                            <label for="title">
                                <h4>Title</h4>
                            </label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ $main->title }}">
                        </div>

                        <div class="sub_title mt-3">
                            <label for="sub_title">
                                <h4>Sub Title</h4>
                            </label>
                            <input class="form-control" type="text" name="sub_title" id="sub_title" value="{{ $main->sub_title }}">
                        </div>
                    </div>
                    <div class="col-md-3 form-group mt-3">
                        <h3>Resume</h3>
                        <input type="file" name="resume" id="resume">
                    </div>
                </div>
                <input class="btn btn-primary mt-5" type="submit" value="Submit">
            </form>
            <div style="height: 100vh"></div>
        </div>

    </main>
@endsection
