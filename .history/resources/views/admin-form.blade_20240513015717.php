<!DOCTYPE html>
<html>

<head>
  <title>Admin Form</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

  <div class="container mt-4">

    @if(session('status'))
    <div class="alert alert-success">
    {{ session('status') }}
    </div>
  @endif

    <div class="card">
      <div class="card-header text-center font-weight-bold">
     <a style="float:right;text-decoration:none;" href="{{ url('/') }}">Back</a></span>
        <h2>CREATE FORM</h2>
       
      </div>
      <div class="card-body">
        <form name="dynamic_form" method="post" action="{{url('store')}}">

          {{ csrf_field() }}

          <div class="form-group">
            <label for="">Field Name</label>
            <input type="text" id="field_name" name="field_name"
              class="@error('field_name') is-invalid @enderror form-control">
            @error('field_name')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
      @enderror
          </div>

          <div class="form-group">
            <label for="">Field Label</label>
            <input type="text" id="field_label" name="field_label"
              class="@error('field_label') is-invalid @enderror form-control">
            @error('field_label')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
      @enderror
          </div>

          <div class="form-group">
            <label for="" class="">Validation Rules</label>
            <div class="form-group">

              <div class="checkbox-inline">
                <input type="checkbox" id="min" name="min" value="min" class="@error('min') is-invalid @enderror">
                <label for="Min">Min</label>
                <input type="number" name="min_value" min="1" class="@error('min') is-invalid @enderror">
              </div>
              <div class="checkbox-inline">
                <input type="checkbox" id="max" name="max" value="max" class="@error('max') is-invalid @enderror">
                <label for="Max">Max</label>
                <input type="number" name="max_value" min="1" class="@error('max') is-invalid @enderror"
                  style="margin-top:5px;margin-left:-2px;">
              </div>
              <div class="checkbox-inline">
                <input type="checkbox" id="required" name="required" value="1"
                  class="@error('required') is-invalid @enderror">
                <label for="Required">Required</label>
              </div>
              <div class="checkbox-inline">
                <input type="checkbox" id="email" name="email" value="1" class="@error('email') is-invalid @enderror">
                <label for="Email">Email</label>
              </div>
            </div>



          </div></br>

          <button type="submit" class="btn btn-primary">Create</button>
        </form>
      </div>
      <hr>
      <div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card-header text-center font-weight-bold">
        <h2>USER'S FORM DATA</h2>
      </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Form Submit Count</th>
                        <th>Form Open Count</th>
                       
                    </tr>
                </thead>
                <tbody>
                @if(isset($admin_data) && count($admin_data) > 0)
                    @foreach($admin_data as $user)
                    <tr>
                        <td>{{ 'User-'.$user->id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->submit_count }}</td>
                        <td>{{ session('count', 0) }}</td>
                      
                    </tr>
                    @endforeach
                    @endif
                    <tr>   <td colspan="8" align="center">No Field Available</td> </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

    </div>
  </div>
</body>

</html>