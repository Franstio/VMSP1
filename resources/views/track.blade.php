@extends('layouts.main')
@section('container')

<main id="main" class="main">
<section class="section dashboard">    

      <!-- Left side columns -->
      <div class="col-lg-11">
          <div class="row">

            <!-- Card -->
            <div class="col-md-3 mt-3">
              <div class="card info-card checkin-card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="card-icon d-flex align-items-center justify-content-center">
                    <i class="bi bi-building"></i>
                    </div>
                    <div class="ps-3">
                      Building 1
                      <br>47 Visitors
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Card -->

              <!-- Card -->
            <div class="col-md-3 mt-3">
              <div class="card info-card monthly-card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="card-icon d-flex align-items-center justify-content-center">
                    <i class="bi bi-building"></i>
                    </div>
                    <div class="ps-3">
                    Building 2
                      <br>32 Visitors
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Card -->

          <!-- Card -->
          <div class="col-md-3 mt-3">
              <div class="card info-card last-month-card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="card-icon d-flex align-items-center justify-content-center">
                    <i class="bi bi-building"></i>
                    </div>
                    <div class="ps-3">
                    Building 3.1
                      <br>32 Visitors
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Card -->

          
            <!-- Card -->
            <div class="col-md-3 mt-3">
              <div class="card info-card track-card">
                <div class="card-body">

                  <div class="d-flex align-items-center">
                    <div class="card-icon d-flex align-items-center justify-content-center">
                    <i class="bi bi-building"></i>
                    </div>
                    <div class="ps-3">
                    Building 3.2
                      <br>32 Visitors
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Card -->
          </div>
        </div><!-- End Left side columns -->
        <div class="row">
      <div class="col-md-8">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
          <H1>ON PROGRESS</H1>
          <img src="/img/track.png">
          </div>
        </div>
      </div>
    </div>
   
      
     
            
</section> 
</main>     
@endsection