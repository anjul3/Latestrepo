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
        <h2>CREATE FORM</h2>
      </div>
      <div class="card-body">
        <form name="dynamic_form" method="post" action="{{url('store')}}">

          {{ csrf_field() }}

          <div class="form-group">
            <label for="">Field Name</label>
            <input type="text" id="field_name" name="field_name" class="@error('field_name') is-invalid @enderror form-control">
            @error('field_name')
            <!-- Error message display -->
            @enderror
          </div>

          <!-- Other form fields -->

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
                @else
                <tr>
                  <td colspan="7" class="text-center">No data available</td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>

</html>
