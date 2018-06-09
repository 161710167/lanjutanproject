@extends('layouts.admin')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<div>
    

</div>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
           
                 

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
<br>
<br> 
                  <center> Berbagai Lowongan ada disini</center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</ceter>
</font>
</body>
</html>