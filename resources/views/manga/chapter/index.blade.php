@extends('admin')
@section('title', 'Manga')
@section('content')
<div class="p-3">
    <h1>Chapter</h1>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="{{route('add-chapter',['id'=>$manga->id,'title'=>$manga->title])}}" class="btn btn-success">Add Chapter</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Chapter</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($manga->chapter as $chapter)
                            <tr>
                                <td>{{$chapter->name_chapter}} </td>
                                <td>
                                    <a href="{{route('edit-manga',['id'=>$manga->id])}}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <button class="btn btn-sm btn-primary">
                                        Chapter
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
@endsection