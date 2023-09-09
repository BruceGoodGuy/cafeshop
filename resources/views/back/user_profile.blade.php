@extends('layouts.manage')

@section('content')
    <!-- Start container-fluid -->
    <div class="container-fluid">

        <!-- start  -->
        <div class="row">
            <div class="col-md-12">
                <div class="p-0 text-center">
                    <div class="member-card">
                        <div class="avatar-xxl member-thumb mb-2 center-page mx-auto">
                            <img src="{{ asset('back/assets/images/users/avatar-3.jpg') }}"
                                class="rounded-circle img-thumbnail" alt="profile-image">
                            <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                        </div>

                        <div class="">
                            <h5 class="mt-3">{{ ucwords(Str::of($userDetail['name'])->lower())}}</h5>
                            @if (!is_null($userDetail['username']))
                                <p class="text-muted">{{ '@' . Str::lower($userDetail['username']) }}</p>
                            @endif
                        </div>

                        @if (!is_null($userDetail['bio']))
                            <p class="text-muted mt-2">
                                {{ $userDetail->bio }}
                            </p>
                        @endif

                    </div>

                </div>
                <!-- end card-box -->

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        <!-- end -->

        <div class="mt-5">
            <ul class="nav nav-tabs tabs-bordered">
                <li class="nav-item">
                    <a href="#home-b1" data-toggle="tab" aria-expanded="false" class="nav-link @if(is_null(request()->tab) || request()->tab === 'view') active @endif user-profile-tab">
                        Hồ Sơ
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#profile-b1" data-toggle="tab" aria-expanded="true" class="nav-link @if(request()->tab === 'edit') active @endif user-profile-tab">
                        Thiết Lập
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane @if(is_null(request()->tab) || request()->tab === 'view') active @endif" id="home-b1">
                    <div class="row">
                        <div class="col-12">
                            @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    <ul class="mb-0">
                                        <li>{!! \Session::get('success') !!}</li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-4">
                            <!-- Personal-Information -->
                            <div class="panel card panel-fill">
                                <div class="card-header">
                                    <h5 class="font-16 m-1">Thông tin cá nhân</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <strong>Họ và Tên</strong>
                                        <br>
                                        <p class="text-muted">{{ ucwords(Str::of($userDetail['name'])->lower())}}</p>
                                    </div>
                                    <div class="mb-4">
                                        <strong>Điện thoại</strong>
                                        <br>
                                        <p class="text-muted">{{ $userDetail['phonenumber'] ?? 'Chưa được thiết lập' }}</p>
                                    </div>
                                    <div class="mb-4">
                                        <strong>Email</strong>
                                        <br>
                                        <p class="text-muted">{{ $userDetail['email'] ?? 'Chưa được thiết lập' }}</p>
                                    </div>
                                    <div class="mb-0">
                                        <strong>Vị trí</strong>
                                        <br>
                                        <p class="text-muted mb-0">{{ $userDetail['location'] ?? 'Chưa được thiết lập' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Personal-Information -->

                            @if (!empty($userDetail['socials']))
                                <!-- Social -->
                                <div class="panel card panel-fill">
                                    <div class="card-header">
                                        <h5 class="font-16 m-1">Mạng xã hội</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="social-links list-inline mb-0">
                                            @foreach ($userDetail['socials'] as $social)
                                                <li class="list-inline-item">
                                                    <a title="" target="_blank" data-placement="top"
                                                        data-toggle="tooltip" class="tooltips" href="{{ $social['path'] }}"
                                                        data-original-title="{{ $social['type'] }}"><i
                                                            class="fab fa-{{ $social['type'] }}-f"></i></a>
                                                </li>
                                            @endforeach

                                            {{-- <li class="list-inline-item">
                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips"
                                                href="" data-original-title="Twitter"><i
                                                    class="fab fa-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a title="" data-placement="top" data-toggle="tooltip" class="tooltips"
                                                href="" data-original-title="Skype"><i class="fab fa-skype"></i></a>
                                        </li> --}}
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            <!-- Social -->
                        </div>

                        <div class="col-lg-8">
                            <!-- Personal-Information -->
                            <div class="panel card panel-fill">
                                <div class="card-header">
                                    <h5 class="font-16 m-1">Mô tả</h5>
                                </div>
                                <div class="card-body">
                                    {!! $userDetail['full'] ?? 'Chưa được cập nhật' !!}
                                </div>
                            </div>
                        </div>
                        <!-- Personal-Information -->

                    </div>
                </div>
                <div class="tab-pane @if(request()->tab === 'edit') active @endif" id="profile-b1">
                    <!-- Personal-Information -->
                    @if (\Session::has('error'))
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <li>{!! \Session::get('error') !!}</li>
                            </ul>
                        </div>
                    @endif
                    <div class="panel card panel-fill">
                        <div class="card-header">
                            <h5 class="font-16 m-1">Chỉnh sửa hồ sơ</h5>
                        </div>
                        <div class="card-body">
                            <form autocomplete="off" method="post" action="{{route('update.profile')}}">
                                @method('patch')
                                @csrf
                                <input type="hidden" name="email" value="{{$userDetail['email']}}">
                                <div class="form-group">
                                    <label for="FullName">Họ và Tên</label>
                                    <input type="text" name="name" value="{{ old('name') ?? ucwords(Str::of($userDetail['name'])->lower())}}" id="FullName" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}<span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Email">Địa chỉ email</label>
                                    <input type="email" autocomplete="off" disabled value="{{ $userDetail['email'] ?? old('email') }}" id="Email" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}<span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" autocomplete="off" name="phonenumber" value="{{ $userDetail['phonenumber'] ?? old('phonenumber') }}" id="phone" class="form-control @error('phonenumber') is-invalid @enderror">
                                    @error('phonenumber')
                                        <span class="text-danger">{{ $message }}<span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Username">Username</label>
                                    <input type="text" autocomplete="off" name="username" value="{{ $userDetail['username'] ?? old('username') }}" id="Username" class="form-control @error('username') is-invalid @enderror">
                                    @error('username')
                                        <span class="text-danger">{{ $message }}<span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Password">Mật khẩu</label>
                                    <input type="password" name="password" autocomplete="off" value="{{old('password')}}" placeholder="" id="Password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}<span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="RePassword">Nhập lại mật khẩu</label>
                                    <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" autocomplete="off" placeholder="" id="RePassword" class="form-control @error('password_confirmation') is-invalid @enderror">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}<span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="location">Vị trí</label>
                                    <textarea id="bio" style="height: 125px" id="AboutMe" class="form-control @error('location') is-invalid @enderror" name="location">{!! $userDetail['location'] ?? old('location') !!}</textarea>
                                    @error('location')
                                        <span class="text-danger">{{ $message }}<span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="bio">Mô tả</label>
                                    <textarea id="bio" style="height: 125px" id="AboutMe" class="form-control @error('full') is-invalid @enderror" name="full">{!! $userDetail['full'] ?? old('full') !!}</textarea>
                                    @error('full')
                                        <span class="text-danger">{{ $message }}<span>
                                    @enderror
                                </div>
                                <button class="btn btn-primary waves-effect waves-light width-md" type="submit">Save</button>
                            </form>
    
                        </div>
                    </div>
                    <!-- Personal-Information -->
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- end container-fluid -->
@endsection

@section('javascript')
<script>
    $('a.user-profile-tab').on('shown.bs.tab', function (event) {
        const currentTabID = event.target.getAttribute('href');
        let tab = 'view'
        if (currentTabID === '#profile-b1') {
            tab = 'edit';
        }
        // Get the current URL and create a URLSearchParams object
        const currentURL = new URL(window.location.href);
        const searchParams = currentURL.searchParams;

        // // Add a new parameter
        searchParams.set('tab', tab);

        // Convert the updated URLSearchParams object back to a string
        const updatedQueryString = searchParams.toString();

        // Modify the browser's history without reloading the page
        const newURL = `${currentURL.origin}${currentURL.pathname}?${updatedQueryString}`;
        window.history.pushState({ path: newURL }, '', newURL);

    })
</script>
@endsection
