<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap,admin, dashboard, template, responsive">

    <title>@yield('title','SGC') | SGC</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;400i;700&display=fallback" rel="stylesheet">

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/materialdesignicons.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- End layout styles -->

    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">


    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('css/intlTelInput.css') }}">

    <link rel="stylesheet" href="{{ asset('images/favicon.png') }}">

    <style>
        td {
            vertical-align: middle !important;
        }

        .box-header {
            vertical-align: middle !important;
        }

        .modal-body {
            max-height: 70vh;
            overflow: auto;
        }

        .modal-xxl {
            width: 90vw !important;
            height: 80vh;
            max-width: none;
        }

        .pdfobject-container {
            height: 80vh;
            border: 1rem solid rgba(0, 0, 0, .1);
        }

        .has-error .select2-selection {
            border: 1px solid #ff0000;
        }

        th thead {
            padding-top: 1px;
            padding-bottom: 1px;
            height: 40px;
            background-color: #6571ff;
        }

        .dataTable tbody tr td {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        tbody tr td {
            padding-top: 1px;
            padding-bottom: 1px;
        }

        tr {
            height: 10px;
        }

        .badge-sm {
            min-width: 1.8em;
            padding: .25em !important;
            margin-left: .1em;
            margin-right: .1em;
            color: white !important;
            cursor: pointer;
        }

        .btn-sml {
            height: 4vh;
        }

        .btn-xxs {
            margin-top: 1px;
            margin-bottom: 1px;
            height: 30px;
            padding-top: 3px !important;
            padding-bottom: 3px !important;
            vertical-align: middle !important;
        }

        .page-content {
            font-size: 14px;
        }

        .swal2-popup .swal2-styled:focus {
            box-shadow: none !important;
        }
        .swal-button:focus {
            box-shadow: none;
        }


    </style>

    @yield('style')
</head>
<body>
<div class="main-wrapper">

    <!-- partial:partials/_sidebar.html -->

@include('AppTemplate.sidebar')
<!-- partial -->

    <div class="page-wrapper">

        <!-- partial:partials/_navbar.html -->
    @include('AppTemplate.navbar')
    <!-- partial -->

        <div class="page-content">

        {{-- @include('flash::message') --}}

            <!-- <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="#">@yield('module')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@yield('page')</li>
                </ol>
            </nav> -->
            <!-- <hr/> -->

            @yield('content')
        </div>

        <!-- partial:partials/_footer.html -->
    @include('AppTemplate.footer')
    <!-- partial -->

        @include('AppTemplate.show_file')

    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/intlTelInput.min.js') }}"></script>

<!-- core:js -->
<script src="{{ asset('js/core.js') }}"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="{{ asset('js/flatpickr.min.js') }}"></script>
<script src="{{ asset('js/apexcharts.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{ asset('js/feather.min.js') }}"></script>
<script src="{{ asset('js/template.js') }}"></script>
<!-- endinject -->

<script src="{{ asset('js/select2.min.js') }}"></script>

<script src="{{ asset('js/moment.min.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>


<script src="{{ asset('js/fr.js') }}"></script>
<script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Custom js for this page -->
<script src="{{ asset('js/dashboard-light.js') }}"></script>
<!-- End custom js for this page -->

<script src="{{ asset('js/pdfobject.min.js') }}"></script>

<script src="{{ asset('js/ckeditor5/build/ckeditor.js') }}"></script>
<script>


    const Toast15 = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 10000,
        timerProgressBar: true,
    });

    const Toast3 = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
    });


    // flash messages scripts
    // $('#flash-overlay-modal').modal();
    // $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    $(document).ready(function () {
        $(".alert").delay(5000).slideUp(300);
    });
    //Initialize Select2 Elements
    $('.select2').select2();

    function ezBSAlert(options) {
        var deferredObject = $.Deferred();
        var defaults = {
            type: "alert", //alert, prompt,confirm
            modalSize: 'modal-sm', //modal-sm, modal-lg
            okButtonText: 'Ok',
            cancelButtonText: 'Annuler',
            yesButtonText: 'Procéder',
            noButtonText: 'Annuler',
            headerText: 'Attention',
            messageText: 'Message',
            alertType: 'default', //default, primary, success, info, warning, danger
            inputFieldType: 'text', //could ask for number,email,etc
        }
        $.extend(defaults, options);

        var _show = function () {
            var headClass = "navbar-default";
            switch (defaults.alertType) {
                case "primary":
                    headClass = "bg-primary";
                    break;
                case "success":
                    headClass = "bg-success";
                    break;
                case "info":
                    headClass = "bg-info";
                    break;
                case "warning":
                    headClass = "bg-warning";
                    break;
                case "danger":
                    headClass = "bg-danger";
                    break;
            }

            $('BODY').append(
                '<div  id="ezAlerts" class="modal fade bd-example-modal-sm text-' + defaults.alertType + '" tabindex="1" aria-labelledby="mySmallModalLabel" aria-hidden="true">' +
                '<div class="modal-dialog modal-lg">' +
                '<div class="modal-content">' +
                '<div id="ezAlerts-header" class="modal-header modal-header-sm ' + headClass + '">' +
                '<h4 id="ezAlerts-title" class="modal-title float-left">Modal title</h4>' +
                '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button></div>' +
                '<div id="ezAlerts-body" class="modal-body"> <div id="ezAlerts-message" class="text-center"></div></div>' +
                '<div id="ezAlerts-footer" class="modal-footer modal-footer-sm"></div>' +
                '</div>' +
                '</div>' +
                '</div>'
            );

            $('#ezAlerts-title').text(defaults.headerText);
            $('#ezAlerts-message').html(defaults.messageText);

            var keyb = "false",
                backd = "static";
            var calbackParam = "";
            switch (defaults.type) {
                case 'alert':
                    keyb = "true";
                    backd = "true";
                    $('#ezAlerts-footer').html('<button class="btn btn-' + defaults.alertType + '">' + defaults.okButtonText + '</button>').on('click', ".btn", function () {
                        calbackParam = true;
                        $('#ezAlerts').modal('hide');
                    });
                    break;
                case 'confirm':
                    var btnhtml = '<center><button id="ezok-btn" class="btn btn-primary">' + defaults.yesButtonText + '</button>';
                    if (defaults.noButtonText && defaults.noButtonText.length > 0) {
                        btnhtml += '<button id="ezclose-btn" class="btn btn-default">' + defaults.noButtonText + '</button></center>';
                    }
                    $('#ezAlerts-footer').html(btnhtml).on('click', 'button', function (e) {
                        if (e.target.id === 'ezok-btn') {
                            calbackParam = true;
                            $('#ezAlerts').modal('hide');
                        } else if (e.target.id === 'ezclose-btn') {
                            calbackParam = false;
                            $('#ezAlerts').modal('hide');
                        }
                    });
                    break;
                case 'prompt':
                    $('#ezAlerts-message').html(defaults.messageText + '<br /><br /><div class="form-group"><input type="' + defaults.inputFieldType + '" class="form-control" id="prompt" /></div>');
                    $('#ezAlerts-footer').html('<button class="btn btn-primary">' + defaults.okButtonText + '</button>').on('click', ".btn", function () {
                        //calbackParam = $('#prompt').val();
                        $('#ezAlerts').modal('hide');
                    });
                    break;
            }

            $('#ezAlerts').modal({
                show: false,
                backdrop: true,
                keyboard: true
            }).on('hidden.bs.modal', function (e) {
                $('#ezAlerts').remove();
                deferredObject.resolve(calbackParam);
            }).on('shown.bs.modal', function (e) {
                if ($('#prompt').length > 0) {
                    $('#prompt').focus();
                }
            }).modal('show');
        }

        _show();
        return deferredObject.promise();
    }

    {{-- function change_pwd_modal() {
        var id = id;
        var url = "{{ route('administration.utilisateurs.change_password') }}";
        $.ajax({
            url: url,
            type: "get",
            datatype: "html"
        }).done(function (utilisateur) {
            var valide = false;
            var match = false;

            // append liste of roles to the table roles-table
            $("#change_pwd-parent").empty().html(utilisateur);

            // showing create modal dialogue
            $("#change_pwd-utilisateur").modal('show');

            //Initialize Select2 Elements
            $('.select2').select2();


            var upper_text = new RegExp('[A-Z]');
            var lower_text = new RegExp('[a-z]');
            var number_check = new RegExp('[0-9]');
            var special_char = new RegExp('[!/\'^£$%&*()}{@#~?&gt;&lt;&gt;,|=_+¬-\]');

            var str = $("#change_pwd-new_password").val();
            var conf_str = $("#change_pwd-confirm").val();

            if (str.length <= 0) {
                valide = true;
                if (conf_str == str) {
                    match = true;
                } else {
                    match = false;
                }
            }

            $("#change_pwd-new_password").bind("keyup click focus", function () {
                str = $("#change_pwd-new_password").val();
                conf_str = $("#change_pwd-confirm").val();

                if (str.length <= 0) {
                    valide = true;
                    if (conf_str == str) {
                        match = true;
                    } else {
                        match = false;
                    }
                    $('#change_pwd-minuscul').fadeOut(250);
                    $('#change_pwd-majuscul').fadeOut(250);
                    $('#change_pwd-chiffre').fadeOut(250);
                    $('#change_pwd-special').fadeOut(250);
                    $('#change_pwd-minimum').fadeOut(250);
                    $('#change_pwd-valide').fadeOut(250);
                    $('#change_pwd-default').fadeIn(250);
                    $('#change_pwd-validation').switchClass("alert-danger", "alert-warning", 250);
                    $('#change_pwd-validation').switchClass("alert-success", "alert-warning", 250);
                } else {
                    $('#change_pwd-default').fadeOut(250);
                    if (str.match(lower_text)) {
                        $('#change_pwd-minuscul').fadeOut(250);
                    } else {
                        $('#change_pwd-minuscul').fadeIn(250);
                    }
                    if (str.match(upper_text)) {
                        $('#change_pwd-majuscul').fadeOut(250);
                    } else {
                        $('#change_pwd-majuscul').fadeIn(250);
                    }
                    if (str.match(number_check)) {
                        $('#change_pwd-chiffre').fadeOut(250);
                    } else {
                        $('#change_pwd-chiffre').fadeIn(250);
                    }
                    if (str.match(special_char)) {
                        $('#change_pwd-special').fadeOut(250);
                    } else {
                        $('#change_pwd-special').fadeIn(250);
                    }
                    if (str.length >= 8) {
                        $('#change_pwd-minimum').fadeOut(250);
                    } else {
                        $('#change_pwd-minimum').fadeIn(250);
                    }
                    if (str.length >= 8 && str.match(special_char) && str.match(number_check) && str.match(upper_text) && str.match(lower_text)) {
                        valide = true;
                        $('#change_pwd-valide').html('<i class="icon fa fa-check"></i>Mot de passe valide...');
                        $('#change_pwd-valide').fadeIn(250);
                        $('#change_pwd-validation').switchClass("alert-danger", "alert-success", 250);
                        $('#change_pwd-validation').switchClass("alert-warning", "alert-success", 250);
                    } else {
                        if (str.length >= 8 && str.match(number_check) && str.match(upper_text) && str.match(lower_text)) {
                            valide = true;
                            $('#change_pwd-valide').html('<i class="icon fa fa-warning"></i>Mot de passe passable...');
                            $('#change_pwd-valide').fadeIn(250);
                            $('#change_pwd-validation').switchClass("alert-danger", "alert-warning", 250);
                            $('#change_pwd-validation').switchClass("alert-success", "alert-warning", 250);
                        } else {
                            valide = false;
                            $('#change_pwd-valide').fadeOut(250);
                            $('#change_pwd-validation').switchClass("alert-success", "alert-danger", 250);
                            $('#change_pwd-validation').switchClass("alert-warning", "alert-danger", 250);
                        }
                    }
                }
            });

            $("#change_pwd-confirm").bind("keyup click focus", function () {
                var pass_str = $("#change_pwd-new_password").val();
                var conf_str = $("#change_pwd-confirm").val();

                if (conf_str == pass_str) {
                    match = true;
                    $('#change_pwd-match').html('<i class="icon fa fa-check"></i>Confirmation valide...');
                    $('#change_pwd-confirmation').switchClass("alert-danger", "alert-success", 0);
                } else {
                    match = false;
                    $('#change_pwd-match').html('<i class="icon fa fa-close"></i>Confirmation non valide...');
                    $('#change_pwd-confirmation').switchClass("alert-success", "alert-danger", 0);
                }
                $('#change_pwd-confirmation').fadeIn(350);
            });

            $("#change_pwd-confirm").focusout(function () {
                if ($("#change_pwd-confirm").val().length <= 0) {
                    $('#change_pwd-confirmation').fadeOut(350);
                }
            });

            // fonction de modification d'un utilisateur
            $('#change_pwd-form').on('submit', function (event) {
                event.preventDefault();

                if (valide && match) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var id = $('#change_pwd-id_utilisateur').val();
                    var url = '{{ route("administration.utilisateurs.store_new_password") }}';
                    // url = url.replace(':id', id);

                    $.ajax({
                        url: url,
                        type: "post",
                        data: $('#change_pwd-form').serialize()
                    }).done(function () {
                        // closing edit modal dialogue
                        $('#change_pwd-utilisateur').modal('hide');

                        // resting form
                        $('#change_pwd-form').trigger("reset");

                        Toast15.fire({
                            icon: response.action_result,
                            title: response.message
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
                                $('#change_pwd-utilisateur').modal('hide');
                            }
                        });
                    });
                } else {
                    messageText = "";
                    if (!valide) {
                        messageText = messageText + "<p>Mot de passe non valide...</p>";
                    }
                    if (!match) {
                        messageText = messageText + "<p>Confirmation non valide...</p>";
                    }
                    ezBSAlert({
                        messageText: messageText,
                        alertType: "danger"
                    });
                }
            });

        }).fail(function (jqXHR, ajaxOptions, thrownError) {

            var errorText = "";
            $.each(jqXHR.responseJSON.errors, function (key, item) {
                errorText = errorText + " <br>" + item;
            });
            var prom = ezBSAlert({
                messageText: "No response from server on edit Error : <br>" + errorText,
                alertType: "danger"
            }).done(function (callback) {
                if (callback) {
                    // closing create modal dialogue
                    $('#change_pwd-utilisateur').modal('hide');
                }
            });
        });
    }

    function show_profil_modal() {
        var id = id;
        var url = "{{ route('administration.utilisateurs.show_profile') }}";
        $.ajax({
            url: url,
            type: "get",
            datatype: "html"
        }).done(function (utilisateur) {
            var valide = false;
            var match = false;

            // append liste of roles to the table roles-table
            $("#show_my_profile-parent").empty().html(utilisateur);

            // showing create modal dialogue
            $("#show_my_profile-utilisateur").modal('show');
            // fonction de modification d'un utilisateur

        }).fail(function (jqXHR, ajaxOptions, thrownError) {

            var errorText = "";
            $.each(jqXHR.responseJSON.errors, function (key, item) {
                errorText = errorText + " <br>" + item;
            });
            var prom = ezBSAlert({
                messageText: "No response from server on edit Error : <br>" + errorText,
                alertType: "danger"
            }).done(function (callback) {
                if (callback) {
                    // closing create modal dialogue
                    $('#show_my_profile-utilisateur').modal('hide');
                }
            });
        });
    } 
    --}}

    function display_fichier_Pdf(filename) {
        $("#show #show-file #titre").text("Visualisation du fichier")
        var options = {
            fallbackLink: "<p>This is a <a href='../" + filename + "'>fallback link</a></p>",
            height: "100%",
            page: '1',
            pdfOpenParams: {
                view: 'FitV',
                pagemode: 'thumbs',
                search: 'lorem ipsum'
            }
        };

        PDFObject.embed("/" + filename, "#show #show-file #display_section", options);
        // PDFObject.embed(filename, "#show #show-file #display_section", options);
        $("#show-file").modal('show');
    }

    function download_file(filename) {
        $("#show #show-file #titre").text("Visualisation du fichier")
        var options = {
            fallbackLink: "<p>This is a <a href='../" + filename + "'>fallback link</a></p>",
            height: "100%",
            page: '1',
            pdfOpenParams: {
                view: 'FitV',
                pagemode: 'thumbs',
                search: 'lorem ipsum'
            }
        };

        PDFObject.embed("../" + filename, "#show #show-file #display_section", options);
        $("#show-file").modal('show');
    }

</script>

@yield('scripts')

</body>
</html>
