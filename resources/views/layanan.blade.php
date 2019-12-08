@extends("template")
@section("content")

<h3 class="text" style="color:#000000;">Data Layanan</h3>
<?php if (Session::has("message")): ?>
<div class="alert alert-dismissible alert-success">
	{{Session::get("message") }}
	<span class="close" data-dismiss="alert">&times;</span>
</div>
<?php endif;?>
<div class="list-">
	@foreach($service as $layanan)
	<form action="{{url('service/search')}}" method="post">
	</form>
	<div class="list-group-item" >
		<div class="row">
			<div class="col-sm-3">
				<img src="{{ url ('storage/cover_layanan/'.$layanan->image) }}" width="250" height="160" class="image" />
			</div>
			<div class="col-sm-9">
				<h5>{{ $layanan->nama_layanan }}</h5>
				<!-- <h6 style="color: blue">Merk:{{ $layanan->merk }}</h6>
				<h6 style="color: red">Jenis:{{ $layanan->jenis }}</h6>
				<h6 style="color: red">Tahun pembuatan:{{ $layanan->tahun_pembuatan }}</h6> -->
				<h6 style="color: blue">Biaya transaksi per hari:{{ $layanan->biaya_layanan }}</h6>
				<button type="button" class="btn btn-md btn-outline-primary" data-toggle="modal" data-target="#modal"  onclick='Edit({!! json_encode($layanan) !!})'>Edit</button>
				<a href="{{ url('delete_service/'.$layanan->id_layanan) }}" onclick="return confirm('Are you sure?')">
					<button type="button" class="btn btn-md btn-outline-danger">
						Hapus
					</button>
				</a>
			</div>
		</div>
	</div>
	@endforeach
	{{ $service->links() }}
	<!-- untuk menampilkan nomor halaman -->
	<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal" onclick="Add()" style="margin-top: 10px;">Tambah</button>
</div>
	<div class="modal fade" id="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3>Form layanan</h3>
					<span class="close" data-dismiss="modal">&times;</span>
				</div>
				<form action="{{url ('save_service') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="action" id="action" />
					<div class="modal-body" style="font-weight: bold;">
						ID Layanan
						<input type="text" name="id_layanan" id="id_layanan" class="form-control" required />
						Nama Layanan
						<input type="text" name="nama_layanan" id="nama_layanan" class="form-control" required />
						Biaya
						<input type="text" name="biaya_layanan" id="biaya_layanan" class="form-control" required />
						Cover
						<input type="file" name="image" id="image" class="form-control" accept="image/jpeg" />
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-outline-success">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function Add(){
			$("#id_layanan").val(""); //sama seperti document.getElementById('id_layanan').value = layanan.id_layanan
			$("#nama_layanan").val("");
			$("#biaya_layanan").val("");
			$("#image").val("");
			$("#image").prop("required",true); // enable required property
			$("#action").val("insert");
		}

		function Edit(layanan){
			$("#id_layanan").val(layanan.id_layanan); //sama seperti document.getElementById('id_layanan').value = layanan.id_layanan
			$("#nama_layanan").val(layanan.nama_layanan);
			$("#biaya_layanan").val(layanan.biaya_layanan);
			$("#image").val("");
			$("#image").prop("required", false); // disable required property
			$("#action").val("update");
		}
	</script>
	@endsection
