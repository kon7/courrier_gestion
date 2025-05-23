<div id="edit-parent">
    <div class="modal fade" id="edit-clients">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modification d'un client</h4>
                    <button type="button" class="btn btn-danger btn-xxs float-right" data-bs-dismiss="modal"
                            aria-label="Close"
                            onclick="$('#edit-form').trigger('reset')">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                @isset($client)
                    {!! Form::model($client, ['id' => 'edit-form','route' => ['client.clients.update', $client->id], 'method' => 'patch','class' => 'form-horizontal']) !!}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        {!! Form::text('id', null, ['id' => 'edit-id_client','hidden']) !!}
                        {!! Form::text('editd_by', null, ['id' => 'edit-editd_by','hidden']) !!}
                <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                        <div class="row">
                        <div class="mb-3">
                            {!! Form::label('name', 'Nom : *',['for' => 'create-name_client','class' => 'col-sm-6 form-label form-label-sm', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                            {!! Form::text('name', null, ['class' => 'form-control form-control-sm', 'required', 'maxlength' => 254]) !!}
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                    <div class="row">
                        <div class="mb-3">
                            {!! Form::label('prenom', 'Prenom : *',['for' => 'create-desc_client','class' => 'col-sm-6 form-label form-label-sm', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                            {!! Form::text('prenom', null, ['class' => 'form-control form-control-sm','required', 'maxlength' => 254]) !!}
                        </div>

                    </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="row">
                        <div class="mb-3">
                            {!! Form::label('email', 'Contacte : *',['for' => 'create-desc_client','class' => 'col-sm-6 form-label form-label-sm', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                            {!! Form::text('email', null, ['class' => 'form-control form-control-sm','required', 'maxlength' => 254]) !!}
                        </div>
                    </div>
                    </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="row">
                        <div class="mb-3">
                            {!! Form::label('date_naissance', 'Date de naissance : *',['for' => 'create-desc_client','class' => 'col-sm-6 form-label form-label-sm', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                            {!! Form::text('date_naissance', null, ['class' => 'form-control form-control-sm','required', 'maxlength' => 254]) !!}
                        </div>

                    </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                    <div class="row">
                        <div class="mb-3">
                            {!! Form::label('profession', 'Profession : *',['for' => 'create-desc_client','class' => 'col-sm-6 form-label form-label-sm', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                            {!! Form::text('profession', null, ['class' => 'form-control form-control-sm','required', 'maxlength' => 254]) !!}
                        </div>

                    </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                    <div class="row">
                                <div class="mb-3">
                                    {!! Form::label('domaine_id', 'Domaine de formation : *',['for' => 'create-id_role','class' => 'col-lg-12 col-md-12 col-sm-12 form-label form-label-sm', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                                    @if(isset($domaines))
                                        {!! Form::select('domaine_id', $domaines, null, ['id' => 'create-id_domaine','class' => 'form-select select2','style' => 'width: 100%;','placeholder' => 'Selectionner','required']) !!}
                                    @else
                                        {!! Form::select('domaine_id', array(), null, ['id' => 'create-id_domaine','class' => 'form-select select2','style' => 'width: 100%;','placeholder' => 'Selectionner','required']) !!}
                                    @endif
                                </div>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                            <div class="row">
                        <div class="mb-3">
                            {!! Form::label('date_debut', 'Date de debut de formation : *',['for' => 'create-desc_client','class' => 'col-sm-6 form-label form-label-sm', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                            {!! Form::text('date_debut', null, ['class' => 'form-control form-control-sm','id'=>'date_debut', 'maxlength' => 254]) !!}
                        </div>

                    </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                    <div class="row">
                        <div class="mb-3">
                            {!! Form::label('date_fin', 'Date de fin de formation : *',['for' => 'create-desc_client','class' => 'col-sm-6 form-label form-label-sm', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                            {!! Form::text('date_fin', null, ['class' => 'form-control form-control-sm','id'=>'date_fin', 'maxlength' => 254]) !!}
                        </div>

                    </div>
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
