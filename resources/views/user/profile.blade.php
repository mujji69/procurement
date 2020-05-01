
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto pr-5">
      <li class="nav-item">
        <a class="nav-link @if(Request::is('profile')) active @endif" href="{{url('profile')}}">Personal Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link @if(Request::is('uploads')) active @endif" href="{{url('uploads')}}">My Uploads</a>
      </li>
      <li class="nav-item">
        <a class="nav-link @if(Request::is('complete')) active @endif" href="{{url('complete')}}">Tasks Completed</a>
      </li>
      <li class="nav-item">
        <a class="nav-link @if(Request::is('progress')) active @endif" href="{{url('progress')}}">Tasks in progress </a>
      </li>
      <li class="nav-item">
        <a class="nav-link @if(Request::is('award')) active @endif" href="{{url('award')}}">All Awards</a>
      </li>
    </ul>
  </div>
</nav>
