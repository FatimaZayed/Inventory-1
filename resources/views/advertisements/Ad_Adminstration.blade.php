@extends('layouts.master')
@section('css')
@endsection
@section('title')
  Advertisements
@stop
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Advertisements</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /Adminstration</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">

						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<span class="sr-only">Toggle Dropdown</span>
								</button>

							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">

                    <div class="my-auto">
                        <div class="d-flex">
                            <h2 class="content-title mb-0 my-auto">Chain Nest Adminstration</h2></span>
                        </div>
                    </div>
				</div>
				<!-- row closed -->
			</div>
            <div class="card-body">
                <div class="table-responsive">

                    <table id="example" class="table key-buttons text-md-nowrap">
                        <thead>

                            <tr style="text-align: center" class="table-success">
                                <th class="border-bottom-0">id</th>
                                <th class="border-bottom-0">Person Name</th>
                                <th class="border-bottom-0">User Adminstration role=</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                            <tr style="text-align: center">
                                <td>{{ $d->id}}</td>
                                <td>{{ $d->name}}</td>
                                <td>
                                    @if (!empty($d->getRoleNames()))
                                        @foreach ($d->getRoleNames() as $v)
                                            <label class="badge badge-success">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection
