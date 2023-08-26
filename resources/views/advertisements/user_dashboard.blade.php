@extends('layouts.master')
@section('css')
@endsection
@section('title')
    User Details
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Advertisements</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">
                    /Adminstration</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">

            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <span class="sr-only">Toggle </span>
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
                        <th class="border-bottom-0">User Adminstration role= admin</th>
                        <th class="border-bottom-0">User Adminstration role= admin</th>
                    </tr>


                </thead>
                <tbody>


                    @if (!empty($selected))
                        @foreach ($selected as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->Company_name }}</td>
                                <td>{{ $company->Person_Name }}</td>
                            </tr>
                        @endforeach
                    @endif
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
