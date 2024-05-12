<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dynamic Form Moudule</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="row">
<div class="jumbotron text-center">
  <div class="btn-group">
     <a href="{{ route('admin-form') }}" class="btn btn-primary">ADMIN SECTION</a>  
 		 <a href="{{ route('user-form') }}" class="btn btn-primary" style="margin-left:5px;">NORMAL USER SECTION</a>
       
        </button>
      </div>
</div>
</div>

</body>
</html>

