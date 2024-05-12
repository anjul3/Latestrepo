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
    @if(session('error'))
    <div class="alert alert-danger">
    {{ session('error') }}
    </div>
  @endif
  <h1>This page has been viewed {{ $count }} times.</h1>

    <div class="card">
      <div class="card-header text-center font-weight-bold">
        <h2>USER FORM</h2>
      </div>


      <div class="card-body">
        <form name="employee" id="employee" method="post" action="{{url('user-store')}}">

          {{ csrf_field() }}
          @if($form_data->isEmpty())
      <p>No Field Available</p>
    @else
          @foreach($form_data as $item)
          <div class="form-group">
            <label for="exampleInputEmail1">{{ $item->field_label }}</label>
            <input type="text" id="name" placeholder="{{ $item->field_label }}"
              name="{{ strtolower(str_replace(' ', '_', $item->field_name)) }}"
              class="@error('name') is-invalid @enderror form-control">
            @error(strtolower(str_replace(' ', '_', $item->field_name)))
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
      @enderror
          </div>


          @endforeach
          <br>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>

      @endif
    </div>
  </div>
</body>

</html>