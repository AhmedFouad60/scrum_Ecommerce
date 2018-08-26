@push('css')
<style>

    @media screen
    and (min-device-width: 1200px)
    and (max-device-width: 1600px)
    and (-webkit-min-device-pixel-ratio: 1) {
        .post-image{
            max-height:185px;
        }

    }

    /* ----------- Retina Screens ----------- */
    @media screen
    and (min-device-width: 1200px)
    and (max-device-width: 1600px)
    and (-webkit-min-device-pixel-ratio: 2)
    and (min-resolution: 192dpi) {
        .post-image{
            max-height:185px;
        }
    }
</style>

@endpush

<div class="container">
    <div class="row" style="margin-bottom: 50px;">
        <h3 class="text-center" style="font-weight:bold;color: #ffffff;">Latest News</h3>
        <p class="text-center" style="font-size: 12px;color: #ffffff;">
            Check our Blog to get the latest news And offers

        </p>
    </div>
    <!--End of the row-->

    <div class="row">
@foreach($posts as $post)
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="post-card-item">
                <div class="item-thumb">
                    <a href="{{url::to('/blog/'.$post->id)}}">
                        <img src="{{$post->image}}" style=" " alt="" class="img-thumbnail  post-image">
                    </a>
                </div>
                <div class="post-card-body">
                    <div class="post-card-description">
                        <ul class="list-inline">
                            <li><i class="fa fa-calendar"></i> {{$post->created_at}} </li>
                            <li><i class="fa fa-eye"></i> <a href="#" rel="category tag">5</a></li>
                        </ul>
                        <h3><a href="{{url::to('/blog/'.$post->id)}}">{{str_limit($post->title,25)}} </a></h3>
                        <p>
                            {{str_limit($post->excerpt,20)}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach





    </div>
    <!--End of the row-->
</div>
<!--End of the container-->