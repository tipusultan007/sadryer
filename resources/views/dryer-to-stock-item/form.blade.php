
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('dryer_to_stock_id') }}</label>
    <div>
        {{ Form::text('dryer_to_stock_id', $dryerToStockItem->dryer_to_stock_id, ['class' => 'form-control' .
        ($errors->has('dryer_to_stock_id') ? ' is-invalid' : ''), 'placeholder' => 'Dryer To Stock Id']) }}
        {!! $errors->first('dryer_to_stock_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">dryerToStockItem <b>dryer_to_stock_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('product_id') }}</label>
    <div>
        {{ Form::text('product_id', $dryerToStockItem->product_id, ['class' => 'form-control' .
        ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => 'Product Id']) }}
        {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">dryerToStockItem <b>product_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('quantity') }}</label>
    <div>
        {{ Form::text('quantity', $dryerToStockItem->quantity, ['class' => 'form-control' .
        ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity']) }}
        {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">dryerToStockItem <b>quantity</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('type') }}</label>
    <div>
        {{ Form::text('type', $dryerToStockItem->type, ['class' => 'form-control' .
        ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => 'Type']) }}
        {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">dryerToStockItem <b>type</b> instruction.</small>
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
