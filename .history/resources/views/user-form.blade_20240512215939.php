<!DOCTYPE html>
<html>
<head>
    <title>User Form</title>
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
      <h2>USER FORM</h2>
    </div>
    @if($form_data->isEmpty())
        <p>No data available</p>
    @else
    @foreach($form_data as $item)
    <div class="card-body">
      <form name="employee" id="employee" method="post" action="{{url('user-store')}}">

       {{ csrf_field() }}

        <div class="form-group">
          <label for="exampleInputEmail1">Field Name</label>
          <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror form-control">
          @error('name')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
          @enderror
        </div>        

        <div class="form-group">
          <label for="exampleInputEmail1">Field Label</label>
          <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror form-control">
          @error('email')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
          @enderror
        </div>        

        <div class="form-group">
          <label for="exampleInputEmail1">Validation Rules</label>
          <input type="number" id="age" name="age" class="@error('age') is-invalid @enderror form-control">
          @error('age')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
          @enderror
        </div></br>        

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

    @endforeach
  </div>
</div>  
</body>
</html>