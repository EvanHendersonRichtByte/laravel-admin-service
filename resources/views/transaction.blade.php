@extends("template")
@section("content")
<div class="col-sm-12">
	<div class="card">
		<div class="card-header bg-light text-dark">
			<h3>Transaksi Layanan</h3>
		</div>
		<div class="card-body">
			<?php if (Session::has("message")): ?>
				<div class="alert alert-success">
					{{ Session::get("message") }}
				</div>
			<?php endif; ?>
			<form action="{{ url('save_transaction') }}" method="post">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-sm-3">
						<span style="font-size: 17px;">Pilih Layanan</span>
					</div>
					<div class="col-sm-5">

					@foreach($services as $service)
					<input type="checkbox" name="id_layanan[]" value="{{ $service->id_layanan }}" />
					{{ $service->nama_layanan }}
					@endforeach

					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						Pilih Pelanggan
					</div>
					<div class="col-sm-5">
						<select class="form-control" name="id_pelanggan" required>
							@foreach($customer as $customers)
							<option value="{{ $customers->id_pelanggan }}">
								{{ $customers->nama_pelanggan }}
							</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
					Tanggal Layanan
					</div>
					<div class="col-sm-5">
						<input type="date" name="tgl_layanan" class="form-control" required>
					</div>
				</div>
				<button type="submit" class="btn btn-outline-success">
					Kirim
				</button>
			</form>
		</div>
	</div>
</div>
@endsection
