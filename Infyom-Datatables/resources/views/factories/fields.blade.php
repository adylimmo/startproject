<!-- Factorycode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('factoryCode', 'Factorycode:') !!}
    {!! Form::text('factoryCode', null, ['class' => 'form-control']) !!}
</div>

<!-- Factoryname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('factoryName', 'Factoryname:') !!}
    {!! Form::text('factoryName', null, ['class' => 'form-control']) !!}
</div>

<!-- Factorytype Field -->
<div class="form-group col-sm-6">
    {!! Form::label('factoryType', 'Factorytype:') !!}
    {!! Form::select('factoryType', ['temporary' => 'temporary', 'permanent' => 'permanent'], null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['0' => 'inactive', '1' => 'active'], null, ['class' => 'form-control']) !!}
</div>

<!-- Note Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('note', 'Note:') !!}
    {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
</div>

<!-- Createddate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('createdDate', 'Createddate:') !!}
    {!! Form::date('createdDate', null, ['class' => 'form-control']) !!}
</div>

<!-- Createduserid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('createdUserID', 'Createduserid:') !!}
    {!! Form::text('createdUserID', null, ['class' => 'form-control']) !!}
</div>

<!-- Modifieddate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modifiedDate', 'Modifieddate:') !!}
    {!! Form::date('modifiedDate', null, ['class' => 'form-control']) !!}
</div>

<!-- Modifieduserid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modifiedUserID', 'Modifieduserid:') !!}
    {!! Form::text('modifiedUserID', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('factories.index') !!}" class="btn btn-default">Cancel</a>
</div>
