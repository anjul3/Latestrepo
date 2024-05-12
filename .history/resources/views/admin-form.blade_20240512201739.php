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
      <form name="employee" id="employee" method="post" action="{{url('admin-form')}}">

       {{ csrf_field() }}

        <div class="form-group">
          <label for="">Field Name</label>
          <input type="text" id="name" name="field_name" class="@error('field_name') is-invalid @enderror form-control">
          @error('name')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
          @enderror
        </div>        

        <div class="form-group">
          <label for="">Field Label</label>
          <input type="text" id="email" name="field_label" class="@error('field_label') is-invalid @enderror form-control">
          @error('email')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
          @enderror
        </div>        

        <div class="form-group">
          <label for="">Validation Rules</label>
         <div class="form-group">

    <div class="checkbox-inline">
        <input type="checkbox" id="age_18" name="age[]" value="18" class="@error('age') is-invalid @enderror">
        <label for="age_18">18</label>
    </div>
    <div class="checkbox-inline">
        <input type="checkbox" id="age_19" name="age[]" value="19" class="@error('age') is-invalid @enderror">
        <label for="age_19">19</label>
    </div>
    <div class="checkbox-inline">
        <input type="checkbox" id="age_20" name="age[]" value="20" class="@error('age') is-invalid @enderror">
        <label for="age_20">20</label>
    </div>
    <!-- Add more checkboxes for other age ranges as needed -->
</div>

@error('age')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror

        </div></br>        

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>