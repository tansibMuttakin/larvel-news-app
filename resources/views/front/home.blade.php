@extends('front.layout.master')

@section('content')
<section id="feature_news_section" class="feature_news_section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="feature_article_wrapper">
                    <div class="feature_article_img">
                        <img class="img-responsive top_static_article_img" src="/post/{{$hot_news->main_img}}"
                             alt="{{$hot_news->title}}">
                    </div>
                    <!-- feature_article_img -->

                    <div class="feature_article_inner">
                        <div class="tag_lg red"><a href="category.html">Hot News</a></div>
                        <div class="feature_article_title">
                            <h1><a href="#" target="_self">{{$hot_news->title}}</a></h1>
                        </div>
                        <!-- feature_article_title -->

                        <div class="feature_article_date"><a href="#" target="_self">{{$hot_news->creator->name}}</a>,
                        <a href="#" target="_self">{{date('F j, Y',strtotime($hot_news->created_at))}}</a></div>
                                                                                                        
                        <!-- feature_article_date -->

                        <div class="feature_article_content">
                            {{$hot_news->short_description}}
                        </div>
                        <!-- feature_article_content -->

                        <div class="article_social">
                            <span><i class="fa fa-share-alt"></i><a href="#">424</a>Shares</span>
                            <span><i class="fa fa-comments-o"></i><a href="#">{{$hot_news->comments_count}}</a>Comments</span>
                        </div>
                        <!-- article_social -->

                    </div>
                    <!-- feature_article_inner -->

                </div>
                <!-- feature_article_wrapper -->

            </div>
            <!-- col-md-7 -->
            @foreach($top_viewed as $row)
            <div class="col-md-5">
                <div class="feature_static_wrapper">
                    <div class="feature_article_img" style="margin-bottom:10px;">
                        <img class="img-responsive" style="height:280px; width:480px;" src="/post/{{$row->main_img}}" alt="{{$row->title}}">
                    </div>
                    <!-- feature_article_img -->

                    <div class="feature_article_inner">
                        <div class="tag_lg purple"><a href="category.html">Top Viewed</a></div>
                        <div class="feature_article_title">
                            <h1><a href="single.html" target="_self">{{$row->title}}</a></h1>
                        </div>
                        <!-- feature_article_title -->

                        <div class="feature_article_date"><a href="#" target="_self">{{$row->creator->name}}</a>,<a href="#"
                                                                                                         target="_self">{{date('F j, Y',strtotime($row->created_at))}}</a></div>
                        <!-- feature_article_date -->

                        <div class="feature_article_content">
                            {{ Str::limit($row->short_description, 50, '...')}}
                        </div>
                        <!-- feature_article_content -->

                        <div class="article_social">
                            <span><i class="fa fa-share-alt"></i><a href="#">424</a>Shares</span>
                            <span><i class="fa fa-comments-o"></i><a href="#">{{$row->comments_count}}</a>Comments</span>
                        </div>
                        <!-- article_social -->

                    </div>
                    <!-- feature_article_inner -->

                </div>
                <!-- feature_static_wrapper -->

            </div>
            @endforeach
            <!-- col-md-5 -->
        </div>
        <!-- Row -->

    </div>
    <!-- container -->

</section>
<!-- Feature News Section -->

<section id="category_section" class="category_section">
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="category_section mobile">
    @foreach($category_post as $category)
                <div class="article_title header_purple">
                    <h2><a href="{{url('/category')}}/{{$category->id}}" target="_self">{{$category->name}}</a></h2>
                </div>
                <!----article_title------>
                @foreach($category->posts as $i => $post)
                @if($i === 0)
                    <div class="category_article_wrapper">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="top_article_img">
                                    <a href="single.html" target="_self"><img class="img-responsive"
                                                                            src="/post/{{$post->list_img}}" alt="{{$post->title}}">
                                    </a>
                                </div>
                                <!----top_article_img------>
                            </div>
                            <div class="col-md-6">
                                <span class="tag purple">{{$category->name}}</span>

                                <div class="category_article_title">
                                    <h2><a href="single.html" target="_self">{{$post->title}}</a></h2>
                                </div>
                                <!----category_article_title------>
                                <div class="category_article_date"><a href="#">{{date('j F, Y',strtotime($post->created_at))}}</a>, by: <a href="#">{{$post->creator->name}}</a></div>
                                <!----category_article_date------>
                                <div class="category_article_content">
                                    {{Str::limit($post->short_description,30,'...')}}
                                </div>
                                <!----category_article_content------>
                                <div class="media_social">
                                    <span><a href="#"><i class="fa fa-share-alt"></i>424 </a> Shares</span>
                                    <span><i class="fa fa-comments-o"></i><a href="#">{{count($post->comments)}}</a> Comments</span>
                                </div>
                                <!----media_social------>
                            </div>
                        </div>
                    </div>
                @else
                @if($i === 1)
                <div class="category_article_wrapper">
                    <div class="row">
                @endif
                        <div class="col-md-6">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#"><img class="media-object"  style="margin-bottom:3px;" style="margin-bottom:4px;" src="/post/{{$post->thumb_img}}"
                                                    alt="{{$post->title}}"></a>
                                </div>
                                <div class="media-body">
                                    <span class="tag purple">{{$category->name}}</span>

                                    <h3 class="media-heading"><a href="single.html" target="_self">{{Str::limit($post->title,60,'...')}}</a></h3>
                                    <span class="media-date"><a href="#">{{date('j F, Y',strtotime($post->created_at))}}</a>,  by: <a href="#">{{$post->creator->name}}</a></span>

                                    <div class="media_social">
                                        <span><a href="#"><i class="fa fa-share-alt"></i>424</a> Shares</span>
                                        <span><a href="#"><i class="fa fa-comments-o"></i>{{count($post->comments)}}</a> Comments</span>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="media">
                                <div class="media-left">
                                    <a href="#"><img class="media-object" src="assets/img/cat-mobi-sm3.jpg"
                                                    alt="Generic placeholder image"></a>
                                </div>
                                <div class="media-body">
                                    <span class="tag purple">Mobile</span>

                                    <h3 class="media-heading"><a href="single.html" target="_self">The Portable Charger or data
                                        cable</a></h3>
                                    <span class="media-date"><a href="#">10Aug- 2015</a>,  by: <a href="#">Eric joan</a></span>

                                    <div class="media_social">
                                        <span><a href="#"><i class="fa fa-share-alt"></i>424</a> Shares</span>
                                        <span><a href="#"><i class="fa fa-comments-o"></i>4</a> Comments</span>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        @if($loop->last)
                        <!-- <div class="col-md-6">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#"><img class="media-object" src="assets/img/cat-mobi-sm2.jpg"
                                                    alt="Generic placeholder image"></a>
                                </div>
                                <div class="media-body">
                                    <span class="tag purple">Mobile</span>

                                    <h3 class="media-heading"><a href="single.html" target="_self">Iphone 6 launches white & Grey
                                        colors handset</a></h3>
                                    <span class="media-date"><a href="#">10Aug- 2015</a>,  by: <a href="#">Eric joan</a></span>

                                    <div class="media_social">
                                        <span><a href="#"><i class="fa fa-share-alt"></i>424</a> Shares</span>
                                        <span><a href="#"><i class="fa fa-comments-o"></i>4</a> Comments</span>
                                    </div>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#"><img class="media-object" src="assets/img/cat-mobi-sm4.jpg"
                                                    alt="Generic placeholder image"></a>
                                </div>
                                <div class="media-body">
                                    <span class="tag purple">Mobile</span>

                                    <h3 class="media-heading"><a href="single.html" target="_self">Fully new look slim handset
                                        like</a></h3>
                                    <span class="media-date"><a href="#">10Aug- 2015</a>,  by: <a href="#">Eric joan</a></span>

                                    <div class="media_social">
                                        <span><a href="#"><i class="fa fa-share-alt"></i>424</a> Shares</span>
                                        <span><a href="#"><i class="fa fa-comments-o"></i>4</a> Comments</span>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                @endif
                @endif
                @endforeach
            <p class="divider"><a href="#">More News&nbsp;&raquo;</a></p>
    @endforeach
</div>
<!-- Mobile News Section -->
</div>
<!-- Left Section -->

<div class="col-md-4">
    <div class="widget">
        <div class="widget_title widget_black">
            <h2><a href="#">Popular News</a></h2>
        </div>
        @foreach($shareData['posts'] as $post)
        <div class="media">
            <div class="media-left">
                <a href="#"><img class="media-object" src="/post/{{$post->thumb_img}}" alt="{{$post->title}}"></a>
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
        <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&raquo;</a></p>
    </div>
    <!-- Popular News -->

    <div class="widget hidden-xs m30">
        <img class="img-responsive adv_img" src="assets/img/right_add1.jpg" alt="add_one">
        <img class="img-responsive adv_img" src="assets/img/right_add2.jpg" alt="add_one">
        <img class="img-responsive adv_img" src="assets/img/right_add3.jpg" alt="add_one">
        <img class="img-responsive adv_img" src="assets/img/right_add4.jpg" alt="add_one">
    </div>
    <!-- Advertisement -->

    <div class="widget hidden-xs m30">
        <img class="img-responsive widget_img" src="assets/img/right_add5.jpg" alt="add_one">
    </div>
    <!-- Advertisement -->

    <div class="widget reviews m30">
        <div class="widget_title widget_black">
            <h2><a href="#">Reviews</a></h2>
        </div>
        <div class="media">
            <div class="media-left">
                <a href="#"><img class="media-object" src="assets/img/pop_right1.jpg" alt="Generic placeholder image"></a>
            </div>
            <div class="media-body">
                <h3 class="media-heading">
                    <a href="single.html" target="_self">DSLR is the most old camera at this time readmore about new
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
                <a href="#"><img class="media-object" src="assets/img/pop_right2.jpg" alt="Generic placeholder image"></a>
            </div>
            <div class="media-body"><h3 class="media-heading"><a href="single.html" target="_self">Samsung is the best
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
                <a href="#"><img class="media-object" src="assets/img/pop_right3.jpg" alt="Generic placeholder image"></a>
            </div>
            <div class="media-body">
                <h3 class="media-heading">
                    <a href="single.html" target="_self">Apple launches photo-centric wrist watch for Android</a>
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
                <a href="#"><img class="media-object" src="assets/img/pop_right4.jpg" alt="Generic placeholder image"></a>
            </div>
            <div class="media-body">
                <h3 class="media-heading">
                    <a href="single.html" target="_self">Yasaki camera launches new generic hi-speed shutter camera.</a>
                </h3> 
                <span class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-full"></i>
                </span></div>
        </div>
        <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&raquo;</a></p>
    </div>
    <!-- Reviews News -->

    <div class="widget hidden-xs m30">
        <img class="img-responsive widget_img" src="assets/img/right_add6.jpg" alt="add_one">
    </div>
    <!-- Advertisement -->

    <div class="widget m30">
        <div class="widget_title widget_black">
            <h2><a href="#">Most Commented</a></h2>
        </div>
        @foreach($shareData['most_commented'] as $post)
        <div class="media">
            <div class="media-left">
                <a href="#"><img class="media-object" src="/post/{{$post->thumb_img}}" alt="{{$post->title}}"></a>
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
        <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&nbsp;&raquo; </a></p>
    </div>
    <!-- Most Commented News -->

    <div class="widget m30">
        <div class="widget_title widget_black">
            <h2><a href="#">Editor Corner</a></h2>
        </div>
        <div class="widget_body"><img class="img-responsive left" src="assets/img/editor.jpg"
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
        <img class="img-responsive add_img" src="assets/img/right_add7.jpg" alt="add_one">
        <img class="img-responsive add_img" src="assets/img/right_add7.jpg" alt="add_one">
        <img class="img-responsive add_img" src="assets/img/right_add7.jpg" alt="add_one">
        <img class="img-responsive add_img" src="assets/img/right_add7.jpg" alt="add_one">
    </div>
    <!--Advertisement -->

    <div class="widget m30">
        <div class="widget_title widget_black">
            <h2><a href="#">Readers Corner</a></h2>
        </div>
        <div class="widget_body"><img class="img-responsive left" src="assets/img/reader.jpg"
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
<!-- Right Section -->

</div>
<!-- Row -->

</div>
<!-- Container -->

</section>
<!-- Category News Section -->

<section id="video_section" class="video_section">
    <div class="container">
        <div class="well">
            <div class="row">
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/MJ-jbFdUPns"
                                frameborder="0" allowfullscreen></iframe>
                    </div>
                    <!-- embed-responsive -->

                </div>
                <!-- col-md-6 -->

                <div class="col-md-3">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/h5Jni-vy_5M"></iframe>
                    </div>
                    <!-- embed-responsive -->

                    <div class="embed-responsive embed-responsive-4by3 m16">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wQ5Gj0UB_R8"></iframe>
                    </div>
                    <!-- embed-responsive -->

                </div>
                <!-- col-md-3 -->

                <div class="col-md-3">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/UPvJXBI_3V4"></iframe>
                    </div>
                    <!-- embed-responsive -->

                    <div class="embed-responsive embed-responsive-4by3 m16">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/DTCtj5Wz6BM"></iframe>
                    </div>
                    <!-- embed-responsive -->

                </div>
                <!-- col-md-3 -->

            </div>
            <!-- row -->

        </div>
        <!-- well -->

    </div>
    <!-- Container -->

</section>
<!-- Video News Section -->
@endsection