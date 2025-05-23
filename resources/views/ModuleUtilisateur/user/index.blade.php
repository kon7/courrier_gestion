@extends('AppTemplate.app')

@section('title','User')

@section('module','Utilisateur')

@section('page','Gestion des users')

@section('content')
<br>
    <br>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h3 class="mb-3 mb-md-0">Liste des users enregistrés</h3>
                </div>
                <div class="d-flex align-items-center flex-wrap text-nowrap">
                        <button id="create-groupe-button" type="button" class="btn btn-primary float-right"
                                onclick="lunchCreateModal()">
                            <i class="btn-icon" data-feather="plus"></i> Nouveau
                        </button>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-12 stretch-card">
                    <div class="row flex-grow-1">
                        @include('ModuleUtilisateur.user.table')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('ModuleUtilisateur.user.create')
    @include('ModuleUtilisateur.user.edit')
    @include('ModuleUtilisateur.user.show')

@endsection


@section('scripts')
    <script>

        $(function () {
            // Datatable parameters
            var t = $('#users-table').DataTable({
                "oLanguage": {
                    "sUrl": "{{ url('datatables_french.json') }}"
                },
                'destroy': true,
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': false,
                'pageLength': 10,
                'order': [
                    [1, "asc"]
                ],
                'columnDefs': [{
                    'targets': [0, 2],
                    'searchable': false,
                    'orderable': false
                }]
            });

            t.on('order.dt search.dt', function () {
                t.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();

        });


        function lunchCreateModal() {
            var url = "{{ route('utilisateur.users.create') }}";
            $.ajax({
                url: url,
                type: "get",
                datatype: "html"
            }).done(function (create) {
                // append liste of users to the element
                $("#create-parent").empty().html(create);

                // showing create modal dialogue
                $("#create-users").modal('show');

                //Initialize Select2 Elements
                $('.select2').select2({
                    dropdownParent: $('#create-users')
                });
                $("#date_naissance").datetimepicker({
                    locale: 'fr',
                    format: 'YYYY-MM-DD',
                    useCurrent: false,
                    showTodayButton: true,
                    showClear: true,
                    toolbarPlacement: 'bottom',
                    icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down",
                        previous: "fa fa-chevron-left",
                        next: "fa fa-chevron-right",
                        today: "fa fa-clock",
                        clear: "fa fa-trash"
                    }
                });

                // fonction de creation d'un note
                $('#create-form').on('submit', function (event) {
                    event.preventDefault();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var url = '{{ route("utilisateur.users.store") }}';

                    $.ajax({
                        url: url,
                        type: "post",
                        data: $('#create-form').serialize()
                    }).done(function (response) {
                        // closing create modal dialogue
                        $('#create-users').modal('hide');

                        Toast15.fire({
                            icon: response.action_result,
                            title: response.message
                        });

                        reloadDatas();

                    }).fail(function (jqXHR, ajaxOptions, thrownError) {

                        var errorText = "";
                        $.each(jqXHR.responseJSON.errors, function (key, item) {
                            errorText = errorText + " <br>" + item;
                        });
                        ezBSAlert({
                            messageText: "No response from server on create Error : <br>" + errorText,
                            alertType: "danger"
                        }).done(function (callback) {
                            if (callback) {
                                // closing create modal dialogue
                                $('#create-users').modal('hide');
                            }
                        });
                    });
                });

            }).fail(function (jqXHR, ajaxOptions, thrownError) {

                var errorText = "";
                $.each(jqXHR.responseJSON.errors, function (key, item) {
                    errorText = errorText + " <br>" + item;
                });
                ezBSAlert({
                    messageText: "No response from server on create Error : <br>" + errorText,
                    alertType: "danger"
                }).done(function (callback) {
                    if (callback) {
                        // closing create modal dialogue
                        $('#create-users').modal('hide');
                    }
                });
            });
        }

        function lunchEditModal(id) {
            var id = id;
            var url = "{{ route('utilisateur.users.edit', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: "get",
                datatype: "html"
            }).done(function (user) {
                // append liste of users to the table notes-table
                $("#edit-parent").empty().html(user);

                // showing create modal dialogue
                $("#edit-users").modal('show');

                //Initialize Select2 Elements
                $('.select2').select2({
                    dropdownParent: $('#edit-users')
                });
                $("#date_naissance").datetimepicker({
                    locale: 'fr',
                    format: 'YYYY-MM-DD',
                    useCurrent: false,
                    showTodayButton: true,
                    showClear: true,
                    toolbarPlacement: 'bottom',
                    icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down",
                        previous: "fa fa-chevron-left",
                        next: "fa fa-chevron-right",
                        today: "fa fa-clock",
                        clear: "fa fa-trash"
                    }
                });

                // fonction de modification d'un note
                $('#edit-form').on('submit', function (event) {
                    event.preventDefault();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var id = $('#edit-id_user').val();
                    var url = '{{ route("utilisateur.users.update", ":id") }}';
                    url = url.replace(':id', id);

                    $.ajax({
                        url: url,
                        type: "patch",
                        data: $('#edit-form').serialize()
                    }).done(function (response) {
                        // closing edit modal dialogue
                        $('#edit-users').modal('hide');

                        Toast15.fire({
                            icon: response.action_result,
                            title: response.message
                        });

                        reloadDatas();

                    }).fail(function (jqXHR, ajaxOptions, thrownError) {

                        var errorText = "";
                        $.each(jqXHR.responseJSON.errors, function (key, item) {
                            errorText = errorText + " <br>" + item;
                        });
                        ezBSAlert({
                            messageText: "No response from server on update Error : <br>" + errorText,
                            alertType: "danger"
                        }).done(function (callback) {
                            if (callback) {
                                // closing edit modal dialogue
                                $('#edit-users').modal('hide');
                            }
                        });
                    });
                });

            }).fail(function (jqXHR, ajaxOptions, thrownError) {

                var errorText = "";
                $.each(jqXHR.responseJSON.errors, function (key, item) {
                    errorText = errorText + " <br>" + item;
                });
                ezBSAlert({
                    messageText: "No response from server on update Error : <br>" + errorText,
                    alertType: "danger"
                }).done(function (callback) {
                    if (callback) {
                        // closing edit modal dialogue
                        $('#edit-users').modal('hide');
                    }
                });
            });
        }


        // fonction de suppression

        function lunchDeletionModal(id, name) {

            var id = id;
            var name = name;

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger me-2'
                },
                buttonsStyling: false,
            });

            swalWithBootstrapButtons.fire({
                title: 'Suppression d\'un user',
                text: "Etes-vous sûr de vouloir effectuer la suppression du rolr : " + name + " ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'me-2',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Non, conserver!',
                reverseButtons: false
            }).then((result) => {
                if (result.value) {

                    var url = '{{ route("utilisateur.users.delete", ":id") }}';
                    url = url.replace(':id', id);

                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'JSON',
                        data: {
                            'id': id,
                            '_token': '{{ csrf_token() }}',
                        },
                        success: function (response) {
                            Toast15.fire({
                                icon: response.action_result,
                                title: response.message
                            });

                            reloadDatas();
                        },
                        error: function (xhr) {
                            console.log(xhr.responseText);
                        }
                    });

                }
            })
        }

        function lunchShowModal(id) {
            var id = id;
            var url = "{{ route('utilisateur.users.show', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: "get",
                datatype: "html"
            }).done(function (user) {
                // append liste of users to the table users-table
                $("#show-parent").empty().html(user);

                // showing create modal dialogue
                $("#show-users").modal('show');

            }).fail(function (jqXHR, ajaxOptions, thrownError) {

                var errorText = "";
                $.each(jqXHR.responseJSON.errors, function (key, item) {
                    errorText = errorText + " <br>" + item;
                });
                var prom = ezBSAlert({
                    messageText: "No response from server on show : <br>" + errorText,
                    alertType: "danger"
                }).done(function (callback) {
                    if (callback) {
                        // closing create modal dialogue
                        $('#show-users').modal('hide');
                    }
                });
            });
        }

        function reloadDatas() {
            var url = "{{ route('utilisateur.users.load') }}";
            $.ajax({
                url: url,
                type: "get",
                datatype: "html"
            }).done(function (users) {
                // append liste of users to the table users-table
                $("#users-table").empty().html(users);

                // Datatable parameters
                var t = $('#users-table').DataTable({
                    "oLanguage": {
                        "sUrl": "{{ url('datatables_french.json') }}"
                    },
                    'destroy': true,
                    'paging': true,
                    'lengthChange': true,
                    'searching': true,
                    'ordering': true,
                    'info': true,
                    'autoWidth': false,
                    'pageLength': 10,
                    'order': [
                        [1, "asc"]
                    ],
                    'columnDefs': [{
                        'targets': [0, 2],
                        'searchable': false,
                        'orderable': false
                    }]
                });

                t.on('order.dt search.dt', function () {
                    t.column(0, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function (cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }).draw();

            }).fail(function (jqXHR, ajaxOptions, thrownError) {

                var errorText = "";
                $.each(jqXHR.responseJSON.errors, function (key, item) {
                    errorText = errorText + " <br>" + item;
                });
                var prom = ezBSAlert({
                    messageText: "No response from server on load Error : <br>" + errorText,
                    alertType: "danger"
                });
            });
        }
    </script>
@endsection

