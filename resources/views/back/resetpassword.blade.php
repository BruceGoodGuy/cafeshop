@extends('layouts.authentication')

@section('content')
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-4 mt-3">
                                <a href="{{ route('home') }}">
                                    <span><img src="{{ asset('back/assets/images/logo-dark.png') }}" alt="" height="30"></span>
                                </a>
                            </div>
                            <form action="{{route('password.reset.change', ['token' => $token])}}" class="p-2" method="post">
                                @csrf
                                <input type="hidden" value="{{$token}}" name="token">
                                <div class="form-group">
                                    <label for="newpassword">Mật khẩu mới:</label>
                                    <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" id="newpassword" required=""
                                        placeholder="Nhập mật khẩu mới" value="{{old('password')}}">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}<span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="re-enter-password">Nhập lại mật khẩu:</label>
                                    <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" type="password" id="re-enter-password" required=""
                                        placeholder="Nhập lại mật khẩu" value="{{old('password_confirmation')}}">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}<span>
                                    @enderror
                                </div>
                                @error('token')
                                    <p class="text-danger mb-3">{{ $message }}<p>
                                @enderror
                                <div class="mb-3 text-center">
                                    <button class="btn btn-primary btn-block" type="submit"> Đổi mật khẩu </button>
                                </div>
                            </form>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection
