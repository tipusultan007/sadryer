
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">   {{ Form::label('dryer_id','ড্রায়ার') }}</label>
        <select name="dryer_id" id="dryer_id" class="select2 form-control " data-placeholder="সিলেক্ট করুন">
            <option value=""></option>
            @foreach($dryers as $dryer)
                <option data-weight="{{ $dryer->weight }}" value="{{ $dryer->id }}" {{ $dryer->id == $dryerToStock->dryer_id?'selected':'' }}>{{ $dryer->dryer_no }} - {{ $dryer->product->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">   {{ Form::label('weight','ওজন (কেজি)') }}</label>
        <div>
            {{ Form::text('weight', $dryerToStock->dryer->weight??0, ['class' => 'form-control' .
            ($errors->has('weight') ? ' is-invalid' : ''), 'placeholder' => 'Rice']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">   {{ Form::label('rice','চাউল (ওজন)') }}</label>
        <div>
            {{ Form::text('rice', $dryerToStock->rice, ['class' => 'form-control' .
            ($errors->has('rice') ? ' is-invalid' : ''), 'placeholder' => 'Rice']) }}
            {!! $errors->first('rice', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">চাউল</label>
        <select name="rice_product" id="rice_product" class="select2" data-placeholder="চাউল সিলেক্ট করুন" data-allow-clear="on">
            <option value=""></option>
            @foreach($rices as $product)
                <option value="{{ $product->id }}" {{ isset($dryerToStockItem->product_id)?$dryerToStockItem->product_id == $product->id?'selected':'':'' }}> {{ $product->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-3 mb-3">
        <label class="form-label">   {{ Form::label('dryer_kura','ড্রায়ার কুড়া') }}</label>
        <div>
            {{ Form::text('dryer_kura', $dryerToStock->dryer_kura, ['class' => 'form-control' .
            ($errors->has('dryer_kura') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('dryer_kura', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">   {{ Form::label('silky_kura','সিল্কি কুড়া') }}</label>
        <div>
            {{ Form::text('silky_kura', $dryerToStock->silky_kura, ['class' => 'form-control' .
            ($errors->has('silky_kura') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('silky_kura', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">   {{ Form::label('khudi','খুদী') }}</label>
        <div>
            {{ Form::text('khudi', $dryerToStock->khudi, ['class' => 'form-control' .
            ($errors->has('khudi') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('khudi', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">   {{ Form::label('tamri','তামরী') }}</label>
        <div>
            {{ Form::text('tamri', $dryerToStock->tamri, ['class' => 'form-control' .
            ($errors->has('tamri') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('tamri', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">   {{ Form::label('tush','তুষ') }}</label>
        <div>
            {{ Form::text('tush', $dryerToStock->tush, ['class' => 'form-control' .
            ($errors->has('tush') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('tush', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">   {{ Form::label('bali','বালি') }}</label>
        <div>
            {{ Form::text('bali', $dryerToStock->bali, ['class' => 'form-control' .
            ($errors->has('bali') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('bali', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">   {{ Form::label('wastage','ওয়েস্টেজ') }}</label>
        <div>
            {{ Form::text('wastage', $dryerToStock->wastage, ['class' => 'form-control' .
            ($errors->has('wastage') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('wastage', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">   {{ Form::label('date','তারিখ') }}</label>
        <div>
            {{ Form::text('date', $dryerToStock->date, ['class' => 'form-control flatpicker' .
            ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>
@section('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#dryer_id').on('change', function() {
                const selectedOption = $(this).find('option:selected');
                const dataWeight = selectedOption.attr('data-weight');
                $("#weight").val(dataWeight);
            });
        });
    </script>
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
