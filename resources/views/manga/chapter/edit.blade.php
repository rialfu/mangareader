@extends('admin')
@section('content')
<div class="p-3">
<div class="container">
    <h1>Edit Chapter</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="" class="col-sm-1 col-form-label">Name Chapter</label>
                            <div class="col-sm-11">
                                <input type="text" name="name_chapter" value="{{old('name_chapter')}}" class="form-control">
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-1 col-3">
                                <div class="form-check">
                                    <input type="checkbox" value="1" name="show" id="hideshow" @if(old('show')=="1") checked @endif class="form-check-input">
                                    <label for="" class="form-check-label " style="cursor:pointer" id="hideshow-label">{{old('show')=="1"? 'Show':'Hide'}}</label>
                                </div>
                            </div>
                            <div class="col-md-11 col-9">
                                <div>
                                    {{-- <label for="">Language</label> --}}
                                    <select class="form-select" aria-label="Default select example" name="lang">
                                        <option selected>Language</option>
                                        <option value="id">Indonesia</option>
                                        <option value="en">English</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        
                        <button class="btn btn-success mt-3">Edit Chapter</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach($chapter->images as $image)
                            <div class="col-md-4">
                                <img src="{{asset($image->url_image)}}" style="width:100%;aspect-ratio:1/1" alt="">
                                <br>
                                {{$image->url_image." ". asset('ss')}}
                                {{-- <img src="" alt=""> --}}

                            </div>
                        @endforeach
                    </div>
                    {{-- dd($manga->) --}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@section('script')
<script>

</script>
@endsection