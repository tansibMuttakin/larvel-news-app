@extends('front.layout.master')

@section('content')
<section class="breadcrumb_section">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Tech</a></li>
                <li class="active"><a href="#">Mobile</a></li>
            </ol>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            @foreach($posts as $i => $post)
            @if($i === 0)
            <div class="entity_wrapper" style="margin-bottom:4px;">
                <div class="entity_title header_purple">
                    <h1><a href="{{url('/category/'.$post->category_id)}}" target="_blank">{{$post->category->name}}</a></h1>
                </div>
                <!-- entity_title -->
                <div class="entity_thumb">
                    <img class="img-responsive" src="../post/{{$post->main_img}}" alt="feature-top">
                </div>
                <!-- entity_thumb -->

                <div class="entity_title">
                    <a href="{{url('/details')}}/{{$post->slug}}" target="_blank"><h3>{{$post->title}}</h3></a>
                </div>
                <!-- entity_title -->

                <div class="entity_meta">
                    <a href="#">{{date('F j, Y',strtotime($post->created_at))}}</a>, by: <a href="#">{{$post->creator->name}}</a>
                </div>
                <!-- entity_meta -->

                <div class="entity_content">
                    {{$post->short_description}}
                </div>
                <!-- article_content -->

                <div class="article_social">
                    <span><a href="#"><i class="fa fa-share-alt"></i>424</a>Shares</span>
                    <span><a href="#"><i class="fa fa-comments-o"></i>{{count($post->comments)}}</a>Comments</span>
                </div>
                <!-- entity_social -->
            </div>
            <!-- entity_wrapper -->
            @else
            @if($i === 1)
            <div class="row">
            @endif
                <div class="col-md-6">
                    <div class="category_article_body"  style="margin-bottom:3px;">
                        <div class="top_article_img">
                            <img class="img-fluid" src="../post/{{$post->list_img}}" alt="feature-top">
                        </div>
                        <!-- top_article_img -->

                        <div class="category_article_title">
                            <h5><a href="{{url('/details')}}/{{$post->slug}}" target="_blank">{{$post->title}}</a></h5>
                        </div>
                        <!-- category_article_title -->

                        <div class="article_date">
                            <a href="#">{{date('F j, Y',strtotime($post->crated_at))}}</a>, by: <a href="#">{{$post->creator->name}}</a>
                        </div>
                        <!-- article_date -->

                        <div class="category_article_content">
                            {{Str::limit($post->short_description,200,'...')}}
                        </div>
                        <!-- category_article_content -->

                        <div class="article_social">
                            <span><a href="#"><i class="fa fa-share-alt"></i>424 </a> Shares</span>
                            <span><i class="fa fa-comments-o"></i><a href="#">{{count($post->comments)}}</a> Comments</span>
                        </div>
                        <!-- article_social -->

                    </div>
                    <!-- category_article_body -->
                </div>
                <!-- col-md-6 -->
            @if($loop->last)    
            </div>
            @endif
            @endif
            @endforeach
            <div style="margin-left: 40%">
                {{ $posts->links() }}
            </div>
            <!-- navigation -->
        </div>
        <!-- col-md-8 -->
        <div class="col-md-4">
            <div class="widget">
                <div class="widget_title widget_black">
                    <h2><a href="#">Popular News</a></h2>
                </div>
                @foreach($shareData['posts'] as $post)
                <div class="media">
                    <div class="media-left">
                        <a href="#"><img class="media-object" src="../post/{{$post->thumb_img}}" alt="{{$post->title}}"></a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            <a href="single.html" target="_self">{{$post->title}}</a>
                        </h3> <span class="media-date"><a href="#">{{date('j F -Y',strtotime($post->created_at))}}</a>,  by: <a href="#">{{$post->creator->name}}</a></span>

                        <div class="widget_article_social">
                            <span>
                                <a href="single.html" target="_self"> <i class="fa fa-share-alt"></i>424</a> Shares
                            </span> 
                            <span>
                                <a href="single.html" target="_self"><i class="fa fa-comments-o"></i>{{count($post->comments)}}</a> Comments
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Popular News -->
                <p class="widget_divider"><a href="#" target="_blank">More News&nbsp;&raquo;</a></p>
            </div>
            <!-- Popular News -->

            <div class="widget reviews m30">
                <div class="widget_title widget_black">
                    <h2><a href="#">Reviews</a></h2>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a href="#"><img class="media-object" src="/assets/img/pop_right1.jpg" alt="Generic placeholder image"></a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            <a href="single.html" target="_blank">DSLR is the most old camera at this time readmore about new
                                products</a>
                        </h3> 
                        <span class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-full"></i>
                        </span>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a href="#"><img class="media-object" src="/assets/img/pop_right2.jpg" alt="Generic placeholder image"></a>
                    </div>
                    <div class="media-body"><h3 class="media-heading"><a href="single.html" target="_blank">Samsung is the best
                        mobile in the android market.</a></h3> <span class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-full"></i>
                        </span></div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a href="#"><img class="media-object" src="/assets/img/pop_right3.jpg" alt="Generic placeholder image"></a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            <a href="single.html" target="_blank">Apple launches photo-centric wrist watch for Android</a>
                        </h3> 
                        <span class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-full"></i>
                        </span></div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a href="#"><img class="media-object" src="/assets/img/pop_right4.jpg" alt="Generic placeholder image"></a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            <a href="single.html" target="_blank">Yasaki camera launches new generic hi-speed shutter camera.</a>
                        </h3> 
                        <span class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-full"></i>
                        </span></div>
                </div>
                <p class="widget_divider"><a href="#" target="_blank">More News&nbsp;&raquo;</a></p>
            </div>    
            <!-- Reviews News -->
            <div class="widget m30">
                <div class="widget_title widget_black">
                    <h2><a href="#">Most Commented</a></h2>
                </div>
                @foreach($shareData['most_commented'] as $post)
                <div class="media">
                    <div class="media-left">
                        <a href="#"><img class="media-object" src="../post/{{$post->thumb_img}}" alt="{{$post->title}}"></a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">
                            <a href="single.html" target="_self">{{$post->title}}</a>
                        </h3>

                        <div class="media_social">
                            <span><i class="fa fa-comments-o"></i><a href="#">{{$post->comments_count}}</a> Comments</span>
                        </div>
                    </div>
                </div>
                @endforeach
                <p class="widget_divider"><a href="#" target="_blank">More News&nbsp;&nbsp;&raquo; </a></p>
            </div>
            <!-- Most Commented News -->
            <div class="widget hidden-xs m30">
                <img class="img-responsive adv_img" src="/assets/img/right_add1.jpg" alt="add_one">
                <img class="img-responsive adv_img" src="/assets/img/right_add2.jpg" alt="add_one">
                <img class="img-responsive adv_img" src="/assets/img/right_add3.jpg" alt="add_one">
                <img class="img-responsive adv_img" src="/assets/img/right_add4.jpg" alt="add_one">
            </div>
            <!-- Advertisement -->
            <div class="widget hidden-xs m30">
                <img class="img-responsive widget_img" src="/assets/img/right_add5.jpg" alt="add_one">
            </div>
            <!-- Advertisement -->
            <div class="widget hidden-xs m30">
                <img class="img-responsive widget_img" src="/assets/img/right_add6.jpg" alt="add_one">
            </div>
            <!-- Advertisement -->
            <div class="widget m30">
                <div class="widget_title widget_black">
                    <h2><a href="#">Editor Corner</a></h2>
                </div>
                <div class="widget_body"><img class="img-responsive left" src="/assets/img/editor.jpg"
                                            alt="Generic placeholder image">

                    <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
                        users after installed base benefits. Dramatically visualize customer directed convergence without</p>

                    <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
                        users after installed base benefits. Dramatically visualize customer directed convergence without
                        revolutionary ROI.</p>
                    <button class="btn pink">Read more</button>
                </div>
            </div>
            <!-- Editor News -->

            <div class="widget hidden-xs m30">
                <img class="img-responsive add_img" src="/assets/img/right_add7.jpg" alt="add_one">
                <img class="img-responsive add_img" src="/assets/img/right_add7.jpg" alt="add_one">
                <img class="img-responsive add_img" src="/assets/img/right_add7.jpg" alt="add_one">
                <img class="img-responsive add_img" src="/assets/img/right_add7.jpg" alt="add_one">
            </div>
            <!--Advertisement -->

            <div class="widget m30">
                <div class="widget_title widget_black">
                    <h2><a href="#">Readers Corner</a></h2>
                </div>
                <div class="widget_body"><img class="img-responsive left" src="/assets/img/reader.jpg"
                                            alt="Generic placeholder image">

                    <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
                        users after installed base benefits. Dramatically visualize customer directed convergence without</p>

                    <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
                        users after installed base benefits. Dramatically visualize customer directed convergence without
                        revolutionary ROI.</p>
                    <button class="btn pink">Read more</button>
                </div>
            </div>
            <!--  Readers Corner News -->
            <div class="widget hidden-xs m30">
                <img class="img-responsive widget_img" src="/assets/img/podcast.jpg" alt="add_one">
            </div>
            <!--Advertisement-->
        </div>
        <!-- col-md-4 --> 
    </div>    
    <!-- row -->
</div>
<!-- container -->
@endsection
