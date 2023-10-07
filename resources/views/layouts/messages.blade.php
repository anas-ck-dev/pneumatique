<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .alert-custom {
            display: flex;
            align-items: center;
        }
        .alert-custom  ul {
            display: flex;
            
        }
        .alert-custom i {
            margin-right: 10px;
        }

        .alert-custom {
            margin-top: -20px; /* Adjust as needed */
            margin-bottom: 10px; /* Adjust as needed */
        }

    </style>
</head>
<body>

@if($errors->any())
    <div class="alert alert-warning alert-dismissible fade show alert-custom" role="alert">
        <ul class="list-unstyled mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if($successMessages = Session::get('success'))
    @foreach ((array) $successMessages as $msg)
        <div class="alert alert-warning alert-dismissible fade show alert-custom " role="alert">
            {{ $msg }}
        </div>
    @endforeach
@endif



</body>
</html>
