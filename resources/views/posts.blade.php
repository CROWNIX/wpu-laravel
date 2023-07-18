@extends("layouts.main")

@section("container")
    <h1 class="mb-5 text-center">{{ $title }}</h1>

    {{-- Search --}}
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/posts">
                @if (request("category"))
                    <input type="hidden" name="category" value="{{ request("category") }}">
                @endif
                @if (request("author"))
                    <input type="hidden" name="author" value="{{ request("author") }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search...." name="search" value="{{ request("search") }}">
                    <button class="btn btn-danger" type="submit" id="search-button">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            @if ($posts[0]->image)
                <img src="{{ asset("storage/" . $posts[0]->image) }}" alt="Web Programming" class="img-fluid mt-3">  
            @else
                <?php if($posts[0]->category->name == "Web Programming") { ?>
                <img src="/img/programming.jpg" class="card-img-top" alt="Web Programming" width="1200" height="400"> 
                <?php } else if($posts[0]->category->name == "Web Design") {?>
                <img src="/img/web.jpeg" class="card-img-top" alt="Web Design" width="1200" height="400"> 
                <?php } else{ ?>
                <img src="/img/personal.jpg" class="card-img-top" alt="Personal" width="1200" height="400"> 
                <?php } ?>
            @endif
            
            <div class="card-body text-center">
                <h5 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-dark text-decoration-none fs-4">{{ $posts[0]->title }}</a></h5>
                <p>
                    <small class="text-muted">
                        By : 
                        <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in 
                        <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more....</a>
            </div>
        </div>   
        <div class="container mb-4">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-3">
                    <div class="card" style="height: 100%">
                        <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.8)">{{ $post->category->name }}</a>
                        @if ($post->image)
                            <img src="{{ asset("storage/" . $post->image) }}" alt="Web Programming" class="card-img-top" width="500" height="300">  
                        @else
                            <?php if($post->category->name == "Web Programming") { ?>
                            <img src="/img/programming.jpg" class="card-img-top" alt="Web Programming" width="500" height="300"> 
                            <?php } else if($post->category->name == "Web Design") {?>
                            <img src="/img/web.jpeg" class="card-img-top" alt="Web Design" width="500" height="300"> 
                            <?php } else{ ?>
                            <img src="/img/personal.jpg" class="card-img-top" alt="Personal" width="500" height="300"> 
                            <?php } ?>
                        @endif
                        
                        <div class="card-body">
                            <h5 class="card-title"> {{ $post->title  }}</h5>
                            <p>
                                <small class="text-muted">
                                    By : 
                                    <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}
                                </small>
                            </p>
                            <p class="card-text mb-5">{{ $post->excerpt }}</p>
                            <a href="/posts/{{ $post->slug }}" class="btn btn-primary position-absolute mb-2" style="bottom: 0;">Read more....</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No post found</p>
    @endif
    
    {{-- Pagination --}}
    <div class="d-flex justify-content-center mb-5">
        {{ $posts->links() }}
    </div>
@endsection