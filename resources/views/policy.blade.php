@extends('layouts.app')

@section('title', 'Xipearte')

@section('content')



    <div class="row justify-content-center pt-4">
        <div class="col-10">


            <div class="card shadow-sm">
                <div class="card-body">
                    {!! $policy !!}
                </div>
            </div>
        </div>
    </div>



@endsection
