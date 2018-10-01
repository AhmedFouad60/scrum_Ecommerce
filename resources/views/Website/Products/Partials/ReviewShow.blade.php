{{--@forelse( as $key => $review)--}}

    <div class="media">

    <div class="media-left">
        <a href="#">
            <img class="media-object" src="{!!url(@$review['user']->defaultImage('md','photo'))!!}" alt="user">
        </a>
    </div>

    <div class="media-body">
        <h4 class="media-heading">{!!@$review->title!!}</h4>
        <span class="review-rating">
                                        @for($i=0; $i<5; $i++)
                <?php
                $score = ($i < $review->score)? 'fa fa-star' : 'fa fa-star-o';
                ?>
                <i class="{{@$score}}" aria-hidden="true"></i>
            @endfor
                                    </span>
        <p>{!!@$review->description!!}</p>
        <div class="media-footer">
            <p><span>{!!@$review['user']['name']!!},</span> {!!format_date(@$review->created_at)!!}</p>
        </div>
    </div>
</div>
{{--@empty--}}
    {{--<p>No Reviews Available</p>--}}