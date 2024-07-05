@extends('layouts.app')
  
@section('title',)
  
@section('contents')
    <hr />
    <form method="POST" enctype="multipart/form-data" id="profile_setup_frm" action="{{ route('profile.update') }}" >
        @csrf <!-- Laravel CSRF Protection -->
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
            </div>
            <div class="card-body py-3 px-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                </div>
                <div class="row" id="res"></div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label class="labels">Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="first name" value="{{ auth()->user()->name }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Email</label>
                        <input type="text" name="email" disabled class="form-control" value="{{ auth()->user()->email }}" placeholder="Email">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label class="labels">Role</label>
                        <input type="text" name="role" class="form-control" placeholder="Role" value="{{ auth()->user()->role }}" disabled>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </form>
@endsection