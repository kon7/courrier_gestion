@extends('AppTemplate.app')

@section('title','Client')

@section('module','Utilisateur')

@section('page','Gestion des clients')

@section('content')
    <br>
    <br>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h3 class="mb-3 mb-md-0">Liste des clients enregistrés</h3>
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
                        @include('ModuleClient.client.table')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('ModuleClient.client.create')
    @include('ModuleClient.client.edit')
    @include('ModuleClient.client.show')

@endsection


@section('scripts')
    <script>

        $(function () {
            // Datatable parameters
            var t = $('#clients-table').DataTable({
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
            var url = "{{ route('client.clients.create') }}";
            $.ajax({
                url: url,
                type: "get",
                datatype: "html"
            }).done(function (create) {
                // append liste of clients to the element
                $("#create-parent").empty().html(create);

                // showing create modal dialogue
                $("#create-clients").modal('show');

                //Initialize Select2 Elements
                $('.select2').select2({
                    dropdownParent: $('#create-clients')
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
                $("#date_debut").datetimepicker({
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
                $("#date_fin").datetimepicker({
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

                    var url = '{{ route("client.clients.store") }}';

                    $.ajax({
                        url: url,
                        type: "post",
                        data: $('#create-form').serialize()
                    }).done(function (response) {
                        // closing create modal dialogue
                        $('#create-clients').modal('hide');

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
                                $('#create-clients').modal('hide');
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
                        $('#create-clients').modal('hide');
                    }
                });
            });
        }

        function lunchEditModal(id) {
            var id = id;
            var url = "{{ route('client.clients.edit', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: "get",
                datatype: "html"
            }).done(function (client) {
                // append liste of clients to the table notes-table
                $("#edit-parent").empty().html(client);

                // showing create modal dialogue
                $("#edit-clients").modal('show');

                //Initialize Select2 Elements
                $('.select2').select2({
                    dropdownParent: $('#edit-clients')
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
                $("#date_fin").datetimepicker({
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
                $("#date_debut").datetimepicker({
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

                    var id = $('#edit-id_client').val();
                    var url = '{{ route("client.clients.update", ":id") }}';
                    url = url.replace(':id', id);

                    $.ajax({
                        url: url,
                        type: "patch",
                        data: $('#edit-form').serialize()
                    }).done(function (response) {
                        // closing edit modal dialogue
                        $('#edit-clients').modal('hide');

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
                                $('#edit-clients').modal('hide');
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
                        $('#edit-clients').modal('hide');
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
                title: 'Suppression d\'un client',
                text: "Etes-vous sûr de vouloir effectuer la suppression du client : " + name + " ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'me-2',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Non, conserver!',
                reverseButtons: false
            }).then((result) => {
                if (result.value) {

                    var url = '{{ route("client.clients.delete", ":id") }}';
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
            var url = "{{ route('client.clients.show', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: "get",
                datatype: "html"
            }).done(function (client) {
                // append liste of clients to the table clients-table
                $("#show-parent").empty().html(client);

                // showing create modal dialogue
                $("#show-clients").modal('show');

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
                        $('#show-clients').modal('hide');
                    }
                });
            });
        }

        function reloadDatas() {
            var url = "{{ route('client.clients.load') }}";
            $.ajax({
                url: url,
                type: "get",
                datatype: "html"
            }).done(function (clients) {
                // append liste of clients to the table clients-table
                $("#clients-table").empty().html(clients);

                // Datatable parameters
                var t = $('#clients-table').DataTable({
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

