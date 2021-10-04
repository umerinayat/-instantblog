@extends('layouts.admin')
@section('jumbotron')
<div class="row align-items-center">
    <div class="col-12">
        <h1 class="display-4">Delete Page</h1>
    </div>
</div>
@endsection
@section('content')
<div class="container">
    <div class="box-white ml-3 mr-3">
        <div class="col-md-12"> 
            <h2 class="text-center"> Are you sure you want to delete? </h2>     
            <p class="lead text-center"><strong>Page : </strong>{{ str_limit($page->page_title, 65) }}</p>
            <hr>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="{{ url('/pages/' . $page->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger float-right">Delete</button>
                </form>
            </div>
            <div class="col-md-6">
                <a href="{{ url('/pages/') }}" class="btn btn-primary" role="button">Cancel</a>      
            </div>
        </div>
    </div>
</div>
@endsection