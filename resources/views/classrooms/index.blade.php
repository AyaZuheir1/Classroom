@extends('layout.master')

@section('title' , 'Classrooms' )
@section('content')
<div class="container">
    <h1> Classrooms</h1>
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success')}}
    </div>
    @endif
    <div class="row">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-group-lg " type="button" href="{{ route('classrooms.create')}}">Create Classroom</a>
        </div>
        <div>
            <br>
        </div>
        @foreach($classrooms as $classroom)
        <div class="col-md-3">
            <div class="card">
                <img src="storage/{{ $classroom->cover_image_path }}" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $classroom->name }}</h5>
                    <p class="card-text">{{ $classroom->section }} - {{ $classroom->room }}</p>
                    <a href="{{ route('classrooms.show' , $classroom->id)}}" class="btn btn-sm btn-primary">View</a>
                    <a href="{{ route('classrooms.edit' , $classroom->id)}}" class="btn btn-sm btn-dark">Edit</a>
                    <form action="{{ route('classrooms.destroy' , $classroom->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger ">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection


@pushIf(false , 'scripts')
<script>
    console.log('@@stack')
</script>
@endpushIf
