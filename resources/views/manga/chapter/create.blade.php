@extends('admin')
@section('title', 'Create Manga')
@section('css')

.form-upload div{
    border-width:3px; border-style:dotted;height:150px; width:100%;font-size:20px;
}
.form-upload div:hover{

}
@media only screen and (min-width: 600px) {
    .preview-image{
    }
}
.preview-image{
    position:relative;
    width:100%;
    max-height:180px;
    height:180px;
}

.preview-image .img{
    width:100%;
    max-height:150px;
    overflow:hidden;
    {{-- position:relative; --}}
}
.preview-image img{
    width:100%;
    {{-- max-height:150px; --}}
    
}
.preview-image>input{
    margin-top:10px;
    width:100%;
    position:absolute;
    bottom:0;
    left:0;
}
[class^="ico-"], [class*=" ico-"] {
    font: normal 1em/1 Arial, sans-serif;
    display: inline-block;
}
  
.ico-times::before { content: "\2716";font-size:20px; color:black; }
.ico-times{
    position:absolute;
    top:5px;
    right:5px;
    cursor:pointer;
    z-index:2;
}
@endsection
@section('content')
<div class="p-3">
<div class="container">
    <h1>Create Manga</h1>
    <div class="row">
        <div class="col">
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
                        <div style="margin:20px 0 20px 0;padding:20px;width:100%;min-height:100px;background-color:#f3f3f3;">
                            <div class="position-relative form-upload">
                                <div style="" class="text-center d-flex align-items-center justify-content-center" >
                                    upload
                                </div>
                                <input type="file" name="cache" id="cache-upload" style="z-index:1;top:0; left:0; height:150px;opacity:0;cursor:pointer;width:100%; position: absolute;">
                            </div>
                            
                            <div class="row preview-image-form mt-2">
                                {{-- <div class="col-md-3 col-sm-4 col-6">
                                    <div class="preview-image">
                                        <div class="img">
                                            <img class="" src="https://www.wallpapers13.com/wp-content/uploads/2015/12/Nature-Lake-Bled.-Desktop-background-image-840x525.jpg"  alt="">
                                        </div>
                                        
                                        <input type="file" name="file[]" id="" class="form-control" style="display:none;">
                                        <input type="text" name="fileName[]">
                                        <i class="ico-times delete" role="img" aria-label="Cancel"></i>
                                    </div>
                                </div> --}}
                            </div>
                            
                        </div>
                        <button class="btn btn-success mt-3">Add Chapter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@section('script')
    <script>
        const labelShowHide = document.querySelector("#hideshow-label")
        document.querySelector('#hideshow').addEventListener('click', function(e){
            if(e.target.checked){
                labelShowHide.innerHTML = 'Show'
            }else{
                labelShowHide.innerHTML = 'Hide'
            }
            console.log(e.target.checked)
        })
        labelShowHide.addEventListener('click',function(e){
            if(document.querySelector('#hideshow').checked){
                document.querySelector('#hideshow').checked =  false
                labelShowHide.innerHTML = 'Hide'
            }else{
                document.querySelector('#hideshow').checked =  true
                labelShowHide.innerHTML = 'Show'   
            }
        })
        const cache = document.querySelector('#cache-upload')
        const previewImage = document.querySelector('.preview-image-form')
        cache.addEventListener('change', handleImageCustom, false)
        function handleImageCustom(e){
            console.log()
            const divParent = document.createElement('div')
            divParent.setAttribute('class','col-md-3 col-sm-4 col-6')
            divParent.setAttribute('val', previewImage.children.length)
            const divParent1 = document.createElement('div')
            divParent1.setAttribute('class','preview-image')

            const divImg = document.createElement('div')
            divImg.setAttribute('class', 'img')
            const img = document.createElement('img')
            var reader = new FileReader();
            reader.onload = function (event) {
                img.src = event.target.result
            }
            reader.readAsDataURL(e.target.files[0]);
            divImg.appendChild(img)
            divParent1.appendChild(divImg)

            const file = cache.cloneNode(true)
            file.removeAttribute('style')
            file.removeAttribute('name')
            file.setAttribute('name','image[]')
            file.removeAttribute('id')
            divParent1.appendChild(file)

            const fileName = document.createElement('input')
            fileName.setAttribute('name', 'fileName[]')
            divParent1.appendChild(fileName)

            const close = document.createElement('i')
            close.setAttribute('class', 'ico-times delete')
            close.setAttribute('role','img')
            close.setAttribute('aria-label', 'Cancel')
            close.addEventListener('click', deletePhoto, false)
            divParent1.appendChild(close)

            divParent.appendChild(divParent1)
            previewImage.appendChild(divParent)

            e.target.value = null
        }
        function deletePhoto(e){

            const element = e.target.parentNode.parentNode
            const index = [...previewImage.children].indexOf(element)
            previewImage.removeChild(element)
            console.log(element, index)
        }

        
    </script>
@endsection