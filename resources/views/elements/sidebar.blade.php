 <!-- Main sidebar -->
            <div class="sidebar sidebar-main">
                <div class="sidebar-content">


                    <div class="sidebar-user">
                        <div class="category-content">
                            <div class="media">
                                <a href="#" class="media-left"><img src="{{ url('') }}/assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
                                <div class="media-body">
                                    <span class="media-heading text-semibold">TheTrippytrip - Office</span>
                                    <div class="text-size-mini text-muted">
                                        <i class="icon-pin text-size-small"></i> &nbsp;Bali,Indonesia
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Main navigation -->
                    <div class="sidebar-category sidebar-category-visible">
  						         <div class="category-content no-padding">
  							           <ul class="navigation navigation-main navigation-accordion">


                                <!-- Main -->
                                <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                                <li><a href="{{ url('') }}/dashboard"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                                <li><a href="{{route('all-user')}}"><i class="icon-user"></i> <span>User</span></a></li>
                                <li><a href="{{route('add-article')}}"><i class="icon-stack2"></i> <span>Post Article</span></a></li>
                                <li>
                                  <a href="#"><i class="icon-copy"></i> <span>Article</span></a>
                                <ul>
                                        <li><a href="{{ route('article', [1]) }}">Event</a></li>
                                        <li><a href="{{ route('article', [2]) }}">Foods & Drinks</a></li>
                                        <li><a href="{{ route('article', [3]) }}">Nightlife</a></li>
                                        <li><a href="{{ route('article', [4]) }}">Lifestyle</a></li>
                                        <li><a href="{{ route('article', [5]) }}">Fashion</a></li>
                                        <li><a href="{{ route('article', [6]) }}">Culture</a></li>
                                        <li><a href="{{ route('article', [7]) }}">Resources</a></li>
                                        <li><a href="{{ route('article', [8]) }}">Tips</a></li>
                                </ul>
                                </li>
                                <li><a href="{{route('media')}}"><i class="icon-stack4"></i> <span>Media</span></a></li>
                                <li><a href="{{route('all-client')}}"><i class="icon-droplet2"></i> <span>Banner Ads</span></a></li>
                                <li><a href="{{route('all-client')}}"><i class="icon-people"></i> <span>Client</span></a></li>
                                <li><a href="{{route('get-contract')}}"><i class="icon-pencil3"></i> <span>Contract</span></a></li>
                                <li><a href="{{ url('') }}/table"><i class="icon-calendar3"></i> <span>Calendar</span></a></li>
                                <li><a href="{{ url('') }}/table"><i class="icon-inbox"></i> <span>Inbox</span></a></li>
                                <li><a href="{{ url('') }}/table"><i class="icon-graph"></i> <span>Revenue</span></a></li>
                                <li><a href="{{ url('') }}/table"><i class="icon-stack"></i> <span>Reports</span></a></li>
                                <li><a href="{{route('all-employee')}}"><i class="icon-footprint"></i> <span>Employee</span></a></li>
                                <li><a href="{{route('get-subscribe')}}"><i class="icon-man"></i> <span>Subscriber</span></a></li>

                            </ul>
                        </div>
                    </div>
                    <!-- /main navigation -->

                </div>
            </div>
            <!-- /main sidebar -->
