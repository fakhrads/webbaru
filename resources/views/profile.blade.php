@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Profile</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="https://i.pinimg.com/236x/67/fc/a5/67fca5aabcffa18393fb3eb4e4dd4b0d.jpg" alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                    <p class="text-muted text-center">@username</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Followers</b> <a class="float-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="float-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="float-right">13,287</a>
                        </li>
                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->

            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#userinfo" data-toggle="tab">User Info</a></li>
                        <li class="nav-item"><a class="nav-link" href="#email" data-toggle="tab">Email</a></li>
                        <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password</a></li>
                        <li class="nav-item"><a class="nav-link" href="#apikey" data-toggle="tab">Api Key</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    @if(!empty(Session::get('success')))
                    <div class="alert alert-success"> {{ Session::get('success') }}</div>
                    @endif
                    @if(!empty(Session::get('error')))
                    <div class="alert alert-danger"> {{ Session::get('error') }}</div>
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="tab-content">
                        <!-- tab user info -->
                        <div class="tab-pane active" id="userinfo">
                            <form class="form-horizontal" method="POST" action="{{ route('update-userinfo') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputUsername" placeholder="Masukkan Username Anda" name="username" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Masukkan Nama Anda" name="name" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputGender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="gender" style="max-width:20%;">
                                            <option disabled>Pilih Gender</option>
                                            <!-- foreach data gender dinamik -->
                                            <option>xx</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="3" id="inputAlamat" name="alamat" placeholder="Masukkan Alamat Anda"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputImage" class="col-sm-2 col-form-label">Gambar</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="gambar" class="custom-file-input" id="InputImage">
                                                <label class="custom-file-label" for="InputImage">Pilih file</label>
                                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <img id="image_preview_container" style="max-height: 150px;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- tab email -->
                        <div class="tab-pane" id="email">
                            <form class="form-horizontal" method="POST" action="{{ route('update-email') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}" id="inputEmail" placeholder="Email" name="email" value="{{ Auth::user()->email }}">

                                        @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- tab password -->
                        <div class="tab-pane" id="password">
                            <form class="form-horizontal" method="POST" action="{{ route('update-password') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Kata Sandi Lama</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Masukkan Kata Sandi Lama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputNewPassword" class="col-sm-2 col-form-label">Kata Sandi Baru</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control {{ $errors->has('new_password') ? 'is-invalid' : '' }}" name="new_password" id="inputNewPassword" placeholder="Kata Sandi Baru">
                                        @if ($errors->has('new_password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('new_password') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="reinputNewPassword" class="col-sm-2 col-form-label">Ulangi Kata Sandi Baru</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control {{ $errors->has('new_confirm_password') ? 'is-invalid' : '' }}" name="new_confirm_password" id="reinputNewPassword" placeholder="Ulangi Kata Sandi Baru">
                                        @if ($errors->has('new_confirm_password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('new_confirm_password') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- tab api key -->
                        <div class="tab-pane" id="apikey">
                            <form class="form-horizontal" method="POST" action="{{ route('update-apikey') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputApikey" class="col-sm-2 col-form-label">Api Key Lama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputApikey" placeholder="Api Key Lama" name="current_apikey" value="{{ Auth::user()->apikey }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputApikeyNew" class="col-sm-2 col-form-label">Api Key Baru</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputApikeyNew" placeholder="Api Key Baru" name="new_apikey">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');

    // awal script gambar
    $(document).ready(function(e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#InputImage').change(function() {

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#image_preview_container').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });

        $('#upload_image_form').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: "{{ url('save-photo')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    this.reset();
                    alert('Image has been uploaded successfully');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    });
    // end script gambar

    // toggle visibility
</script>
@stop