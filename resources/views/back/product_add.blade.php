@extends('layouts.manage')

@section('content')
    <!-- Start container-fluid -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div>
                    <h4 class="header-title mb-3">Thêm sản phẩm</h4>
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

        <form action="{{ route('product.store') }}" class="form-horizontal" method="post" id="addproduct"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Tên</label>
                        <div class="col-md-10">
                            <input type="text" placeholder="Tên sản phẩm"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}<span>
                                    @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Loại sản phẩm</label>
                        <div class="col-md-10">
                            <select class="form-control" data-toggle="select2" name="type">
                                <option>Chọn</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if (old('type') == $category->id) selected @endif>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <span class="text-danger">{{ $message }}<span>
                                    @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Trọng lượng (gram)</label>
                        <div class="col-md-10">
                            <div class="input-group">
                                <input type="number" id="weight" name="weight" class="form-control"
                                    placeholder="Trọng lượng" min="100" value="{{ old('weight') ?? 100 }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">gram</span>
                                </div>
                            </div>
                            @error('weight')
                                <span class="text-danger">{{ $message }}<span>
                                    @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Kích thước (cm)</label>
                        <div class="col-md-10">
                            <div class="input-group">
                                <input type="text" id="dimensions" name="dimensions" class="form-control"
                                    placeholder="Dài x Rộng x Cao" value="{{ old('dimensions') ?? '10x20x30' }}">
                            </div>
                            @error('dimensions')
                                <span class="text-danger">{{ $message }}<span>
                                    @enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Số lượng</label>
                        <div class="col-md-10">
                            <div class="input-group">
                                <input type="number" id="quantity" name="quantity" class="form-control"
                                    placeholder="Số lượng" min="1" value="{{ old('quantity') ?? 10 }}">
                            </div>
                            @error('quantity')
                                <span class="text-danger">{{ $message }}<span>
                                    @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Giá</label>
                        <div class="col-md-10">
                            <div class="input-group">
                                <input type="text" id="price" name="price" class="form-control" placeholder="Giá"
                                    min="1000" value="{{ old('price') ?? 100000 }}">
                                <input type="hidden" id="price_raw" name="price_raw" class="form-control" placeholder="Giá"
                                    min="1000" value="{{ old('price_raw') ?? 100000 }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">VNĐ</span>
                                </div>
                            </div>
                            @error('price_raw')
                                <span class="text-danger">{{ $message }}<span>
                                    @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Bảo hành</label>
                        <div class="col-md-10">
                            <div class="input-group">
                                <input type="number" id="warranty" min="0" name="warranty" class="form-control"
                                    placeholder="Thời gian bảo hành" value="{{ old('warranty') ?? 3 }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">Tháng</span>
                                </div>
                            </div>
                            @error('warranty')
                                <span class="text-danger">{{ $message }}<span>
                                    @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10 col-12 offset-md-2 offset-0">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="status" value="1"
                                    id="status" checked>
                                <label class="custom-control-label" for="status">Kích hoạt</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <p>Nội dung</p>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Mô tả ngắn</label>
                        <div class="col-md-10">
                            <textarea name="summary" class="form-control" rows="5" id="short-description">{{ old('summary') }}</textarea>
                            @error('summary')
                                <span class="text-danger">{{ $message }}<span>
                                    @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Mô tả chi tiết</label>
                        <div class="col-md-10">
                            <textarea name="detail">
                                {!! old('detail') !!}
                            </textarea>
                            @error('detail')
                                <span class="text-danger">{{ $message }}<span>
                                    @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Ảnh sản phẩm</label>
                        <div class="col-md-10">
                            <div class="input-group">
                                <div class="image-products w-100"></div>
                            </div>
                            @error('productImages')
                                <span class="text-danger">{{ $message }}<span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group row">
                        <div class="col-md-10 col-12 offset-md-2 offset-0">
                            <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
                        </div>
                    </div>
                </div>
                <!-- end -->
            </div>
            <!--end row -->
        </form>
    </div>
    <!-- end container-fluid -->
@endsection

@section('style')
    <link href="{{ asset('back/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />
    <link href="{{ asset('back/assets/libs/draganddrop/image-uploader.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('javascript')
    <script src="{{ asset('back/assets/libs/moment/moment.min.js') }}"></script>
    <script src="{{ asset('back/assets//libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/pages/form-advanced.init.js') }}"></script>
    <script src="{{ asset('back/assets/libs/draganddrop/image-uploader.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/amep9lz308cit9qd0gvvaeisadaful2ykwuj66asufquj3ak/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        $('.image-products').imageUploader({
            extensions: ['.jpg', '.jpeg', '.png', '.gif', '.svg'],
            mimes: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'],
            maxSize: 5242880, //5 MB.
            maxFiles: 5,
            imagesInputName: 'productImages',
            label: 'Kéo và thả tập tin vào đây hoặc nhấp để duyệt'
        });
    </script>

    <script>
        tinymce.init({
            selector: 'textarea[name="detail"]',
            plugins: 'image code fullscreen',
            toolbar: 'undo redo | formatselect | fullscreen | ' +
                'bold italic backcolor | image | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            automatic_uploads: true,
            /*
              URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
              images_upload_url: 'postAcceptor.php',
              here we add custom filepicker only to Image dialog
            */
            file_picker_types: 'image',
            /* and here's our custom image picker*/
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                /*
                  Note: In modern browsers input[type="file"] is functional without
                  even adding it to the DOM, but that might not be the case in some older
                  or quirky browsers like IE, so you might want to add it to the DOM
                  just in case, and visually hide it. And do not forget do remove it
                  once you do not need it anymore.
                */

                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function() {
                        /*
                          Note: Now we need to register the blob in TinyMCEs image blob
                          registry. In the next release this part hopefully won't be
                          necessary, as we are looking to handle it internally.
                        */
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },
        });
    </script>
    <script>
        $('#price').on('paste keyup', function() {
            formatMoney($(this))
        });

        formatMoney($('#price'));

        function formatMoney(el) {
            value = el.val().replace(/[^0-9]/g, "");
            var money = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND',
            });
            el.val(money.format(value));
        }

        $('#addproduct').on('submit', function(e) {
            e.preventDefault();
            const price = $('#price').val().replace(/[^0-9]/g, "");
            $('#price_raw').val(price)
            e.currentTarget.submit();
        })
    </script>
@endsection
