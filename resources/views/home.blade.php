@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header " style="display: flex;justify-content: space-around;">
                    <p><strong>Name:</strong>Ramesh</p>
                    <p><strong>Organization:</strong>Bal Vikas</p>
                    <p><strong>Designation:</strong>Coordinator</p>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            <img src="/image/child.jpg" style="width:100%;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
