<div class="container border ">
    <h1 class="text-center">Enter Your Data</h1>
    <form method="post" action="" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="First Name">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
        </div>
        <div class="form-group">
            <label for="last_name">Keywords</label>
            <input type="text" class="form-control" id="keywords" name="keywords" value="{{ old('last_name') }}" placeholder="Keywords">
        </div>

        <div class="form-group">
            <label for="resume">Resume File</label>
            <input type="file" class="form-control" id="resume" name="resume">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</div>
