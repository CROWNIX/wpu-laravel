@extends("dashboard.layouts.main")

@section("container")
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create new posts</h1>
    </div>

    <div class="col-lg-8 pb-3">
        <form action="/dashboard/posts" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error("title") is-invalid @enderror" id="title" name="title" required value="{{ old("title") }}">
                @error("title")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error("slug") is-invalid @enderror" id="slug" name="slug" required value="{{ old("slug") }}">
                @error("slug")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category_id" id="category" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old("category_id") == $category->id ? "selected" : "" }}>{{ $category->name }}</option>          
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                <img src="" class="img-preview img-fluid mb-2 col-sm-5 d-block">
                <input type="file" name="image" id="image" class="form-control @error("image") is-invalid @enderror" onchange="previewImage()">
                @error("image")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error("body")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="hidden" id="body" name="body" value="{{ old("body") }}">
                <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Create post</button>
        </form>
    </div>

    <script>
        // Create Slug
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");

        title.addEventListener("change", () => {
            fetch("/dashboard/posts/checkSlug?title=" + title.value)
                .then(res => res.json())
                .then(result => slug.value = result.slug);
        })

        document.addEventListener("trix-file-accept", (e) => {
            e.preventDefault();
        })

        // Preview Image 
        function previewImage(){
            // const image = document.querySelector("#image");
            const imgPreview = document.querySelector(".img-preview");
            // const oFReader = new FileReader();
            
            // oFReader.readAsDataURL(image.files[0]);

            // oFReader.onload = function(oFREvent){
            //     imgPreview.src = oFREvent.target.result;
            //     imgPreview.style.display = "block"
            // }
            
            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
            
        }

    </script>
@endsection