@extends('layouts.admin_layout')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Portfolio Create</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Portfolio</li>
            </ol>
            <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3 form-group mt-3">
                        <div class="big_img mb-5">
                            <h4>Big Image</h4>
                            <img src="" class="big_img">
                            <input type="file" name="big_img" >
                        </div>

                        <div class="small_img">
                            <h4>Small Image</h4>
                            <img src="" class="small_img">
                            <input type="file" name="small_img" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" class="form-control" id="category_id">
                            <option value="">-- Select a category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 form-group mt-3">
                        <div class="title">
                            <label for="title">
                                <h4>Title</h4>
                            </label>
                            <input type="text" name="title" id="title" value="" class="form-control" >
                        </div>

                        <div class="sub_title mt-3">
                            <label for="sub_title">
                                <h4>Sub Title</h4>
                            </label>
                            <input type="text" name="sub_title" id="sub_title" value="" class="form-control" >
                        </div>

                        <div class="sub_title mt-3">
                            <label for="sub_title">
                                <h4>Sub Title</h4>
                            </label>
                            <input type="text" name="sub_title" id="sub_title" value="" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-4 form-group mt-3">


                        <div class="client ">
                            <label for="client">
                                <h4>Client</h4>
                            </label>
                            <input type="text" name="client" id="client" value="" class="form-control" >
                        </div>
                        <div class="category mt-3">
                            <label for="category">
                                <h4>Category</h4>
                            </label>
                            <input type="text" name="category" value="" class="form-control" >
                        </div>
                        <div class="description mt-3">
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
