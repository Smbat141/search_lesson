<div class="container border ">
    <h1 class="text-center">Enter Your Data</h1>
    @if($errors->all())
        <div class=" alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

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
            <label for="resume">Keywords</label>
            <input type="file" class="form-control" id="keywords" name="keywords" placeholder="Last Name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</div>
