@extends('layout.master')

@section('title' , 'Create Classrooms' )
@section('content')
<div class="container">
    <h1>Create Classroom</h1>
    <form action="{{ route('classrooms.store') }}" method="post" enctype="multipart/form-data">
        {{--
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {{ csrf_field() }}
        --}}
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" name="name" placeholder="Class Name">
            <label for="name">Calss Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="section" name="section" placeholder="Password">
            <label for="section">Section</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Class Name">
            <label for="subject">Subject</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="room" name="room" placeholder="Password">
            <label for="room">Room</label>
        </div>
        <div class="form-floating mb-3">
            <input type="file" class="form-control" id="cover_image" name="cover_image" placeholder="Class Name">
            <label for="cover_image">Cover Image</label>
        </div>
        <button type="submit" class="btn btn-primary">Create Room</button>
</div>
</form>
</div>
@endsection
