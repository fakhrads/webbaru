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

                    <p class="text-muted text-center">Software Engineer</p>

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
                        <li class="nav-item"><a class="nav-link active" href="#email" data-toggle="tab">Email</a></li>
                        <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password</a></li>
                        <li class="nav-item"><a class="nav-link" href="#apikey" data-toggle="tab">Api Key</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <!-- tab email -->
                        <div class="tab-pane active" id="email">
                            <form class="form-horizontal">
                                {{ csrf_field() }}
                                {{ method_field('patch') }}

                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Nama" name="name" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="{{ Auth::user()->email }}">
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
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Kata Sandi Lama</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Kata Sandi Lama" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputNewPassword" class="col-sm-2 col-form-label">Kata Sandi Baru</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="inputNewPassword" placeholder="Kata Sandi Baru">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="reinputNewPassword" class="col-sm-2 col-form-label">Ulangi Kata Sandi Baru</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="reinputNewPassword" placeholder="Ulangi Kata Sandi Baru">
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
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Api Key</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputName" placeholder="Name">
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
</script>
@stop