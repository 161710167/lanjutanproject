@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Lamaran
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('lowongan.update',$r->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('file_cv') ? ' has-error' : '' }}">
			  			<label class="control-label"></label>	
			  			<input type="text" name="file_cv" value="{{ $r->file_cv}}" class="form-control"  required>
			  			@if ($errors->has('file_cv'))
                            <span class="help-block">
                                <strong>{{ $errors->first('file_cv) }}</strong>
                            </span>
                        @endif
			  		</div>

					<div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
			  			<label class="control-label">status</label>	
			  			<input type="text" name="status" value="{{ $r->status
                            <span class="help-block">
                                <strong>{{ $errors->first('status') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('lowongan') ? ' has-error' : '' }}">
			  			<label class="control-label">Lowongan</label>	
			  			<input type="text" name="low_id" value="{{ $r->lowongan
                            <span class="help-block">
                                <strong>{{ $errors->first('lowongan') }}</strong>
                            </span>
                        @endif
			  		</div>
			 
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection
