<div class="sidebar course-sidebar col-md-4 col-sm-12 pull-right">
    <div class="widget clearfix">
        <div class="widget-title">
            <h3>Tags</h3>
            <hr>
        </div><!-- end widget-title -->
        <div class="tags clearfix">
            @foreach($tags as $tag)

            <a href="{{url::to('/search?search='.$tag->tag_name)}}">{{$tag->tag_name}}</a>
                @endforeach

        </div><!-- end tags -->
    </div><!-- end widget -->

</div>