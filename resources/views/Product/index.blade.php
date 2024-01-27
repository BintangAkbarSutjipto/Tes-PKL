<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- html poduk -->

@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
	<div class="alert-body">
		<strong>{{ $message }}</strong>
		<button type="button" class="close" data-dismiss="alert">×</button>
	</div>
</div>
@elseif($message = Session::get('error'))
<div class="alert alert-danger" role="alert">
	<div class="alert-body">
		<strong>{{ $message }}</strong>
		<button type="button" class="close" data-dismiss="alert">×</button>
	</div>
</div>
@endif
<div class="content-wrapper container-xxl p-0">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2>Produk</h2>
					<a href=" {{url('transaksi1')}} " class="btn btn-primary">Transaksi</a>
				</div>
			</div>
		</div>
	</div>
	<div class="content-body">
		<div class="row">
			<div class="col-12">
				<section>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header border-bottom">
									<h4 class="card-title">Produk
										<a href=" {{route('produk.create')}} " class="btn btn-primary">Tambah</a>
									</h4>
								</div>
								<div class="card-datatable">
									<table class="dt-responsive table">
										<thead>
											<tr>
												<th>Id</th>
												<th>Name</th>
												<th>Price</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($produk as $key => $produks)
											<tr>
												<td>{{$key+1}}</td>
												<td> {{$produks->name}} </td>
												<td> {{$produks->price}} </td>

												<td>
													<a href=" {{route('produk.edit', $produks->id)}} "
														class="btn btn-success btn-sm">Edit</a>
													<form method="POST"
														action="{{route('produk.destroy',[$produks->id])}}"
														onsubmit="return confirm('Apakah Data Akan DiHapus?')">
														@csrf
														@method('delete')
														<button class="btn btn-danger"
															data-id={{$produks->id}}>Delete</button>
													</form>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>
				</section>
			</div>
		</div>
	</div>
</div>