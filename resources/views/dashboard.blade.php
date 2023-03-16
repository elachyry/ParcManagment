@extends('layouts.auth')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

          <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title"> Nombre Véhicules <span>| Totale</span> </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-truck"></i>
                    </div>
                    <div class="ps-4">
                      <h6>{{$counts['countCar']}}</h6>
                       <span class="text-muted small pt-2 ps-1">Véhicule</span>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title"> Nombre Utilisateurs <span>| Totale</span> </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-4">
                      <h6>{{$counts['countEmp']}}</h6>
                       <span class="text-muted small pt-2 ps-1">Utilisateur</span>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Customers Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title"> Nombre Affectations <span>| Totale</span> </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-arrow-bar-up"></i>
                    </div>
                    <div class="ps-4">
                      <h6>{{$counts['countAffec']}}</h6>
                       <span class="text-muted small pt-2 ps-1">Affectation</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

              

                <div class="card-body">
                  <h5 class="card-title">Rapports <span>/Année</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Réparations',
                          data: [{{$cm[0]}}, {{$cm[1]}}, {{$cm[2]}}, {{$cm[3]}}, {{$cm[4]}}, {{$cm[5]}}, {{$cm[6]}},{{$cm[7]}},{{$cm[8]}},{{$cm[9]}},{{$cm[10]}},{{$cm[11]}}],
                        }, {
                          name: 'Vidanges',
                          data: [{{$cv[0]}}, {{$cv[1]}}, {{$cv[2]}}, {{$cv[3]}}, {{$cv[4]}}, {{$cv[5]}}, {{$cv[6]}},{{$cv[7]}},{{$cv[8]}},{{$cv[9]}},{{$cv[10]}},{{$cv[11]}}]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: true
                          },
                        },
                        
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.8,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'number',
                          categories: ["janv", "févr", "mars", "avr", "mai", "juin", "juill", "août", "sept", "oct", "nov", "déc"]
                        },
                        
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                           y: {
                        formatter: function(val) {
                          return val 
                        }
                      }
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->


          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
          @php
                use Carbon\Carbon;
                $currentDateTime = Carbon::now();

                @endphp
            <div class="card-body">
              <h5 class="card-title">Dates de retour du véhicules</span></h5>

              <div class="activity">
              @foreach($recent as $item)
              @php
              $date1 = Carbon::parse($item->date_retour);
              @endphp
              <div class="activity-item d-flex">


              @if($date1->gte($currentDateTime))
              <div class="activite-label"><b>{{$item->date_retour}}</b></div>
              <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
              <div class="activity-content">
                    <b>{{$item->first_name}} {{$item->last_name}} {{$item->immatriculation}}</b>
                  </div>
              @else
              <div class="activite-label"><span style="color:red;"><b>{{$item->date_retour}}</b></span></div>
              <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
              <div class="activity-content">
                    <span style="color:red;"><b>{{$item->first_name}} {{$item->last_name}} {{$item->immatriculation}}</b></span>
                  </div>

              
              @endif
                

                </div><!-- End activity item-->
              @endforeach
               

              </div>

            </div>
          </div><!-- End Recent Activity -->


          <!-- Website Traffic -->
          

        </div><!-- End Right side columns -->

      </div>
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

          <div class="col-xxl-6 col-md-6">
          <div class="card">

<div class="card-body pb-0">
  <h5 class="card-title">Etat des Véhicules</h5>

  <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      echarts.init(document.querySelector("#trafficChart")).setOption({
        tooltip: {
          trigger: 'item'
        },
        legend: {
          top: '5%',
          left: 'center'
        },
        series: [{
          name: 'Etat des Véhicules',
          type: 'pie',
          radius: ['40%', '70%'],
          avoidLabelOverlap: false,
          label: {
            show: false,
            position: 'center'
          },
          emphasis: {
            label: {
              show: true,
              fontSize: '18',
              fontWeight: 'bold'
            }
          },
          labelLine: {
            show: false
          },
          data: [{
              value: {{$status['bon']}},
              name: 'Bone Etat'
            },
            {
              value: {{$status['moyen']}},
              name: 'Moyen'
            },
            {
              value: {{$status['pane']}},
              name: 'En Pane'
            },
            {
              value: {{$status['hors']}},
              name: 'Hors Usage'
            },
            {
              value: {{$status['ref']}},
              name: 'Reformer'
            }
          ]
        }]
      });
    });
  </script>

</div>
</div><!-- End Website Traffic -->
            </div>

            <!-- Revenue Card -->
            <div class="col-xxl-6 col-md-6">
            <div class="card">

<div class="card-body pb-0">
<h5 class="card-title">État des Affectations du Missions <span></span></h5>

<div id="pieChart" style="min-height: 400px;" class="echart"></div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    echarts.init(document.querySelector("#pieChart")).setOption({
      title: {
        text: '',
        subtext: '',
        left: 'center'
      },
      tooltip: {
        trigger: 'item'
      },
      legend: {
        orient: 'vertical',
        left: 'left'
      },
      series: [{
        name: 'Affectations',
        type: 'pie',
        
        radius: '50%',
        data:[{
            value: {{$statusMess['att']}},
            name: 'En Attendant'
          },
          {
            value: {{$statusMess['active']}},
            name: 'active'
          },
          {
            value: {{$statusMess['comp']}},
            name: 'complété'
          },
          {
            value: {{$statusMess['reta']}},
            name: 'En Retard'
          }
        ],
        emphasis: {
          itemStyle: {
            shadowBlur: 10,
            shadowOffsetX: 0,
            shadowColor: 'rgba(0, 0, 0, 0.5)'
          }
        }
      }]
    });
  });
</script>

</div>
            </div>

           

            <!-- Reports -->
            <div class="col-12">
              <div class="card">



                

              </div>
            </div><!-- End Reports -->


          </div>
        </div><!-- End Left side columns -->

        

      </div>
    </section>

  </main>

@endsection