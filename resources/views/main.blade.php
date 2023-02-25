<!-- Vendor CSS Files -->
<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
<link href="{{ asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
<link href="{{ asset('vendor/quill/quill.snow.css')}}" rel="stylesheet">
<link href="{{ asset('vendor/quill/quill.bubble.css')}}" rel="stylesheet">
<link href="{{ asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">
<link href="{{ asset('vendor/simple-datatables/style.css')}}" rel="stylesheet">

<script src="{{ asset('vendor/jquery.min.js')}}"></script>

<script>
  let nama = [];
  let lamaLogin = [];
  let collectData = [];
</script>

@foreach ($log as $lg)

  @if(( !is_null($lg->loginDate) && !is_null($lg->logoutDate) ))

    @if( (round(((int)strval($lg->logoutDate) - (int)strval($lg->loginDate))/60000)) > 0 )
      
      {{-- {{ $lg->name }} -> {{ round(((int)strval($lg->logoutDate) - (int)strval($lg->loginDate))/60000)}}=><br> --}}
      {{-- {{ $lg->logoutDate->toDateTime()->format('Y-m-d H:i:s'); }} - 
      {{ $lg->loginDate->toDateTime()->format('Y-m-d H:i:s');  }} = 
      {{ round(((int)strval($lg->logoutDate) - (int)strval($lg->loginDate))/60000)}}<br> --}}
    
      <?php
        $date1=date_create($lg->logoutDate->toDateTime()->format('Y-m-d H:i:s'));
        $date2=date_create($lg->loginDate->toDateTime()->format('Y-m-d H:i:s'));
        $diff=date_diff($date2,$date1);
        
      ?>

      <script>
        // console.log("==={{ $lg->name }}======={{ round(((int)strval($lg->logoutDate) - (int)strval($lg->loginDate))/60000)}}==");

        if(null!=collectData['{{ $lg->name }}'])
        {
          let temp = parseInt(collectData['{{ $lg->name }}']);
          temp = temp + parseInt("{{ round(((int)strval($lg->logoutDate) - (int)strval($lg->loginDate))/60000)}}");
          collectData['{{ $lg->name }}'] = temp;
        }
        else
        {
          collectData['{{ $lg->name }}'] = "{{ round(((int)strval($lg->logoutDate) - (int)strval($lg->loginDate))/60000)}}";
        }
        // console.log("---"+collectData['{{ $lg->name }}']);
      </script>

      
      {{-- {{ $lg->logoutDate->toDateTime()->format('Y-m-d H:i:s'); }} - 
      {{ $lg->loginDate->toDateTime()->format('Y-m-d H:i:s');  }} =  --}}

      {{-- {{ round(((int)strval($lg->logoutDate) - (int)strval($lg->loginDate))/60000) ." On minutes"; }} --}}
      
      {{-- {{ $lg->logoutDate  }}-{{ strtotime($lg->logoutDate)  }}-
      {{ (int)strval($lg->logoutDate) - (int)strval($lg->loginDate); }} |
      
      {{ $lg->loginDate  }}

      
      {{ strtotime($lg->logoutDate)-strtotime($lg->loginDate) }}
      
      {{ round((strtotime($lg->logoutDate)-strtotime($lg->loginDate)) / 60)  }}
      {{ round((strtotime($lg->logoutDate)-strtotime($lg->loginDate)) / 3600)  }} --}}
    
    @endif
  @endif
@endforeach

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Grafik Lama Pengungjung dalam menit</h5>

    <!-- Bar Chart -->
    <div id="barChart"></div>

    <script>

      console.log("=123========="+JSON.stringify(collectData));
      for(var key in collectData){
        lamaLogin.push(parseInt(collectData[key]));
        nama.push(key);
      };


      document.addEventListener("DOMContentLoaded", () => {
        new ApexCharts(document.querySelector("#barChart"), {
          series: [{
            data: lamaLogin
          }],
          chart: {
            type: 'bar',
            height: 350
          },
          plotOptions: {
            bar: {
              borderRadius: 4,
              horizontal: true,
            }
          },
          dataLabels: {
            enabled: false
          },
          xaxis: {
            categories: nama,
          }
        }).render();
      });
    </script>
    <!-- End Bar Chart -->

  </div>
</div>
<!-- Vendor JS Files -->
<script src="{{ asset('vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('vendor/chart.js/chart.umd.js')}}"></script>
<script src="{{ asset('vendor/echarts/echarts.min.js')}}"></script>
<script src="{{ asset('vendor/quill/quill.min.js')}}"></script>
<script src="{{ asset('vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{ asset('vendor/tinymce/tinymce.min.js')}}"></script>
<script src="{{ asset('vendor/php-email-form/validate.js')}}"></script>


{{-- HELLO 
{{$log}} --}}
