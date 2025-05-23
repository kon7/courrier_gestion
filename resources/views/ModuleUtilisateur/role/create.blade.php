<div id="create-parent">
    <div class="modal fade" id="create-roles">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Enregistrement d'un role</h4>
                    <button type="button" class="btn btn-danger btn-xxs float-right" data-bs-dismiss="modal"
                            aria-label="Close"
                            onclick="$('#create-form').trigger('reset')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['id' => 'create-form','route' => 'utilisateur.roles.store','class' => 'forms-sample form-horizontal']) !!}
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3">
                            {!! Form::label('name', 'Libellé du role : *',['for' => 'create-name_role','class' => 'col-sm-6 form-label form-label-sm', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                            {!! Form::text('name', null, ['class' => 'form-control form-control-sm', 'required', 'maxlength' => 254]) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            {!! Form::label('description', 'Description du role : ',['for' => 'create-desc_role','class' => 'col-sm-6 form-label form-label-sm', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                            {!! Form::text('description', null, ['class' => 'form-control form-control-sm', 'maxlength' => 254]) !!}
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-warning btn-xxs float-left" data-dismiss="modal"
                            onclick="$('#create-form').trigger('reset')">
                        <i class="mdi mdi-eraser"></i> Effacer
                    </button>
                    <button type="submit" id="create-button" class="btn btn-success  btn-xxs float-right"
                            form="create-form" value="Enregistrer">
                        <i class="mdi mdi-content-save"></i> Enregistrer
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
