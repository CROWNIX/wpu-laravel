@extends("dashboard.layouts.main")

@section("container")
    <div class="container">
        <div class="row my-3">
            <div class="div col-lg-8 fs-6">
                    <h2>{{ $post->title }}</h2>
                    <a href="/dashboard/posts" class="btn btn-success">&laquo; Back to my posts</a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning">Edit post</a>
                    <form action="/dashboard/posts/{{ $post->slug }}" class="d-inline" method="post">
                        @method("delete")
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure ?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">Delete</button>
                    </form>
                    @if ($post->image)
                        <img src="{{ asset("storage/" . $post->image) }}" alt="Web Programming" class="img-fluid mt-3">  
                    @else
                        <?php if($post->category->name == "Web Programming") { ?>
                        <img src="/img/programming.jpg" alt="Web Programming" class="img-fluid mt-3"> 
                        <?php } else if($post->category->name == "Web Design") {?>
                        <img src="/img/web.jpeg" class="img-fluid mt-3" alt="Web Design"> 
                        <?php } else{ ?>
                        <img src="/img/personal.jpg" class="img-fluid mt-3" alt="Personal"> 
                        <?php } ?>
                    @endif

                    <article class="my-3">
                        {!! $post->body !!}
                    </article>
                    <a href="/posts" class="text-decoration-none d-block mt-3">&laquo Back to posts</a>
            </div>
        </div>
    </div>
@endsection