<div id="show-parent">
    <div class="modal fade" id="show-users">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Détails d'un user</h4>
                    <button type="button" class="btn btn-danger btn-xxs float-right" data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @isset($user)
                        <form class="forms-sample form-horizontal">

                            <div class="mb-3 row">
                                {!! Form::label('name', 'Nom : ',['class' => 'form-label form-label-sm col-lg-4 col-6', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                                <label class="form-label  col-lg-8 col-6">
                                    {{ $user->name }}
                                </label>
                            </div>
                            <div class="mb-3 row">
                                {!! Form::label('prenom', 'Prénom : ',['class' => 'form-label form-label-sm col-lg-4 col-6', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                                <label class="form-label  col-lg-8 col-6">
                                    {{ $user->prenom }}
                                </label>
                            </div>
                            <div class="mb-3 row">
                                {!! Form::label('email', 'Email : ',['class' => 'form-label form-label-sm col-lg-4 col-6', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                                <label class="form-label  col-lg-8 col-6">
                                    {{ $user->email }}
                                </label>
                            </div>
                            <div class="mb-3 row">
                                {!! Form::label('date_naissance', 'Date de naissance : ',['class' => 'form-label form-label-sm col-lg-4 col-6', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                                <label class="form-label  col-lg-8 col-6">
                                    {{ $user->date_naissance }}
                                </label>
                            </div>
                            <div class="mb-3 row">
                                {!! Form::label('role', 'Role : ',['class' => 'form-label form-label-sm col-lg-4 col-6', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                                <label class="form-label  col-lg-8 col-6">
                                    {{ $user->role->name }}
                                </label>
                            </div>
                            <div class="mb-3 row">
                                {!! Form::label('created_at', 'Créée le : ',['class' => 'col-sm-6 form-label form-label-sm col-lg-4 col-6', 'style'=>'font-weight:800;color:#1f1f1f;']) !!}
                                <label class="form-label  col-lg-8 col-6">
                                    {!! isset($user->created_at) ? $user->created_at->format('d/m/Y à H:i:s') : '' !!}
                                </label>
                            </div>
                        </form>
                    @endisset
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger btn-xxs float-left" data-bs-dismiss="modal">
                        <i class="mdi mdi mdi-close-circle-outline"></i> Fermer
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
