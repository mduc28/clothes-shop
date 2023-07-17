@extends('admin.layout.main')
@section('title', 'Edit Flash Sale')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Flash Sale</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Flash Sale</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                                @csrf
                                <!-- general form elements disabled -->
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter name" />
                                            <div>
                                                <p id="error-name" style="color: red"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- select -->
                                                <div class="form-group">
                                                    <label>Product Discount</label>
                                                    <select id="prod-discount" multiple="multiple"
                                                        data-placeholder="Select a Product" style="width: 100%;"
                                                        name="product[]">
                                                        @foreach ($aryProduct as $prod)
                                                            <option class="related-prod" value="{{ $prod->id }}">
                                                                {{ $prod->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div>
                                                        <p id="error-related_id" style="color: red"></p>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Valid Day</label>
                                                    <input type="text" name="valid-day"
                                                        class="form-control date-picker" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Reduce Type</label>
                                                    <select class="form-control reduce-type">
                                                        <option value="{{ config('handle.type.discount.cash') }}">Cash
                                                        </option>
                                                        <option value="{{ config('handle.type.discount.percent') }}">Percent
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Reduce Value</label>
                                                    <input class="form-control reduce-value" type="text" />
                                                    <div>
                                                        <p id="error-value" style="color: red"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary submit-btn">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection