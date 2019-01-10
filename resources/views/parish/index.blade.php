@extends('parish.layout.app')
@section('title', $parish->name)
@section('parishName', $parish->name)
@section('content')
    <!-- Banner --> 
    <section class="main-banner-section">
        <div class="sa-main-banner owl-carousel">
            <div class="item section-padding">
                <div class="container">
                    <div class="intro_text white_text">
                        <h1>God Gives Us Power</h1>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some</p>
                        <a href="#" class="btn btn-lg dark-btn">Explore Events</a>
                    </div>    
                </div>
            </div>
            <div class="item section-padding">
                <div class="container">
                    <div class="intro_text white_text">
                        <h1>God Gives Us Power</h1>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some</p>
                        <a href="#" class="btn btn-lg dark-btn">Explore Events</a>
                    </div>    
                </div>
            </div>
        </div>
    </section>
    <!-- /End Banner --> 

    <!-- Next-Events-Sermons -->
    <section class="latest_event_sermons">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="box_wrap next_event">
                        <p class="subtitle">Next Event</p>
                        <h4><a href="#">{{ title_case($nextEvent->title) }}</a></h4>
                        <div class="event_info">
                            <div class="event_date">
                                <span>{{ $nextEvent->starts_at->format('d') }}</span> {{ $nextEvent->starts_at->format('M y') }}
                            </div>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> {{  $nextEvent->starts_at->diffForHumans() }}</li>
                                <li><i class="fa fa-paperclip"></i> {{ str_limit($nextEvent->description, 100) }}</li>
                            </ul>
                        </div>
                        <a href="#" class="btn">See Details <i class="fa fa-caret-right"></i> </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box_wrap next_sermons">
                        <p class="subtitle">Latest Sermon</p>
                        <h4><a href="#">{{ title_case($latestSermon->title) }}</a></h4>
                        <ul class="sermons_meta">
                            <li><i class="fa fa-user"></i> Message from <a href="#">Frederick</a></li>
                            <li><i class="fa fa-calendar-check-o"></i> {{ $latestSermon->start_publishing_at->diffForHumans() }}</li>
                        </ul>
                        <div class="sermons_inside">
                            <ul>
                                <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a href="#"><i class="fa fa-file-pdf-o"></i></a></li>
                                <li><a href="#"><i class="fa fa-share-alt"></i></a></li>
                            </ul>
                        </div>
                        <div class="audio-player">
                            <div id="play-btn">
                                <i class="fa fa-play"> </i>
                                <i class="fa fa-pause"></i>
                            </div>
                            <div class="audio-wrapper" id="player-container">
                              <audio id="player" ontimeupdate="initProgressBar()">
                                  <source src="{{ $latestSermon->media['audio'] }}" type="audio/mp3">
                              </audio>
                            </div>
                            <div class="player-controls scrubber">
                               <small class="end-time">5:44</small>
                               <span id="seekObjContainer"> <progress id="seekObj" value="0" max="1"></progress>  </span>
                               <i class="fa fa-volume-up"></i>                             
                            </div>
                            <div class="next_prev">
                                <i class="fa fa-angle-left"></i> 
                                <i class="fa fa-angle-right"></i>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Next-Events-Sermons -->

    <!-- About -->
    <section class="sa-about-us-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-8 order-lg-1 sa-about-us-bg">
                    <img src="assets/images/bg/2.png" alt="img">
                </div>
                <div class="col-lg-8 order-lg-12">
                    <div class="sa-about-us-details">
                        <h2>Welcome to {{ $parish->name }}</h2>
                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).  If you are going to use a passage of Lorem.</p>
                        <p>You need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined. chunks as necessary.</p>
                        <a class="btn btn-lg dark-btn" href="#">Read more...</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!-- /About -->
    
    
    
    <!-- Causes -->
    {{-- <section id="causes" class="section-padding gray_bg">
        <div class="container">
            <div class="owl-carousel">
                <div class="item">
                    <div class="causes_info white_text">
                        <div class="h__set">
                            <h6>Urgent CAUSES</h6>
                        </div>
                        <h2>The Five Points of Gospel Truth</h2>
                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for</p>
                        <div class="causes_chart">
                            <p>Raised: <strong>$15,000.00</strong></p>
                            <div class="chart"><img src="assets/images/chart.png" alt="image"></div>
                            <p>Goal: <strong>$25,000.00</strong></p>
                        </div>
                        <a href="#" class="btn btn-lg dark-btn">Donate Now</a>
                    </div>
                </div>
                <div class="item">
                    <div class="causes_info white_text">
                        <div class="h__set">
                            <h6>Urgent CAUSES</h6>
                        </div>
                        <h2>The Five Points of Gospel Truth</h2>
                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for</p>
                        <div class="causes_chart">
                            <p>Raised: <strong>$15,000.00</strong></p>
                            <div class="chart"><img src="assets/images/chart.png" alt="image"></div>
                            <p>Goal: <strong>$25,000.00</strong></p>
                        </div>
                        <a href="#" class="btn btn-lg dark-btn">Donate Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
     <!-- /Causes -->

    <!-- Latest-Events-Sermons -->
    <section class="section-padding latest_event_sermons m-0">
        <div class="container">
            <div class="row">
                @if($latestEvents->count())
                <div class="col-md-6 col-lg-5">
                    <div class="heading">
                        <h3>Latest Events</h3>
                        <a href="#" class="btn btn-sm pull-right">See All</a>
                    </div>
                    <div class="event_list">
                        <ul>
                            @foreach($latestEvents as $event)
                            <li>
                                <div class="event_info">
                                    <div class="event_date">
                                        <span>{{ $event->starts_at->format('d') }}</span> {{ $event->starts_at->format('M y') }}
                                    </div>
                                    <h6><a href="#">{{ title_case($event->title) }}</a></h6>
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i> {{ $event->starts_at->diffForHumans() }}</li>
                                        <li><i class="fa fa-paperclip"></i> {{ str_limit($event->description, 50) }}</li>
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                @if($latestSermons->count())
                <div class="col-md-6 col-lg-5 offset-lg-2">
                    <div class="heading">
                        <h3>Latest Sermons</h3>
                        <a href="#" class="btn btn-sm pull-right">See All</a>
                    </div>
                    <div class="panel-group" id="sermonAccordion" role="tablist" aria-multiselectable="true">
                        @foreach($latestSermons as $sermon)
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="sermonHeading{{ $sermon->id }}">
                                <h6 class="panel-title">
                                <a class="{{ ! $loop->first ? 'collapsed' : '' }}" role="button" data-toggle="collapse" data-parent="#sermonAccordion" href="#sermonCollapse{{ $sermon->id }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="sermonCollapse{{ $sermon->id }}">
                                    {{ title_case($sermon->title) }}</a>
                                </h6>
                            </div>
                            <div id="sermonCollapse{{ $sermon->id }}" class="panel-collapse collapse {{ $loop->first ? 'in show' : '' }}" role="tabpanel" aria-labelledby="sermonHeading{{ $sermon->id }}">
                                <div class="panel-body">
                                <ul class="sermons_meta">
                                    <li><i class="fa fa-user"></i> Message from <a href="#">Frederick</a></li>
                                    <li><i class="fa fa-calendar-check-o"></i> Aug 12, 2018</li>
                                </ul>
                                <div class="sermons_inside">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-music"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                        <li><a href="#"><i class="fa fa-file-pdf-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-share-alt"></i></a></li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- /Latest-Events-Sermons -->

    <!-- Projects -->
    @if($projects->count())
    <section class="section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="sa-section-title text-center">
                        <h2>Current Projects</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some</p>
                    </div>
                </div>
            </div>

            @foreach($projects as $project)
            <div class="events_wrap">
                <div class="event_img">
                    <a href="#"><img src="assets/images/projects/2.jpg" alt="image"></a>
                </div>
                <div class="event_info">
                    <h4><a href="#">{{ title_case($project->title) }}</a></h4>
                    <p>{{ $project->description }}</p>
                    <ul>
                        <li><i class="fa fa-clock-o"></i> Due Date:  {{ $project->created_at->addMonths(5)->format('M Y') }}</li>
                        <li><i class="fa fa-dollar"></i> Bugdet: {{ $project->budget }}</li>
                    </ul>
                    <a href="#" class="btn">See Details <i class="fa fa-caret-right"></i> </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif
    <!-- /Projects -->

    <!-- Services -->
    <section class="sa-schedules-wrap pd-default">
        <div class="container">
            <div class="sa-schedules-section">
                <div class="row">
                    <div class="col-lg-5 col-12">
                        <div class="sa-schedule">
                            <div class="sa-schedules-heading">
                                <h2>Service Times &amp; Schedules</h2>
                                <p>Many desktop publishing packages and the web page editors now use lorem Ipsum as their default model text and a search fornt.</p>
                            </div>

                            <a class="btn dark-btn" href="#">Contact us</a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-12">
                        <table class="table sa-schedules-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Schedule Day</th>
                                    <th scope="col">Time</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                <tr>
                                    <th scope="row">Saturday</th>
                                    <td>2:00 PM - 5:45 PM</td>
                                </tr>
                                <tr>
                                    <th scope="row">Sunday</th>
                                    <td>4:00 PM - 9:45 PM</td>
                                </tr>
                                <tr>
                                    <th scope="row">Monday</th>
                                    <td>9:00 PM - 5:45 PM</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tuesday</th>
                                    <td>2:00 PM - 5:45 PM</td>
                                </tr>
                                <tr>
                                    <th scope="row">Wednesday</th>
                                    <td>2:00 PM - 5:45 PM</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Services -->
@endsection