@extends('tablar::page')

@section('title')
    Dryer To Stock
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        List
                    </div>
                    <h2 class="page-title">
                        {{ __('Dryer To Stock ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('dryer-to-stocks.create') }}"
                           class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Create Dryer To Stock
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="table-responsive min-vh-100">
                            <table class="table card-table table-sm table-bordered table-vcenter text-nowrap datatable">
                                <thead>
                                <tr>
                                    <th class="fs-4">ড্রায়ার</th>
                                    <th class="fs-4">চাল</th>
                                    <th class="fs-4">ড্রায়ার কুড়া</th>
                                    <th class="fs-4">সিল্কি কুড়া</th>
                                    <th class="fs-4">খুদী</th>
                                    <th class="fs-4">তামরী</th>
                                    <th class="fs-4">তুষ</th>
                                    <th class="fs-4">বালি</th>
                                    <th class="fs-4">ওয়েস্টজ</th>

                                    <th class="w-1"></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse ($dryerToStocks as $dryerToStock)
                                    <tr>

                                        <td>{{ $dryerToStock->dryer->dryer_no }}</td>
                                        <td>{{ $dryerToStock->rice }}</td>
                                        <td>{{ $dryerToStock->dryer_kura }}</td>
                                        <td>{{ $dryerToStock->silky_kura }}</td>
                                        <td>{{ $dryerToStock->khudi }}</td>
                                        <td>{{ $dryerToStock->tamri }}</td>
                                        <td>{{ $dryerToStock->tush }}</td>
                                        <td>{{ $dryerToStock->bali }}</td>
                                        <td>{{ $dryerToStock->wastage }}</td>

                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item"
                                                           href="{{ route('dryer-to-stocks.show',$dryerToStock->id) }}">
                                                            View
                                                        </a>
                                                        <a class="dropdown-item"
                                                           href="{{ route('dryer-to-stocks.edit',$dryerToStock->id) }}">
                                                            Edit
                                                        </a>
                                                        <form
                                                            action="{{ route('dryer-to-stocks.destroy',$dryerToStock->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    onclick="if(!confirm('Do you Want to Proceed?')){return false;}"
                                                                    class="dropdown-item text-red"><i
                                                                    class="fa fa-fw fa-trash"></i>
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <td>No Data Found</td>
                                @endforelse
                                </tbody>

                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            {!! $dryerToStocks->links('tablar::pagination') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="module">
        $(".select2").select2({
            theme: 'bootstrap-5',
            width: '100%',
        });
    </script>
    <script type="module">
        document.addEventListener('DOMContentLoaded', function () {
            window.flatpickr(".flatpicker", {
                altInput: true,
                allowInput: true,
                altFormat: "d-m-Y",
                dateFormat: "Y-m-d",
                defaultDate: "{{ date('Y-m-d') }}"
            });
        });
    </script>
@endsection
