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
      <form name="dynamic_form"  method="post" action="{{url('store')}}">

       {{ csrf_field() }}

        <div class="form-group">
          <label for="">Field Name</label>
          <input type="text" id="field_name" name="field_name" class="@error('field_name') is-invalid @enderror form-control">
          @error('field_name')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
          @enderror
        </div>        

        <div class="form-group">
          <label for="">Field Label</label>
          <input type="text" id="field_label" name="field_label" class="@error('field_label') is-invalid @enderror form-control">
          @error('field_label')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
          @enderror
        </div>        

        <div class="form-group">
          <label for="" class="">Validation Rules</label>
         <div class="form-group">

    <div class="checkbox-inline">
        <input type="checkbox" id="min" name="min" value="1" class="@error('min') is-invalid @enderror">
        <label for="Min">Min</label>
    </div>
    <div class="checkbox-inline">
        <input type="checkbox" id="max" name="max" value="1" class="@error('max') is-invalid @enderror">
        <label for="Max">Max</label>
    </div>
    <div class="checkbox-inline">
        <input type="checkbox" id="required" name="required" value="1" class="@error('required') is-invalid @enderror">
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
  </div>
</div>  
</body>
</html>