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
            <input type="text" id="field_name" name="field_name"
              class="@error('field_name') is-invalid @enderror form-control">
            @error('field_name')
       
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
      <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Users Data</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <!-- Add more table headings as needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <!-- Add more table cells for other user data -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    </div>
  </div>
</body>

</html>