@extends('layouts.manage')

@section('content')
    <!-- Start container-fluid -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div>
                    <h4 class="header-title mb-3">Sửa loại sản phẩm</h4>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            @if (\Session::has('error'))
                <div class="alert alert-icon alert-danger text-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="mdi mdi-check-all mr-2"></i>
                    <strong>Lỗi</strong> {{ session('error') }}
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col-lg-6">
                <form action="{{route('category.update', $category->id)}}" class="form-horizontal" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Tên</label>
                        <div class="col-md-10">
                            <input type="text" placeholder="Tên loại sản phẩm" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $category['name'] }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}<span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10 col-12 offset-md-2 offset-0">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="status" value="1" id="status" @if($category['status']) checked @endif>
                                <label class="custom-control-label" for="status">Kích hoạt</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10 col-12 offset-md-2 offset-0">
                            <button type="submit" class="btn btn-primary">Cập nhật loại sản phẩm</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end -->
        </div>
        <!--end row -->
    </div>
    <!-- end container-fluid -->
@endsection
