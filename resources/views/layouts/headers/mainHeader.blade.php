
<header class="header">
	<div class="container-fluid">
        <span class="header-logo"><img class="header-logo-img" src="{{ url('/image/common/logo.png') }}" /></span>
        <ul class="nav navbar-nav dropdown">
             @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/institute-register') }}">Register</a></li>
             @else
                <li class="dropdown-toggle">
                    <span class="dropdown-toggle" type="button" data-toggle="dropdown"> {{ Auth::user()->first_name }}
                      <span class="caret"></span>
                    </span>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                        </form>
                      </li>
                    </ul>
                </li>
             @endif
        </ul>        
    </div>
</header>