@extends('layouts.admin')

@section('title')
    Admin - Create Commodity
@endsection

@section('content')
    <div id="page-content-wrapper">
        <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
        >
        <div class="container-fluid">
            <div class="dashboard-heading">
            <h2 class="dashboard-title">Admin Product</h2>
            <p class="dashboard-subtitle">
                Create Product
            </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('commodities.store') }}" method="POST"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <input type="text" class="form-control" name="users_id" value="{{ Auth::user()->id }}" hidden/>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="name">Commodity Name</label>
                                            <input type="text" class="form-control" name="name" required />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="categories_id">Commodity Category</label>
                                            <select name="categories_id" class="form-control">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label for=price"">Price</label>
                                            <input type="number" class="form-control" name="price" required />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label for="units">Units</label>
                                                <select name="units" class="form-control">
                                                    <option value="IDR/Barrel">IDR per Barrel</option>
                                                    <option value="IDR/Troy Ounce">IDR per Troy Ounce</option>
                                                    <option value="IDR/MBBTu">IDR per MBBTu</option>
                                                    <option value="IDR/Gallone">IDR per Gallone</option>
                                                    <option value="IDR/Pound">IDR per Pound</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success px-5">Save Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection