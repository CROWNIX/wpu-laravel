@extends("layouts.main")

@section("container")
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="div col-md-8">
                    <h2>{{ $post->title }}</h2>
                    <p>By : 
                        <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in 
                        <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
                    </p>
                    <?php if($post->category->name == "Web Programming") { ?>
                    <img src="/img/programming.jpg" alt="Web Programming" class="img-fluid" height="300"> 
                    <?php } else if($post->category->name == "Web Design") {?>
                    <img src="/img/web.jpeg" class="img-fluid" alt="Web Design" width="1200" height="400"> 
                    <?php } else{ ?>
                    <img src="/img/personal.jpg" class="img-fluid" alt="Personal" width="1200" height="400"> 
                    <?php } ?>

                    <article class="my-3">
                        {!! $post->body !!}
                    </article>
                    <a href="/posts" class="text-decoration-none d-block mt-3">&laquo Back to posts</a>
            </div>
        </div>
    </div>
@endsection