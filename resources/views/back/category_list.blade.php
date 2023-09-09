@extends('layouts.manage')

@section('content')
    <!-- Start container-fluid -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div>
                    <h4 class="header-title mb-3">Danh sách loại sản phẩm</h4>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            @if (\Session::has('success'))
                <div class="alert alert-icon alert-success text-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="mdi mdi-check-all mr-2"></i>
                    <strong>Hoàn thành</strong> {{ session('success') }}
                </div>
            @endif
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
            <div class="col-sm-12">
                <table id="datatable-category"
                    class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                    style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                    aria-describedby="datatable-category_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="datatable-category" rowspan="1"
                                colspan="1" style="width: 150px;" aria-sort="ascending"
                                aria-label="Name: activate to sort column descending">Tên</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-category" rowspan="1"
                                colspan="1" style="width: 229px;" aria-label="Status: activate to sort column ascending">
                                Trạng thái</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-category" rowspan="1"
                                colspan="1" style="width: 107px;"
                                aria-label="Products: activate to sort column ascending">
                                Số sản phẩm</th>
                            <th class="no-sort" tabindex="0" aria-controls="datatable-category" rowspan="1"
                                colspan="1" style="width: 49px;" aria-label="Action">Thao tác
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categories as $category)
                            <tr role="row" class="{{ $loop->odd ? 'odd' : 'even' }}">
                                <td tabindex="0" class="sorting_1">{{ $category->name }}</td>
                                <td>
                                    @if ($category->status)
                                        <span class="badge badge-success">Kích hoạt</span>
                                    @else
                                        <span class="badge badge-danger">Ngưng kích hoạt</span>
                                    @endif
                                </td>
                                <td>0</td>
                                <td>
                                    <a href="{{route('category.edit', ['id' => $category->id])}}">
                                        <button type="button" class="btn btn-warning btn-bordered-warning">Sửa</button>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-bordered-danger" onclick="deleteItem('{{$category->id}}', '{{$category->name}}')">Xóa</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--end row -->
    </div>
    <!-- end container-fluid -->

    <!-- Modal -->
    <div class="modal fade" id="deleteItemModal" tabindex="-1" role="dialog" aria-labelledby="deleteItemModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="">
                    @csrf
                    @method('delete')
                    <div class="modal-header">
                    <h5 class="modal-title" id="deleteItemModalLabel">Cảnh báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <p></p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-danger">Xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('back/assets/libs/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('back/assets/libs/datatables/responsive.bootstrap4.css') }}">
@endsection
@section('javascript')
    <script src="{{ asset('back/assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $('#datatable-category').DataTable({
            columnDefs: [{
                targets: [3],
                orderable: false
            }, ],
            oLanguage: {
                sSearch: 'Tìm kiếm',
                oPaginate: {
                    sFirst: "Trang đầu", // This is the link to the first page
                    sPrevious: "Trang trước", // This is the link to the previous page
                    sNext: "Trang kế", // This is the link to the next page
                    sLast: "Trang cuối" // This is the link to the last page
                },
                sInfo: "Đang hiện từ _START_ tới _END_ trong _TOTAL_ mục",
                sLengthMenu: 'Hiển thị _MENU_ mục',
                sZeroRecords: 'Không có item nào'
            },

        });

        function deleteItem(id, name) {
            const message = `Bạn có chắc chắn muốn xóa loại sản phẩm '${name}' không?`;
            $("#deleteItemModal .modal-body p").text(message);
            $('#deleteItemModal').modal('show');
            let = url = '{{route("category.delete", "__id__")}}';
            url = url.replace('__id__', id);
            $('#deleteItemModal form').attr('action', url);
        } 
    </script>
@endsection
