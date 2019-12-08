@extends("template")
@section("content")
<h3>Data Pelanggan <i class="" style="color:gray;"></i></h3>
<?php if (Session::has("message")): ?>
<div class="alert alert-dismissible alert-info">
	{{ Session::get("message") }}
	<span class="close" data-dismiss="alert">&times;</span>
</div>
<?php endif; ?>
<table class="table">
	<thead>
		<tr>
			<th>ID Pelanggan</th>
			<th>Nama Pelanggan</th>
			<th>Alamat Pelanggan</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Option</th>
		</tr>
	</thead>
	<tbody>
		@foreach($customers as $customer)
		<tr>
			<td>{{ $customer->id_pelanggan }}</td>
			<td>{{ $customer->nama_pelanggan }}</td>
			<td>{{ $customer->alamat_pelanggan }}</td>
			<td>{{ $customer->created_at }}</td>
			<td>{{ $customer->updated_at }}</td>
			<td>
				<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal" onclick='Edit({!! json_encode($customer) !!})'>Edit</button>
				<a href='{{ url("/delete_customer/$customer->id_pelanggan") }}'>
					<button type="button" class="btn btn-outline-danger">Hapus</button>
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal" onclick="Add()">Tambah Data</button>
<div class="modal fade" id="modal">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Form Pelanggan</h4>
				<span class="close" data-dismiss="modal">&times;</span>
			</div>
			<form action="{{ url('/save_customer') }}" method="post">{{ csrf_field() }}
			<input type="hidden" name="action" id="action" />
			<div class="modal-body">
				ID Pelanggan
				<input type="text" name="id_pelanggan" id="id_pelanggan" class="form-control" required="" />
				Nama Pelanggan
				<input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" required="" />
				Alamat Pelanggan
				<input type="text" name="alamat_pelanggan" id="alamat_pelanggan" class="form-control" required="" />
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-outline-info">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	function Add(){
		document.getElementById("action").value = "insert";
		document.getElementById("id_pelanggan").value = "";
		document.getElementById("nama_pelanggan").value = "";
		document.getElementById("alamat_pelanggan").value = "";

	}

	function Edit(Pelanggan){

		document.getElementById("action").value = "update";
		document.getElementById("id_pelanggan").value = Pelanggan.id_pelanggan;
		document.getElementById("nama_pelanggan").value = Pelanggan.nama_pelanggan;
		document.getElementById("alamat_pelanggan").value = Pelanggan.alamat_pelanggan;


	}
</script>
@endsection