    @extends('layouts.app')
    @section('content')
        @if($errors->any())
            <div class="container mt-5 pt-5">
                <div class="row justify-content-center ">
                    <div class="co-12">
                        <h2>{{ implode('', $errors->all(':message')) }}</h2>
                    </div>
                </div>
            </div>
        @endif
        <div class="container mt-5">
            <form action="{{route('updatead',[ "id" =>$announcement->id])}}" method="POST" enctype="multipart/form-data">
                @csrf

                <select class="form-select" aria-label="categories" name="category_id" id="category_id">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                <div class="row">
                    <div class="col-12 py-3">
                        <input type="text" class="form-control" placeholder="Title" name="title" id="title" value="{{$announcement->title}}">
                    </div>
                    <div class="col-12  py-3">
                        <input type="text" class="form-control" placeholder="Brand" name="brand" id="brand"  value="{{$announcement->brand}}">
                    </div>
                    <div class="col-12  py-3">
                        <input type="number" class="form-control" placeholder="Price" name="price" id="price"  value="{{$announcement->price}}">
                    </div>
                    <div class="col-12  py-3">
                        <textarea type="text" class="form-control" placeholder="Description" name="description" id="description"> {{$announcement->description}}</textarea>
                    </div>
                    <div class="input-group mb-3 mt-5">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                        <input type="file" name="file" class="form-control" id="inputGroupFile01" onchange="previewFile(this)" value="{{ asset('announcement/images')}}/{{$announcement->file}}">
                        <label class="custom-file-label" for="inputGroupFile01">Choose</label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
                </form>
                <div class="row text-center">
                    <div class="col-12">
                        <img class="mt-2" id="previewImg" alt="announcement image" style="max-width: 130px;margin-top:20px;" />
                    </div>
                </div>
        </div>

        </div>
    <script>
        function previewFile(input){
            var file=$("input[type=file]").get(0).files[0];
            if(file)
            {
                var reader = new FileReader();
                reader.onload = function(){
                    $('#previewImg').attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>

    @endsection
