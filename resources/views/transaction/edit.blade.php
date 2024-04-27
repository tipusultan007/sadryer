@extends('tablar::page')

@section('title', 'Update Transaction')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Update
                    </div>
                    <h2 class="page-title">
                        {{ __('Transaction ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('transactions.index') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Transaction List
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
                        <div class="card-header">
                            <h3 class="card-title">Transaction Details</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST"
                                  action="{{ route('transactions.update', $transaction->id) }}" id="ajaxForm" role="form"
                                  enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf
                                {{--@include('transaction.form')--}}
                                <div class="mb-3">
                                    <label for="amount" class="form-label">টাকা:</label>
                                    <input type="text" name="amount" class="form-control" value="{{ $transaction->amount }}">
                                </div>

                                <div class="mb-3">
                                    <label for="note" class="form-label">নোট:</label>
                                    <textarea name="note" class="form-control">{{ $transaction->note }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="date" class="form-label">তারিখ:</label>
                                    <input type="text" name="date" class="form-control flatpicker" value="{{ $transaction->date }}">
                                </div>

                                <div class="mb-3">
                                    <label for="account_id" class="form-label">অ্যাকাউন্ট</label>
                                    <select name="account_id" class="form-select select2">
                                        @foreach($accounts as $account)
                                            <option value="{{ $account->id }}" {{ $transaction->account_id == $account->id ? 'selected' : '' }}>
                                                {{ $account->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">আপডেট</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('scripts')
    <script type="module">
        $(document).ready(function () {
            $(".select2").select2({
                width: '100%',
                theme: 'bootstrap-5',
                allowClear: true,
                placeholder: 'সিলেক্ট করুন'
            });

        })
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