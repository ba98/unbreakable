@extends('layouts.admin')
@section('content')

    @php
        use App\User;
        use App\Post;

        $membersNum = User::where('role','=','Member')->count();
        $coachesNum = User::where('role','=','Coach')->count();
        $discussionsNum = Post::where('type','=','Discussion')->count();
        $momentsNum = Post::where('type','!=','Discussion')->count();
    @endphp

    <div class="main-content" style="padding-top: 0px !important;">

        <div class="row m-t-25">
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c1">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-account-o"></i>
                            </div>
                            <div class="text">
                            <h2>{{$membersNum}}</h2>
                                <span>Members</span>
                            </div>
                        </div><br>
                        {{-- <div class="overview-chart">
                            <canvas id="widgetChart1"></canvas>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c2">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                            <div class="text">
                            <h2>{{$coachesNum}}</h2>
                                <span>Coaches</span>
                            </div>
                        </div><br>
                        {{-- <div class="overview-chart">
                            <canvas id="widgetChart2"></canvas>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c3">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-calendar-note"></i>
                            </div>
                            <div class="text">
                            <h2>{{$momentsNum}}</h2>
                                <span>Moments</span>
                            </div>
                        </div><br>
                        {{-- <div class="overview-chart">
                            <canvas id="widgetChart3"></canvas>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c4">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-money"></i>
                            </div>
                            <div class="text">
                            <h2>{{$discussionsNum}}</h2>
                                <span>Discussions</span>
                            </div>
                        </div><br>
                        {{-- <div class="overview-chart">
                            <canvas id="widgetChart4"></canvas>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- --}}
        <div class="row">
            <div class="col-lg-12">
                <h2 class="title-1 m-b-25">Earnings By Items</h2>
                <div class="table-responsive table--no-card m-b-40">
                    <table class="table table-borderless table-striped table-earning">
                        <thead>
                            <tr>
                                <th>date</th>
                                <th>order ID</th>
                                <th>name</th>
                                <th class="text-right">price</th>
                                <th class="text-right">quantity</th>
                                <th class="text-right">total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2018-09-29 05:57</td>
                                <td>100398</td>
                                <td>iPhone X 64Gb Grey</td>
                                <td class="text-right">$999.00</td>
                                <td class="text-right">1</td>
                                <td class="text-right">$999.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h2 class="title-1 m-b-25">Top countries</h2>
                <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                    <div class="au-card-inner">
                        <div class="table-responsive">
                            <table class="table table-top-countries">
                                <tbody>
                                    <tr>
                                        <td>United States</td>
                                        <td class="text-right">$119,366.96</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">

                    <div class="au-card-title" style="background-image:url('../storage/images/{{auth()->user()->image}}');">
                        <div class="bg-overlay bg-overlay--blue"></div>
                        <h3>
                            <i class="zmdi zmdi-account-calendar"></i>26 April, 2018
                        </h3>
                        <button class="au-btn-plus">
                            <i class="zmdi zmdi-plus"></i>
                        </button>
                    </div>
                    <div class="au-task js-list-load">
                        <div class="au-task__title">
                            <p>Tasks for John Doe</p>
                        </div>
                        <div class="au-task-list js-scrollbar3">
                            <div class="au-task__item au-task__item--danger">
                                <div class="au-task__item-inner">
                                    <h5 class="task">
                                        <a href="">Meeting about plan for Admin Template 2018</a>
                                    </h5>
                                    <span class="time">10:00 AM</span>
                                </div>
                            </div>
                            <div class="au-task__item au-task__item--warning">
                                <div class="au-task__item-inner">
                                    <h5 class="task">
                                        <a href="">Create new task for Dashboard</a>
                                    </h5>
                                    <span class="time">11:00 AM</span>
                                </div>
                            </div>
                            <div class="au-task__item au-task__item--primary">
                                <div class="au-task__item-inner">
                                    <h5 class="task">
                                        <a href="">Meeting about plan for Admin Template 2018</a>
                                    </h5>
                                    <span class="time">02:00 PM</span>
                                </div>
                            </div>
                            <div class="au-task__item au-task__item--success">
                                <div class="au-task__item-inner">
                                    <h5 class="task">
                                        <a href="">Create new task for Dashboard</a>
                                    </h5>
                                    <span class="time">03:30 PM</span>
                                </div>
                            </div>
                            <div class="au-task__item au-task__item--danger js-load-item">
                                <div class="au-task__item-inner">
                                    <h5 class="task">
                                        <a href="">Meeting about plan for Admin Template 2018</a>
                                    </h5>
                                    <span class="time">10:00 AM</span>
                                </div>
                            </div>
                            <div class="au-task__item au-task__item--warning js-load-item">
                                <div class="au-task__item-inner">
                                    <h5 class="task">
                                        <a href="">Create new task for Dashboard</a>
                                    </h5>
                                    <span class="time">11:00 AM</span>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="au-task__footer">
                            <button class="au-btn au-btn-load js-load-btn">load more</button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
    </div>
    </div>
@endsection
