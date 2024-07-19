 <!--start wrapper-->
  
 <nav class="navbar mt-2">
  <header id="header" class="header fixed-top d-flex align-items-center">
        <div>
          <a class="logo d-flex align-items-center">
            <img src="/images/pn.svg" alt="" width="150" height="50">
  
            <h6 id="clock"></h6></a>
        </div>   
         <ul class="d-flex align-items-center w-100">
          <li class="nav-item d-none d-lg-block ms-auto">
          <h1 class="main-title">VISITOR MANAGEMENT SYSTEM</h1>
        </li>
        
  
  <ul class="navbar-nav ms-auto">
    @auth   
     <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-person-circle" style="font-size:25px;"></i>&nbsp;&nbsp;&nbsp;{{ auth()->user()->name}}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/usersetting">Edit profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="post">
                @csrf
              <button type="submit" class="dropdown-item">Logout</button>
              </form>
            </li>
          </ul>
     </li>
    @endauth
    </ul>
    </header>           
  </div>
</nav>

    <!-- ======= Sidebar ======= -->

<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">
@if (auth()->user()->nameRole == "Superadmin" OR auth()->user()->nameRole == "Security" OR auth()->user()->nameRole == "Admin") 
<li class="nav-item">
  <a class="nav-link" href="/home">
    <!-- <i class="bi bi-grid"></i> -->
    <center>
      <img class="img-sidebar" src="img/speedometer.png" alt="">
      <span class="">Dashboard</span>
    </center>
  </a>
</li>
@endif<!-- End Dashboard Nav -->


<!-- @if (auth()->user()->nameRole == "Superadmin" OR auth()->user()->nameRole == "Security" OR auth()->user()->nameRole == "Admin") 
<li class="nav-item">
<div class="dropdown-center">
  <a class="btn-light dropdown-toggle" type="button" href="/track">
    Track Visitors
</a>
<a class="btn-light dropdown-toggle" type="button" href="/track">
    Recent Visitor
</a>
</div>
</li>
@endif -->

@if (auth()->user()->nameRole == "Superadmin" OR auth()->user()->nameRole == "Security" OR auth()->user()->nameRole == "Admin")  
<li class="nav-item">
  <a class="nav-link " href="/waiting">
    <center>
      <img class="img-sidebar" src="img/waiting-list.png" alt="">
      <span class="">Waiting&nbsp;List</span>
    </center>
  </a>
</li>
@endif

@if (auth()->user()->nameRole == "Superadmin" OR auth()->user()->nameRole == "Security" OR auth()->user()->nameRole == "Admin") 
<li class="nav-item">
  <a class="nav-link " href="/report">
    <center>
      <img class="img-sidebar" src="img/stats.png" alt=""><br>
      <span class="">Reports</span>
    </center>
  </a>
</li>
@endif

@if (auth()->user()->nameRole == "Superadmin" OR auth()->user()->nameRole == "Security" OR auth()->user()->nameRole == "Admin") 
<li class="nav-item">
  <a class="nav-link " href="/visitor">
    <center>
      <img class="img-sidebar" src="img/group.png" alt=""><br>
      <span class="">Visitors</span>
    </center>
  </a>
</li>
@endif

@if (auth()->user()->nameRole == "Superadmin" OR auth()->user()->nameRole == "Host")  
<li class="nav-item">
  <a class="nav-link" href="/approval">
    <!-- <i class="bi bi-grid"></i> -->
    <center>
      <img class="img-sidebar" src="img/speedometer.png" alt=""><br>
      <span class="">Approval</span>
    </center>
  </a>
</li>
@endif

@if (auth()->user()->nameRole == "Superadmin" OR auth()->user()->nameRole == "Host")
  <li class="nav-item">
    <div class="dropdown-center">
      <a class="btn-light dropdown-toggle" type="button" href="/permit">
        VIP Approval
      </a>
    </div>
  </li>
@endif

@if (auth()->user()->nameRole == "Superadmin" OR auth()->user()->nameRole == "Host") 
<li class="nav-item">
  <a class="nav-link " href="/history">
    <center>
      <img class="img-sidebar" src="img/stats.png" alt=""><br>
      <span class="">Approval History</span>
    </center>
  </a>
</li>
@endif
@if (auth()->user()->nameRole == "Superadmin" OR auth()->user()->nameRole == "Host") 
<li class="nav-item">
  <a class="nav-link " href="/recruitment">
    <center>
      <img class="img-sidebar" src="img/user.png" alt=""><br>
      <span class="">Recruitment</span>
    </center>
  </a>
</li>
@endif
@if (auth()->user()->nameRole == "Superadmin" OR auth()->user()->nameRole == "Admin") 
<li class="nav-item">
  <a class="nav-link " href="/staff">
    <center>
      <img class="img-sidebar" src="img/user.png" alt=""><br>
      <span class="">&nbsp;Host&nbsp;&nbsp;&nbsp;</span>
    </center>
  </a>
</li>
@endif

@if (auth()->user()->nameRole == "Superadmin" /*OR auth()->user()->nameRole == "Security"*/ OR auth()->user()->nameRole == "Admin")
<li class="nav-item ">
  <a class="nav-link" href="/VisitorApproval">
    <!-- <i class="bi bi-grid"></i> -->
    <center>
      <img class="img-sidebar" src="img/speedometer.png" alt=""><br>
      <span class="">Visitor Approval</span>
    </center>
  </a>
</li>
@endif

@if (auth()->user()->nameRole == "Security" ) 
<li class="nav-item">
<div class="dropdown-center">
  <a class="nav-link  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Data Master
  </a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="/badge">Badge</a></li>
  </ul>
</div>
</li>
@endif

@if (auth()->user()->nameRole == "Superadmin"  OR auth()->user()->nameRole == "Admin" ) 
<li class="nav-item">
<div class="dropdown-center">
  <a class="nav-link  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Data Master
  </a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="/badge">Badge</a></li>
    <li><a class="dropdown-item" href="/depart">Depart</a></li>
    <li><a class="dropdown-item" href="/location">Location</a></li>
    <li><a class="dropdown-item" href="/purpose">Purpose</a></li>
    <!-- <li><a class="dropdown-item" href="/permission">Permission</a></li> -->
    <li><a class="dropdown-item" href="/role">Role</a></li>
    <li><a class="dropdown-item" href="/type">Type</a></li>
    <li><a class="dropdown-item" href="/vendors">Vendor</a></li>
    <li><a class="dropdown-item" href="/vest">Vest</a></li>
  </ul>
</div>
</li>
@endif

<li class="nav-item">
  <a class="nav-link " href="/usersetting">
    <center>
      <img class="img-sidebar" src="img/settings.png" alt=""><br>
      <span class="">Settings</span>
    </center>
  </a>
</li>
   </ul>
</aside>
<!-- End Sidebar-->

    
   <!--end page main-->

        <!-- ======= Footer ======= -->
<footer id="footer" class="footer fixed-bottom">
  <div class="copyright">
    &copy; Copyright 2022<strong><span></span></strong>. All Rights Reserved
  </div>
  <div class="credits">
    
  </div>
</footer><!-- End Footer -->




