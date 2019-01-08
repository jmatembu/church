@extends('parish.layout.app')

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
                        <h4><a href="#">Which is the same as saying</a></h4>
                        <div class="event_info">
                            <div class="event_date">
                                <span>20</span> Aug'18
                            </div>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> Sunday  (8:00 - 9:00 am)</li>
                                <li><i class="fa fa-map-marker"></i> 56 Thatcher Avenue River Forest Chicago, IL United States</li>
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
                    <h2>We are a Church That Believes in <u>Jesus</u></h2>
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
    <section id="causes" class="section-padding gray_bg">
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
    </section>
     <!-- /Causes -->

    <!-- Latest-Events-Sermons -->
    <section class="section-padding latest_event_sermons m-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-5">
                    <div class="heading">
                        <h3>Latest Events</h3>
                        <a href="#" class="btn btn-sm pull-right">See All</a>
                    </div>
                    <div class="event_list">
                        <ul>
                            <li>
                                <div class="event_info">
                                    <div class="event_date">
                                        <span>20</span> Aug'18
                                    </div>
                                    <h6><a href="#">Which is the same as saying</a></h6>
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i> Sunday  (8:00 am -9:00 am)</li>
                                        <li><i class="fa fa-map-marker"></i> 56 Thatcher Avenue River Forest</li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="event_info">
                                    <div class="event_date">
                                        <span>16</span> Aug'18
                                    </div>
                                    <h6><a href="#">If you are going to use</a></h6>
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i> Sunday  (8:00 am -9:00 am)</li>
                                        <li><i class="fa fa-map-marker"></i> 56 Thatcher Avenue River Forest</li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="event_info">
                                    <div class="event_date">
                                        <span>27</span> Aug'18
                                    </div>
                                    <h6><a href="#">Nor again is there anyone</a></h6>
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i> Sunday  (8:00 am -9:00 am)</li>
                                        <li><i class="fa fa-map-marker"></i> 56 Thatcher Avenue River Forest</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                
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
    <section class="latest_blog section-padding">
        <div class="container">
            <div class="blog">
                <div class="section-header text-center">
                    <h2>Latest News</h2>
                </div>
                <div class="row">
                    <article class="col-md-6 col-12">
                        <div class="blog_wrap">
                            <div class="blog_img">
                                <a href="#"><img src="assets/images/post_1.jpg" alt="image"></a>
                            </div>
                            <div class="blog_info">
                                <div class="post_date"><a href="#">Aug 12, 2018</a></div>
                                <h5><a href="#">On the other hand</a></h5>
                                <p>You need to be sure there isn't anything embarrassing hidden in the middle of text. 
                                All the Lorem Ipsum generators on the Internet tend to repeat predefined</p>
                                <a href="#" class="btn">Details <i class="fa fa-caret-right"></i> </a>
                            </div>
                        </div>
                    </article>
                
                    <article class="col-md-6 col-12">
                        <div class="blog_wrap">
                            <div class="blog_img">
                                <a href="#"><img src="assets/images/post_2.jpg" alt="image"></a>
                            </div>
                            <div class="blog_info">
                                <div class="post_date"><a href="#">Aug 12, 2018</a></div>
                                <h5><a href="#">On the other hand</a></h5>
                                <p>You need to be sure there isn't anything embarrassing hidden in the middle of text. 
                                All the Lorem Ipsum generators on the Internet tend to repeat predefined</p>
                                <a href="#" class="btn">Details <i class="fa fa-caret-right"></i> </a>
                            </div>
                        </div>
                    </article>
                </div>    
            </div>
        </div>       
    </section>
    <!-- Latest-Blog -->
@endsection