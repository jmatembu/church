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
    <section class="latest_event_sermons mg-top--50">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="box_wrap next_event">
                        <p class="subtitle">Next Event</p>
                        <h4><a href="#">{{ $nextEvent->title }}</a></h4>
                        <div class="event_info">
                            <div class="event_date">
                                <span>{{ $nextEvent->starts_at->format('d') }}</span> {{ $nextEvent->starts_at->format('M y') }}
                            </div>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> {{  $nextEvent->starts_at->diffForHumans() }}</li>
                                <li><i class="fa fa-paperclip"></i> {{ str_limit($nextEvent->description, 100) }}</li>
                            </ul>
                        </div>
                        <a href="#" class="btn">Join Now <i class="fa fa-caret-right"></i> </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box_wrap next_sermons">
                        <p class="subtitle">Latest Sermons</p>
                        <h4><a href="#">We denounce with righteous</a></h4>
                        <ul class="sermons_meta">
                            <li><i class="fa fa-user"></i> Message from <a href="#">Frederick</a></li>
                            <li><i class="fa fa-calendar-check-o"></i> Aug 12, 2018</li>
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
                                  <source src="http://www.lukeduncan.me/oslo.mp3" type="audio/mp3">
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
    <section class="about_intro section-padding">
        <div class="container">
            <div class="about_us">
                <div class="section-header text-center">
                    <h2>About <u>{{ $parish->name }}</u></h2>
                </div>
                <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).  If you are going to use a passage of Lorem Ipsum.</p>
                <p>You need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined. chunks as necessary.</p>
            </div>
            <div class="text-center">
                <a href="#" class="btn btn-lg dark-btn">Explore Events</a>
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
                                    <h6><a href="#">{{ $event->title }}</a></h6>
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
                <div class="col-md-6 col-lg-5 offset-lg-2">
                    <div class="heading">
                        <h3>Latest Sermons</h3>
                        <a href="#" class="btn btn-sm pull-right">See All</a>
                    </div>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                              <h6 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  But I must explain to you how</a>
                              </h6>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in show" role="tabpanel" aria-labelledby="headingOne">
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
                          
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                              <h6 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                   Who loves or pursues</a>
                              </h6>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
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
                          
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                              <h6 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">That pleasures have to be repudiated</a>
                              </h6>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
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
                          
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                              <h6 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">To take a trivial example</a>
                              </h6>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
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
                          
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Latest-Events-Sermons -->

    <!-- Latest-Blog -->
    @if($news->count())
    <section class="latest_blog section-padding">
        <div class="container">
            <div class="blog">
                <div class="section-header text-center">
                    <h2>Latest News</h2>
                </div>
                <div class="row">
                    @foreach($news as $post)
                    <article class="col-md-6 col-12">
                        <div class="blog_wrap">
                            <div class="blog_img">
                                <a href="#"><img src="assets/images/post_1.jpg" alt="image"></a>
                            </div>
                            <div class="blog_info">
                                <div class="post_date"><a href="#">{{ $post->start_publishing_at->format('M d, Y') }}</a></div>
                                <h5><a href="#">{{ $post->title }}</a></h5>
                                <p>{{ str_limit(strip_tags($post->body), 150) }}</p>
                                <a href="#" class="btn">Read more... <i class="fa fa-caret-right"></i> </a>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>    
            </div>
        </div>       
    </section>
    @endif
    <!-- Latest-Blog -->

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