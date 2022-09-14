@php
$currentdate = getCurrentDate('d');
$finish_at = ConvertSQLDate(Auth()->user()->finish_at);
$count = 0; $numday = 0;
if ($finish_at != ''){
    $numday = DateDiff ($finish_at, $currentdate, 'd');	
    if ($numday < 7){
        $count++;
    }
}

@endphp  

<ul class="nav navbar-nav">
    <!-- Notifications: style can be found in dropdown.less -->
    <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ asset('img/notifications-icon.png') }}" alt="">
            <span class="notifications-new"></span>
        </a>
        <ul class="dropdown-menu">
            @if ($numday > 0 and $numday < 7)
                <li>
                    &nbsp;&nbsp;<i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp;&nbsp;Thời hạn sử dụng: {{ $finish_at }}
                </li>
                <li>
                    &nbsp;&nbsp;<i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp;&nbsp;Thời hạn sử dụng: {{ $finish_at }}
                </li>
            @endif 
        </ul>
    </li>
</ul>