@extends('admin.layout.main')
@section('title', 'Flash Sale List')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Flash Sale</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Flash Sale</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th width='10%'>ID</th>
                                    <th width='30%'>Name</th>
                                    <th width='10%'>Product</th>
                                    <th width='10%'>End</th>
                                    <th width='20%'>Value</th>
                                    <th width='20%'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aryFlashSale as $flashSale)
                                    <tr id="discount_{{ $flashSale->id }}">
                                        <td>{{ $flashSale->id }}</td>
                                        <td>{{ $flashSale->name }}</td>
                                        <td>{{ $flashSale->related_id }}</td>
                                        <td>{{ $flashSale->end }}</td>
                                        <td>{{ $flashSale->value }}{{ $flashSale->type_discount == config('handle.type.discount.percent') ? '%' : '$' }}</td>
                                        <td>
                                            <a href="{{ route('edit.flash.sale', $flashSale->id) }}" class="btn btn-primary"><i
                                                    class="fas fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-del"
                                                data-id="{{ $flashSale->id }}"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    {{ $aryFlashSale->links('admin.partials.pagination') }}
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection