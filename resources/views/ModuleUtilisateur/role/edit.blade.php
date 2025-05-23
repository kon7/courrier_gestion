<div id="edit-parent">
    <div class="modal fade" id="edit-roles">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modification d'un role</h4>
                    <button type="button" class="btn btn-danger btn-xxs float-right" data-bs-dismiss="modal"
                            aria-label="Close"
                            onclick="$('#edit-form').trigger('reset')">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                @isset($role)
                    {!! Form::model($role, ['id' => 'edit-form','route' => ['utilisateur.roles.update', $role->id], 'method' => 'patch','class' => 'form-horizontal']) !!}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        {!! Form::text('id', null, ['id' => 'edit-id_role','hidden']) !!}
                        {!! Form::text('editd_by', null, ['id' => 'edit-editd_by','hidden']) !!}
                        <div class="row">
                            <div class="mb-3">
                                {!! Form::label('name', 'Libellé du role : *',['for' => 'edit-name','class' => 'col-sm-6 form-label form-label-sm', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                                {!! Form::text('name', null, ['class' => 'form-control form-control-sm', 'required', 'maxlength' => 254]) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                {!! Form::label('description', 'Description du role : ',['for' => 'edit-description','class' => 'col-sm-6 form-label form-label-sm', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                                {!! Form::text('description', null, ['class' => 'form-control form-control-sm', 'required', 'maxlength' => 254]) !!}
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-warning btn-xxs float-left" data-dismiss="modal"
                                onclick="$('#edit-form').trigger('reset')">
                            <i class="mdi mdi-eraser"></i> Effacer
                        </button>
                        <button type="submit" id="edit-button" class="btn btn-success  btn-sm float-right"
                                form="edit-form" value="Enregistrer">
                            <i class="mdi mdi-content-save"></i> Enregistrer
                        </button>
                    </div>

                    {!! Form::close() !!}
                @endisset
            </div>
        </div>
    </div>
</div>
