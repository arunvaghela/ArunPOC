@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    {{ __('User Name') }} : {{ $getProfileData->name }}
                    <br>
                    {{ __('User Email') }} : {{ $getProfileData->email }}
                    <br>
                    {{ __('User Phone No.') }} : {{ $getProfileData->phone_number }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
