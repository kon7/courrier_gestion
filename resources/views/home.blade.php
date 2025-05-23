@extends('AppTemplate.app')
@section('style')
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('css/maps/leaflet.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/maps/MarkerCluster.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/maps/MarkerCluster.Default.css') }}">--}}
    <style>
        .title {
            text-align: center;
            line-height: 400px;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-size: 84px;
            margin: auto;
            position: relative;
        }

        .graphe {
            margin: 5px;
        }

        .card-custom {
    background: linear-gradient(135deg, #6e8efb, #a777e3);
    color: white;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s, box-shadow 0.2s;
  }

  .card-custom:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
  }

  .icon-custom {
    font-size: 2em;
    opacity: 0.8;
  }

  .counter-display {
    font-size: 2.5em;
    font-weight: bold;
    animation: fadeIn 1s ease-in-out;
  }

  @keyframes fadeIn {
    0% { opacity: 0; transform: translateY(10px); }
    100% { opacity: 1; transform: translateY(0); }
  }

   /* Card modernisée */
   .card-modern {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
        padding: 20px;
    }

    /* Titres et labels */
    .label-custom {
        font-weight: 700;
        color: #333;
        margin-bottom: 5px;
    }

    .card-title {
        font-weight: 700;
        color: #555;
        font-size: 1.5em;
    }

    /* Inputs */
    .input-custom {
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 10px;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .input-custom:focus {
        border-color: #6e8efb;
        box-shadow: 0 0 8px rgba(110, 142, 251, 0.2);
    }

    /* Bouton stylisé */
    .btn-custom {
        border-radius: 8px;
        background-color: #6e8efb;
        border: none;
        padding: 10px 15px;
        font-weight: 600;
        transition: background-color 0.3s, transform 0.1s;
    }

    .btn-custom:hover {
        background-color: #5b76e8;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Container des graphiques */
    .chart-container {
        background: #fff;
        border-radius: 10px;
        padding: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }
    </style>
@endsection



@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Bienvenue sur le Dashboard</h4>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
              <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
              <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
            </div>
            <!-- <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
              <i class="btn-icon-prepend" data-feather="printer"></i>
              Imprimer
            </button>
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
              <i class="btn-icon-prepend" data-feather="download-cloud"></i>
              Telecharger
            </button> -->
          </div>
        </div>

            <div class="row">
            <div class="col-12 stretch-card">
                <div class="row flex-grow-1">
                
                <!-- Carte Nombre Clients -->
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card card-custom">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                        <h6 class="card-title mb-0">Nombre Clients</h6>
                        <i class="fas fa-users icon-custom"></i>
                        </div>
                        <div class="mt-3">
                        <div id="clientCounter" class="counter-display"></div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Carte Nombre Documents -->
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card card-custom">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                        <h6 class="card-title mb-0">Nombre Documents</h6>
                        <i class="fas fa-file-alt icon-custom"></i>
                        </div>
                        <div class="mt-3">
                        <div id="documentCounter" class="counter-display"></div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Carte Nombre Courriers -->
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card card-custom">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                        <h6 class="card-title mb-0">Nombre Courriers</h6>
                        <i class="fas fa-envelope icon-custom"></i>
                        </div>
                        <div class="mt-3">
                        <div id="courrierCounter" class="counter-display"></div>
                        </div>
                    </div>
                    </div>
                </div>
                
                </div>
            </div>
            </div>

            <div class="card card-modern">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mb-4">
            <h4 class="card-title">Période de Statistiques</h4>
        </div>

        <div class="row">
            <!-- Date de début -->
            <div class="form-group col-md-6 col-sm-6 col-lg-3 col-12">
                <div class="mb-3">
                    {!! Form::label('date_note', 'Début de la période ', [
                        'for' => 'create-nom',
                        'class' => 'form-label form-label-sm label-custom'
                    ]) !!}
                    {!! Form::text('date_debut_vis', null, [
                        'class' => 'form-control form-control-sm input-custom',
                        'id' => 'date_debut_vis',
                        'required',
                        'autocomplete' => 'off'
                    ]) !!}
                </div>
            </div>

            <!-- Date de fin -->
            <div class="form-group col-md-6 col-sm-6 col-lg-3 col-12">
                <div class="mb-3">
                    {!! Form::label('date_fin_vis', 'Fin de la période ', [
                        'for' => 'create-nom',
                        'class' => 'form-label form-label-sm label-custom'
                    ]) !!}
                    {!! Form::text('date_fin_vis', null, [
                        'class' => 'form-control form-control-sm input-custom',
                        'id' => 'date_fin_vis',
                        'required',
                        'autocomplete' => 'off'
                    ]) !!}
                </div>
            </div>

            <!-- Bouton Charger les statistiques -->
            <div class="form-group col-md-6 col-sm-6 col-lg-6 col-12 d-flex align-items-end">
                <div class="mb-3 w-100">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-custom" onclick="buildGraph()">
                            <i class="fa fa-search"></i> Charger les statistiques
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graphiques -->
        <div class="row mt-4">
            <div class="col-12 mb-4">
                <div class="chart-container">
                    <div id="dashboard_domaine" style="height: 300px;"></div>
                </div>
            </div>
            <div class="col-12">
                <div class="chart-container">
                    <div id="dashboard_domaineline" style="height: 300px;"></div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/highcharts/highcharts.min.js')}}"></script>
    <script src="{{ asset('js/highcharts.js')}}"></script>
    <script src="{{ asset('js/highcharts/exporting.min.js')}}"></script>
    <script src="{{ asset('js/highcharts/export-data.js')}}"></script>
    <script src="{{ asset('js/highcharts/highcharts-nodata.js')}}"></script>

    <script src="{{ asset('js/exporting.js') }}"></script>
    <script src="{{ asset('js/offline-exporting.js') }}"></script>

    <script>

        (function () {

            $('#date_debut_vis').datetimepicker({
                locale: 'fr',
                format: 'YYYY-MM-DD',
                useCurrent: false/*,
                defaultDate: new Date(Date.now() - 30 * 24 * 60 * 60 * 1000)*/
            });

            $('#date_fin_vis').datetimepicker({
                locale: 'fr',
                format: 'YYYY-MM-DD',
                useCurrent: true/*,
                defaultDate: new Date()*/
            });

            buildGraph();

        })(jQuery);

        /*const nav = Highcharts.win.navigator,
            isMSBrowser = /Edge\/|Trident\/|MSIE /.test(nav.userAgent),
            isOldEdgeBrowser = /Edge\/\d+/.test(nav.userAgent),
            containerEl = document.getElementById('container'),
            parentEl = containerEl.parentNode;

        function addText(text) {
            const heading = document.createElement('h2');
            heading.innerHTML = text;
            parentEl.appendChild(heading);
        }*/

        function fallbackHandler(options) {
            if (
                options.type !== 'image/svg+xml' && isOldEdgeBrowser ||
                options.type === 'application/pdf' && isMSBrowser
            ) {
                addText(options.type + ' fell back on purpose');
            } else {
                throw 'Should not have to fall back for this combination. ' +
                options.type;
            }
        }

        // Export TO PNG
        $('#button1').click(function () {
            var chart = $('#container').highcharts();
            chart.exportChartLocal({
                type: 'image/png'
            });
        });

        // Export TO CSV
        $('#button2').click(function () {
            var chart = $('#container').highcharts();
            chart.downloadCSV();
        });

        // Export TO XLS
        $('#button3').click(function () {
            var chart = $('#container').highcharts();
            chart.downloadXLS();
        });

        
        var mychartDomain = Highcharts.chart('dashboard_domaine', {
            chart: {
                type: 'column'
            },
            loading: {
                hideDuration: 1000,
                showDuration: 5000
            },
            lang: {
                decimalPoint: ",",
                viewFullscreen: "Afficher en plein ecran",
                downloadPNG: "Télécharger en image PNG",
                downloadJPEG: "Télécharger en image JPEG",
                downloadPDF: "Télécharger en document PDF",
                loading: "Chargement en cours...",
                thousandsSep: " ",
                printChart: "Imprimer le graphique",
                downloadCSV: "Exporter les données au format CSV",
                downloadXLS: "Exporter les données au format Excel",
                noData: "Données indisponibles"
            },
            title: {
                text: 'Nombre de de client selon le domaine'
            },
            credits: {
                text: 'Burkina Faso',
                href: '#',
                target: '_blank'
            },
            legend: {
                enabled: true
            },
            xAxis: {
                categories: null,
                title: {
                    text: '',
                },
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nombre',
                },
                allowDecimals: false,
                min: 0
            },
            tooltip: {
                headerFormat: '<b>{point.key}</b><br>',
                pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y}<br>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                },
                series: {
                    dataLabels: {
                        enabled: false,
                        format: '<b>{point.name}</b>' +
                            '<br>{point.y} clients' +
                            '<br>{point.percentage:.1f} % des clients'
                    }
                }
            },
            noData: {
                style: {
                    fontWeight: 'bold',
                    fontSize: '25px',
                    color: '#303030'
                }
            },
            exporting: {
                buttons: {
                    contextButton: {
                        menuItems: ['viewFullscreen', 'downloadPNG', 'downloadJPEG', /*'downloadPDF',*/ 'downloadXLS']
                    }
                }
            }
        });
        var mychartDomainline = Highcharts.chart('dashboard_domaineline', {
            chart: {
                type: 'pie'
            },
            loading: {
                hideDuration: 1000,
                showDuration: 5000
            },
            lang: {
                decimalPoint: ",",
                viewFullscreen: "Afficher en plein ecran",
                downloadPNG: "Télécharger en image PNG",
                downloadJPEG: "Télécharger en image JPEG",
                downloadPDF: "Télécharger en document PDF",
                loading: "Chargement en cours...",
                thousandsSep: " ",
                printChart: "Imprimer le graphique",
                downloadCSV: "Exporter les données au format CSV",
                downloadXLS: "Exporter les données au format Excel",
                noData: "Données indisponibles"
            },
            title: {
                text: 'Nombre de de client selon le domaine'
            },
            credits: {
                text: 'Burkina Faso',
                href: '#',
                target: '_blank'
            },
            legend: {
                enabled: true
            },
            xAxis: {
                categories: null,
                title: {
                    text: '',
                },
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nombre',
                },
                allowDecimals: false,
                min: 0
            },
            tooltip: {
                headerFormat: '<b>{point.key}</b><br>',
                pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y}<br>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                },
                series: {
                    dataLabels: {
                        enabled: false,
                        format: '<b>{point.name}</b>' +
                            '<br>{point.y} clients' +
                            '<br>{point.percentage:.1f} % des clients'
                    }
                }
            },
            noData: {
                style: {
                    fontWeight: 'bold',
                    fontSize: '25px',
                    color: '#303030'
                }
            },
            exporting: {
                buttons: {
                    contextButton: {
                        menuItems: ['viewFullscreen', 'downloadPNG', 'downloadJPEG', /*'downloadPDF',*/ 'downloadXLS']
                    }
                }
            }
        });

        

        function buildGraph() {

          
            var deb_vis = $("#date_debut_vis").val();
            var fin_vis = $("#date_fin_vis").val();

            if (deb_vis == '' || deb_vis == ' ' || deb_vis == undefined) {
                deb_vis = 'empty';
            }
            if (fin_vis == '' || fin_vis == ' ' || fin_vis == undefined) {
                fin_vis = 'empty';
            }

            var url = "{{ route('homes.statistiques.get_stats', [':jj_d',':jj_f']) }}";
            url = url.replace(':jj_d', deb_vis);
            url = url.replace(':jj_f', fin_vis);

            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'json',
                global: false,
                success: function (data) {
                    var tabDomaine = [];
                    // var tabclient = [];
                    var xAxisEventDom = [];
                    // var xAxisclient = [];

                    tabDomaine = data.domaine;
                    // tabclient = data.clients;
                    var client = data.client;
                    var docnbr = data.docnbr;
                    var courrier = data.courrier;


           function animateCounter(target, start = 0, end, duration = 2000) {
          const counterElement = document.getElementById(target);
          const range = end - start;
          let startTime = null;

          const step = (timestamp) => {
              if (!startTime) startTime = timestamp;
              const progress = Math.min((timestamp - startTime) / duration, 1);
              counterElement.textContent = Math.floor(progress * range + start);
              if (progress < 1) {
                  window.requestAnimationFrame(step);
              }
          };

          window.requestAnimationFrame(step);
      }

      // Lancer l'animation
      animateCounter("clientCounter", 0, client, 2000);
      animateCounter("documentCounter", 0, docnbr, 2000);
      animateCounter("courrierCounter", 0, courrier, 2000);



                   

                  
                    while ($('#dashboard_domaine').highcharts().series.length) {
                        $('#dashboard_domaine').highcharts().series[0].remove();
                    }
                    while ($('#dashboard_domaineline').highcharts().series.length) {
                        $('#dashboard_domaineline').highcharts().series[0].remove();
                    }
                 
                    

                    $.each(tabDomaine, function (index, donnees) {
                        xAxisEventDom.push(donnees.name);
                    });
            
                    
                    // $('#dashboard_client').highcharts().addSeries({
                    //     id: 'Serietabclient',
                    //     data: tabDomaine.reverse(),
                    //     name: 'Nombre de clients',
                    //     type: "line",
                    //     color: "#0aec45"
                    // });
                    // mychartclient.xAxis[0].setCategories(xAxisclient.reverse());
                    
                    $('#dashboard_domaine').highcharts().addSeries({
                        id: 'SerietabDom',
                        data: tabDomaine.reverse(),
                        name: 'Nombre de clients',
                        type: "column",
                        color: "#0aec45"
                    });
                    mychartDomain.xAxis[0].setCategories(xAxisEventDom.reverse());
                    $('#dashboard_domaineline').highcharts().addSeries({
                        id: 'SerietabDom',
                        data: tabDomaine.reverse(),
                        name: 'Nombre de clients',
                        type: "pie",
                        color: "#0aec45"
                    });
                    // mychartDomainline.xAxis[0].setCategories(xAxisEventDom.reverse());

                   
                }
            });
        }

    </script>
@endsection
