<div class="row border border">
    <div class="col-lg-4">
        <form method="post" action="{{ route('adminPage') }}" >
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
                <label for="last_name">Keyword</label>
                <input type="text" class="form-control" id="keyword" name="keyword" value="{{ old('last_name') }}" placeholder="Keyword">
            </div>
            <div class="form-group">
                <label for="last_name">Resume(file name)</label>
                <input type="text" class="form-control" id="file_name" name="file_name" value="{{ old('file_name') }}" placeholder="Keyword">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>

        </form>
    </div>
</div>

<div style="margin: 0px 50px 0px 50px">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Keywords</th>
            <th>Resume</th>
        </tr>
        </thead>
        <tbody>

            @foreach($datas as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->first_name}}</td>
                    <td>{{$data->last_name}}</td>
                    <td>{{$data->keywords}}</td>
                    <td>{{$data->resume}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>