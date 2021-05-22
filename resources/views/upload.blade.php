@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form method="post" action="/upload" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file">
                        <input type="submit" value="Submit">

                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
