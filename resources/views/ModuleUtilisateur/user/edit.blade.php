<div id="edit-parent">
    <div class="modal fade" id="edit-users">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modification d'un user</h4>
                    <button type="button" class="btn btn-danger btn-xxs float-right" data-bs-dismiss="modal"
                            aria-label="Close"
                            onclick="$('#edit-form').trigger('reset')">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                @isset($user)
                    {!! Form::model($user, ['id' => 'edit-form','route' => ['utilisateur.users.update', $user->id], 'method' => 'patch','class' => 'form-horizontal']) !!}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        {!! Form::text('id', null, ['id' => 'edit-id_user','hidden']) !!}
                        {!! Form::text('editd_by', null, ['id' => 'edit-editd_by','hidden']) !!}
                        <div class="row">
                        <div class="mb-3">
                            {!! Form::label('name', 'Nom : *',['for' => 'create-name_user','class' => 'col-sm-6 form-label form-label-sm', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                            {!! Form::text('name', null, ['class' => 'form-control form-control-sm', 'required', 'maxlength' => 254]) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            {!! Form::label('prenom', 'Prenom : *',['for' => 'create-desc_user','class' => 'col-sm-6 form-label form-label-sm', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                            {!! Form::text('prenom', null, ['class' => 'form-control form-control-sm','required', 'maxlength' => 254]) !!}
                        </div>

                    </div>
                    <div class="row">
                        <div class="mb-3">
                            {!! Form::label('date_naissance', 'Date de naissance : *',['for' => 'create-desc_user','class' => 'col-sm-6 form-label form-label-sm', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                            {!! Form::text('date_naissance', null, ['class' => 'form-control form-control-sm','required', 'maxlength' => 254]) !!}
                        </div>

                    </div>
                    <div class="row">
                        <div class="mb-3">
                            {!! Form::label('email', 'Email : *',['for' => 'create-desc_user','class' => 'col-sm-6 form-label form-label-sm', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                            {!! Form::text('email', null, ['class' => 'form-control form-control-sm','required', 'maxlength' => 254]) !!}
                        </div>

                    </div>
                    <div class="row">
                                <div class="mb-3">
                                    {!! Form::label('label', 'Role : *',['for' => 'edite-nom','class' => 'col-lg-12 col-md-12 col-sm-12 form-label form-label-sm', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                                    @if(isset($roles))
                                        {!! Form::select('role_id', $roles, null, ['id' => 'edite-id_role','class' => 'form-select select2','style' => 'width: 100%;','placeholder' => 'Selectionner','required']) !!}
                                    @else
                                        {!! Form::select('role_id', array(), null, ['id' => 'edite-id_role','class' => 'form-select select2','style' => 'width: 100%;','placeholder' => 'Selectionner','required']) !!}
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                        <div class="mb-3">
                            {!! Form::label('password', 'mot de passe : *',['for' => 'create-desc_user','class' => 'col-sm-6 form-label form-label-sm', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                            {!! Form::text('password', null, ['class' => 'form-control form-control-sm','required', 'maxlength' => 254]) !!}
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
