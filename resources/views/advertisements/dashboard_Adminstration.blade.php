@extends('layouts.master')
@section('css')
@endsection
@section('title')
    Dashboard_adminstration
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Advertisements</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">
                    /Dashboard</span>
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
                        <th><input type="checkbox" id="cheCheckAll"></th>
                        <th class="border-bottom-0">Business Activity</th>
                        <th class="border-bottom-0">Company Name</th>
                        <th class="border-bottom-0">Person Name</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('allselect') }}" id="confirmForm">
                        @foreach ($Dashbord as $d)
                            <tr style="text-align: center" id="tr_{{ $d->id }}">
                                <td><input type="checkbox" class="checkboxclass" name="selected_ids[]"
                                        value="{{ $d->id }}"></td>
                                <td>{{ $d->Business_Activity }}</td>
                                <td>{{ $d->Company_name }}</td>
                                <td>{{ $d->Person_Name }}</td>
                            </tr>
                        @endforeach

                        <button type="submit" class="btn btn-success" id="Allselected" >CONFIRM </button>
                        {{-- <a href="{{ route('allselect')}}" class="btn btn-success" id="Allselected"> CONFIRM3 </a> --}}
                        <p></p>
                    </form>
                </tbody>
            </table>

        </div>
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed  -->
@endsection
@section('js')
    {{-- <script type = "text/javascript" >
    $(document).ready(function() {
        $('#checkboxesMain').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $(".checkbox").prop('checked', true);
            } else {
                $(".checkbox").prop('checked', false);
            }
        });

        $('.checkbox').on('click', function() {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('#checkboxesMain').prop('checked', true);
            } else {
                $('#checkboxesMain').prop('checked', false);
            }

            // التحقق من حالة صناديق الاختيار بعد النقرة
            if ($(this).is(':checked')) {
                // إذا تم تحديد صندوق الاختيار، قم بحذف الصف المرتبط به
                var rowId = $(this).data('id');
                $('#tr_' + rowId).remove();
            }
        });
    });
</script> --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(function() {
            $("#cheCheckAll").click(function() {
                $(".checkboxclass").prop('checked', $(this).prop('checked'));
            });

            $("#confirmForm").submit(function(e) {
                e.preventDefault();
                var allids = [];
                $("input:checkbox[name='selected_ids[]']:checked").each(function() {
                    allids.push($(this).val());
                });

                if (allids.length > 0) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('allselect') }}",
                        data: {
                            selected_ids: allids,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            swal("Good job!", "Created successfully!", "success");
                            $('#confirmForm')[0].reset();
                            window.location.replace("{{ route('user_dashboard') }}");
                        },
                        error: function() {
                            swal("Error!", "An error occurred", "error");
                        }
                    });
                } else {
                    swal("Error!", "No ids selected", "error");
                }
            });
        });
    </script>
@endsection
