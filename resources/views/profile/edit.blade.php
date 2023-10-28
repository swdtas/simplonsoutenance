@extends('layouts.main')
@section('body') 
    <div class="container p-3 ml-3">
            <div class="row">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="row">
                <div class="">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="row">
                <div class="">
                @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
@endsection
