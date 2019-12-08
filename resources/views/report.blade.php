@extends("template")
@section("content")
<div class="col-md-12 card">
	<div class="card-header bg-light text-white">
		<h4 style="color:#000000;">Data Transaksi</h4>
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID Transaksi</th>
					<th>Layanan</th>
					<th>Pelanggan</th>
					<th>Karyawan</th>
					<th>Tgl Layanan</th>
				</tr>
			</thead>
			<tbody>
				@foreach($transaction as $transaksi)
				<tr>
					<td>{{ $transaksi->id_transaksi }}</td>
					<td>
						<ul>
							@foreach($transaksi->detail_transaksi as $detail)
						<li>{{ $detail->layanan->nama_layanan }}</li>
						@endforeach
					</ul>
					</td>
					<td>{{ $transaksi->pelanggan->nama_pelanggan }}</td>
					<td>{{ $transaksi->karyawan->nama_karyawan }}</td>
					<td>{{ $transaksi->tgl_layanan }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
