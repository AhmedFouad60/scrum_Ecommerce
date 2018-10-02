@forelse($reviews as $review)
    <div class="media">
    <div class="media-left">
        <a href="#">
            <img class="media-object" src="https://i1.wp.com/www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png?fit=256%2C256&quality=100&ssl=1" alt="user">
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
            {{--<p><span>{!!@$review['user']['name']!!},</span> {!!format_date(@$review->created_at)!!}</p>--}}
        </div>
    </div>
</div>
@empty
    <p>No Reviews Available</p>
@endforelse
