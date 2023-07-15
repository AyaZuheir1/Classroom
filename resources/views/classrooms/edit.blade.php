@extends('layout.master')

@section('title', ' Edit Classrooms')

@section('content')
    <div class="container">
        <h1>Edit Classroom</h1>
        <form action="{{ route('classrooms.update', $classroom->id) }}" method="post">
            {{--
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {{ csrf_field() }}
        --}}
            @csrf
            <!-- From Method Sppofing -->
            {{--
        <input type="hidden" name="_method" value="put">
        {{--
         method_field(put)}}
         --}}
            @method('put')


            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="{{ $classroom->name }}" id="name" name="name"
                    placeholder="Class Name">
                <label for="name">Calss Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="{{ $classroom->section }}" id="section" name="section"
                    placeholder="Password">
                <label for="section">Section</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="{{ $classroom->subject }}" id="subject" name="subject"
                    placeholder="Class Name">
                <label for="subject">Subject</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="{{ $classroom->room }}" id="room" name="room"
                    placeholder="Password">
                <label for="room">Room</label>
            </div>
            <img src="{{ asset('storage/' . $classroom->cover_image_path) }}" alt="">

            <div class="form-floating mb-3">
                <input type="file" class="form-control" id="cover_image" name="cover_image" placeholder="Class Name">
                <label for="cover_image">Cover Image</label>
            </div>
            <button type="submit" class="btn btn-primary">Update Classroom</button>
    </div>
    </form>
    </div>
@endsection
