@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <font size="6" color="magenta" 
                 class="panel-heading"><ceter> LOKER BANDUNG</center> 

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
