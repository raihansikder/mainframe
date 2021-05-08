@if(user())
    <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="hidden-xs">{{user()->email}}</span> <span class="badge bg-black"> {{cached('logged-user-group-name')}}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="user-footer">
                <div class="pull-left">
                    <a href="{{route('users.edit', user()->id)}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </li>
@else
    <li>
        <a href="{{route('get.signin')}}">Sign in</a>
    </li>
@endif