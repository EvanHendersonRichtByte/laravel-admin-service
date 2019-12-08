@extends("template")
@section("content")
<h3>Data Karyawan</h3>
<?php if (Session::has("message")): ?>
<div class="alert alert-dismissible alert-info">
	{{ Session::get("message") }}
	<span class="close" data-dismiss="alert">&times;</span>
</div>
<?php endif; ?>
<table class="table">
	<thead>
		<tr>
			<th>ID Karyawan</th>
			<th>Nama Karyawan</th>
			<th>Nomor</th>
			<th>Username</th>
			<th>Password</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Option</th>
		</tr>
	</thead>
	<tbody>
		@foreach($employees as $employee)
		<tr>
			<td>{{ $employee->id_karyawan }}</td>
			<td>{{ $employee->nama_karyawan }}</td>
			<td>{{ $employee->nomor }}</td>
			<td>{{ $employee->username }}</td>
			<td>{{ $employee->password }}</td>
			<td>{{ $employee->created_at }}</td>
			<td>{{ $employee->updated_at }}</td>
			<td>
				<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal" onclick='Edit({!! json_encode($employee) !!})'>Edit</button>
				<a href='{{ url("/delete_employee/$employee->id_karyawan") }}'>
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
				<h4>Form Karyawan</h4>
				<span class="close" data-dismiss="modal">&times;</span>
			</div>
			<form action="{{ url('/save_employee') }}" method="post">{{ csrf_field() }}
			<input type="hidden" name="action" id="action" />
			<div class="modal-body">
				ID karyawan
				<input type="text" name="id_karyawan" id="id_karyawan" class="form-control" required="" />
				Nama Karyawan
				<input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" required="" />
				nomor
				<input type="text" name="nomor" id="nomor" class="form-control" required="" />
				username
				<input type="text" name="username" id="username" class="form-control" required="" />
				password
				<input type="text" name="password" id="password" class="form-control" required="" />
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
		document.getElementById("id_karyawan").value = "";
		document.getElementById("nama_karyawan").value = "";
		document.getElementById("nomor").value = "";
		document.getElementById("username").value = "";
		document.getElementById("password").value = "";

	}

	function Edit(Karyawan){

		document.getElementById("action").value = "update";
		document.getElementById("id_karyawan").value = Karyawan.id_karyawan;
		document.getElementById("nama_karyawan").value = Karyawan.nama_karyawan;
		document.getElementById("nomor").value = Karyawan.nomor;
		document.getElementById("username").value = Karyawan.username;
		document.getElementById("password").value = Karyawan.password;


	}
</script>
@endsection
