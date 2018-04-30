<div class="col-md-2 sidebar">
<nav>    
    <div class="menu-item">
      <h4><a href="#">Institution</a></h4>
      <ul>
        <li><a href="{{ url('/admin/institute/course-group') }}">Course Group</a></li>
        <li><a href="{{ url('/admin/institute/course-level') }}">Course Level</a></li>
        <li><a href="{{ url('/admin/institute/course-type') }}">Course Type</a></li>
      </ul>
    </div>  

    <div class="menu-item">
      <h4><a href="#">Location</a></h4>
      <ul>
        <li><a href="{{ url('/admin/location/state') }}">State</a></li>
        <li><a href="{{ url('/admin/location/city') }}">City</a></li>
        <li><a href="{{ url('/admin/location/area') }}">Area</a></li>
      </ul>
    </div>
      
    <div class="menu-item">
      <h4><a href="#">Teacher</a></h4>
      <ul>
        <li><a href="{{ url('/admin/teacher/college') }}">College</a></li>
        <li><a href="{{ url('/admin/teacher/college-type') }}">College Type</a></li>
        <li><a href="{{ url('/admin/teacher/education-degree') }}">Education Degree</a></li>
      </ul>
    </div>
    
</nav>
</div>