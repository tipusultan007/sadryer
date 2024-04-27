@php
$products = \App\Models\Product::where('product_type','dhan')->get();
 @endphp
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('product_id','ধানের তালিকা') }}</label>
    <div>
        <select name="product_id" id="product_id" class="select2" data-placeholder="সিলেক্ট করুন">
            <option value=""></option>
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }} - {{ $product->weight??0 }} কেজি</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('weight','ওজন (কেজি)') }}</label>
    <div>
        {{ Form::text('weight', $dryer->weight, ['class' => 'form-control' .
        ($errors->has('weight') ? ' is-invalid' : ''), 'placeholder' => 'Weight']) }}
        {!! $errors->first('weight', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('quantity','পরিমাণ (বস্তা)') }}</label>
    <div>
        {{ Form::text('quantity', $dryer->quantity, ['class' => 'form-control' .
        ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity']) }}
        {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('date','তারিখ') }}</label>
    <div>
        {{ Form::text('date', $dryer->date, ['class' => 'form-control flatpicker' .
        ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
        {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('status') }}</label>
    <div>
        <select name="status" id="status" class="select2" data-placeholder="সিলেক্ট করুন">
            <option value="active">চলমান</option>
            <option value="completed">সম্পন্ন</option>
        </select>
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <button type="submit" id="submitButton" class="btn btn-primary ms-auto ajax-submit">সাবমিট</button>
            </div>
        </div>
    </div>
@section('scripts')
    <script type="module">
        $("select").select2({
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
                defaultDate: "{{ $dryer->date??date('Y-m-d') }}"
            });
        });
    </script>
@endsection
