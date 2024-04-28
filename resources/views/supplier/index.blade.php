@extends('tablar::page')

@section('title')
    সরবরাহকারী তালিকা
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        তালিকা
                    </div>
                    <h2 class="page-title">
                        সরবরাহকারী
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('suppliers.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            নতুন সরবরাহকারী
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            @if(config('tablar','display_alert'))
                @include('tablar::common.alert')
            @endif
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-sm table-vcenter table-bordered datatable">
                                <thead>
                                <tr>
                                    <th class="fw-bolder fs-4">নাম</th>
                                    <th class="fw-bolder fs-4">মোবাইল নং</th>
                                    <th class="fw-bolder fs-4">ঠিকানা</th>
                                    <th class="fw-bolder fs-4">বকেয়া</th>
                                    <th class="w-1"></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th class="text-end">মোট =</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                       <div class="card-footer d-flex align-items-center">
                            {{--{!! $suppliers->links('tablar::pagination') !!}--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="module">

        customerTables();
        function customerTables() {
            jQuery('.datatable').DataTable({
                "dom": '<"d-flex justify-content-between align-items-center header-actions mx-2 row my-3"' +
                    '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start mb-1" l>' +
                    '<"col-sm-12 col-lg-8 ps-xl-75 mb-1 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-between justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
                    '>t' +
                    '<"d-flex justify-content-between my-3 row"' +
                    '<"col-sm-12 col-md-6 mb-1"i>' +
                    '<"col-sm-12 col-md-6 mb-1 d-flex justify-content-end"p>' +
                    '>',
                "processing": true,
                "serverSide": true,
                "ordering": true,
                "ajax":{
                    "url": "{{ url('dataSuppliers') }}",
                    "dataType": "json",
                    "type": "GET",
                },
                "columns": [
                    { "data": "name" },
                    { "data": "phone", sorting: false },
                    { "data": "address", sorting: false },
                    { "data": "due",sorting: false },
                    { "data": "options", sorting: false },
                ],
                "columnDefs": [
                    { "sorting": [ "desc", "asc" ], "targets": [ "_all" ] }
                ],
                "buttons": [
                    {
                        extend: 'excelHtml5',
                        text: '<i class="ti ti-file-spreadsheet me-2"></i>Excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        },
                    },
                    {
                        extend: 'print',
                        text: '<i class="ti ti-printer me-2" ></i>Print',
                        exportOptions: {
                            columns: [0, 1, 2, 3],
                        },
                        messageTop:
                            '<h2 class="text-center my-3">পণ্য তালিকা</h2>',
                        customize: function(win) {
                            // Remove page title
                            $(win.document.body).find('h1').remove();
                        },
                        customizeData: function (data) {
                            data.styles = {
                                tableStriped: '', // Remove striped style
                                tableBorder: '', // Remove table border
                            };
                            return data;
                        }
                    },
                ],
                "footerCallback": function (row, data, start, end, display) {
                    var api = this.api();


                    // Sum the values in the 'total' column
                    var total = api.column(3, { page: 'current' }).data().reduce(function (acc, val) {
                        return acc + parseFloat(val);
                    }, 0);

                    jQuery(api.column(3).footer()).html(total.toFixed(0));

                },
            });
        }

        $(document).on("click", ".delete", function () {
            var id = $(this).data('id');
            Swal.fire({
                title: "আপনি কি নিশ্চিত?",
                text: "এটি ফিরে নেওয়া যাবে না!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "হ্যাঁ",
                cancelButtonText: "না",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ url('suppliers') }}/' + id,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            Swal.fire({
                                title: "ডিলেট হয়েছে!",
                                text: "আপনার ফাইলটি ডিলেট হয়েছে।",
                                icon: "success"
                            });
                            location.reload();
                        },
                        error: function (xhr, status, error) {
                            Swal.fire({
                                title: "Error!",
                                text: "An error occurred while deleting the customer.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        });

    </script>
@endsection
