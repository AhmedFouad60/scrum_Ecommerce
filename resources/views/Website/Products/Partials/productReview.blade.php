{!! Form::open(['url' => '/product/review','method'=>'post','id'=>'product-review']) !!}
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::text('title', null, ['placeholder'=>'Title', 'class' => 'form-control']) !!}

        </div>
    </div>
</div>
{!!Form::hidden('product_id',$product->id)!!}
@if(user('web'))
    {!!Form::hidden('user_id', Auth::user()->id)!!}
@else
@endif

<div class="form-group">
    {!!Form::textarea('description',null,['class'=>'form-control','rows'=>'3','placeholder'=>'Write your review here...'])

        !!}
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="input-1" class="control-label">Rate This</label>

            <div class="star-rate"></div>
        </div>
    </div>
</div>

<button type="button" class="btn btn-primary add-review">Submit</button>
{!! Form::close() !!}

@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            //your code here
            $(".add-review").click(function () {

                    @if( user('web') ) {

                    let form=$('#product-review');
                    let formData=new FormData();
                    params=form.serializeArray();


                    $.each(params,function (i,val) {
                        formData.append(val.name,val.value);
                    });
                    /**console log for formdata*/
                    // for (var pair of formData.entries()) {
                    //     console.log(pair[0]+ ', ' + pair[1]);
                    // }

                    // make ajax request to add review to the product
                    $.ajax({
                        type:'POST',
                        url:"/product/review",
                        data:formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        dataType:'json',
                        success:function (data,textStatus) {
                            //do what you want ...inform user with success message or do something with the front-end
                            $.each(data.errors, function(key, value){
                                toastr.error(value);
                            });
                            if (data.success){
                                let product_id=data.product_id;
                                setTimeout(function(){
                                    $('.reviews-show').load('{{URL::to("reviews/review/latest")}}'+'/'+product_id);

                                }, 1000);
                                toastr.success('Review submitted successfully.');

                            }
                        },

                    });
                }@else {
                    window.location.href='/login';
                }
                @endif
            });

        }); //JQuery end

    </script>

@endpush