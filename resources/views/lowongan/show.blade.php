@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Lowongan
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama Lowongan</label>	
			  			<input type="text" name="nama_low" class="form-control" value="{{ $q->nama_low }}"  readonly>
			  		</div>
        			<div class="form-group">
			  			<label class="control-label">Tanggal Terbit Lowongan</label>	
			  			<input type="date" name="tgl_mulai" class="form-control" value="{{ $q->tgl_mulai }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Lokasi</label>	
			  			<input type="text" name="lokasi" class="form-control" value="{{ $q->lokasi }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Gaji</label>	
			  			<input type="number" name="gaji" class="form-control" value="{{ $q->gaji }}"  readonly>
			  		</div>

						<div class="form-group">
			  			<label class="control-label">Deskripsi Lowongan</label>	
			  			<input type="text" name="deskripsi_iklan" class="form-control" value="{{ $q->deskripsi_iklan }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Deskripsi Perusahaan</label>	
			  			<input type="text" name="pers_id" class="form-control" value="{{ $q->Perusahaan->deskripsi }}"  readonly>
			  		</div>
			  	</div>
			  	Note: Lowongan Berlaku Sampai 1 Bulan Dari Terbit Tanggal
			</div>	
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>


@endsection