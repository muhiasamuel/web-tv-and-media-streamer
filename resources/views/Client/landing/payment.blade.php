<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<meta name="csrf-token" content="{{ csrf_token() }}" />


<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Posts</div>


                <div class="card-body">
                    @if($posts->count())
                        @foreach($posts as $post)
                            <article class="col-xs-12 col-sm-6 col-md-3">
                                <div class="panel panel-info" data-id="{{ $post->id }}">
                                    <div class="panel-body">
                                        <a href="https://itsolutionstuff.com/upload/itsolutionstuff.png" title="Nature Portfolio" data-title="Amazing Nature" data-footer="The beauty of nature" data-type="image" data-toggle="lightbox">
                                            <img src="https://itsolutionstuff.com/upload/itsolutionstuff.png" alt="Nature Portfolio" />
                                            <span class="overlay"><i class="fa fa-search"></i></span>
                                        </a>
                                    </div>  
                                    <div class="panel-footer">
                                        <h4><a href="#" title="Nature Portfolio">{{ $post->title }}</a></h4>
                                        <span class="pull-right">
                                            <span class="like-btn">
                                                <i id="like{{$post->id}}" class="glyphicon glyphicon-thumbs-up {{ auth()->user()->hasLiked($post) ? 'like-post' : '' }}"></i> <div id="like{{$post->id}}-bs3">{{ $post->likers()->get()->count() }}</div>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {     


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('i.glyphicon-thumbs-up, i.glyphicon-thumbs-down').click(function(){    
            var id = $(this).parents(".panel").data('id');
            var c = $('#'+this.id+'-bs3').html();
            var cObjId = this.id;
            var cObj = $(this);


            $.ajax({
               type:'POST',
               url:'/ajaxRequest',
               data:{id:id},
               success:function(data){
                  if(jQuery.isEmptyObject(data.success.attached)){
                    $('#'+cObjId+'-bs3').html(parseInt(c)-1);
                    $(cObj).removeClass("like-post");
                  }else{
                    $('#'+cObjId+'-bs3').html(parseInt(c)+1);
                    $(cObj).addClass("like-post");
                  }
               }
            });


        });      


        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });                                        
    }); 
</script>