<div class="container border border-primary">
    <h1 class="text-center">Update Data</h1>
    <form method="post" action="{{route('adminEdit')}}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group">
            <input type="hidden"  value="{{$people->id}}" name="id">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{$people->first_name}}" placeholder="First Name">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{$people->last_name}}" placeholder="Last Name">
        </div>
        <div class="form-group">
            <label for="last_name">Keywords</label>
            <input type="text" class="form-control" id="keywords" name="keywords" value="{{$people->keywords}}" placeholder="Keywords">
        </div>

        <div class="form-group">
            <label for="resume">Resume File</label>
            <input type="hidden"  value="{{$people->resume}}" name="resume">
            <input type="file" class="form-control" id="resume" name="resume">
            {{$people->resume}}
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-primary float-right" href="/admin" role="button">Admin Page</a>

    </form>
</div>