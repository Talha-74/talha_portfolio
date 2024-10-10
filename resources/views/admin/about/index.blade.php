@extends('admin.layouts.layout')
@section('content')

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ url()->previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>About Section</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">About</a></div>
            <div class="breadcrumb-item">Update</div>
        </div>
    </div>

    <div class="section-body">
        {{-- <h2 class="section-title">Create New Post</h2>
        <p class="section-lead">
            On this page you can create a new post and fill in all fields.
        </p> --}}

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update About Section</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.about.update', 1) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="image" value="{{ old($about->image ?? '') }}"
                                            id="image-upload" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title" value="{{ $about->title ?? '' }}"
                                        class="form-control" value="">
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote" name="description"
                                        id="summernote">{{ $about->description ?? '' }}</textarea>
                                </div>
                            </div>

                            {{--displaying resume in iframe (readable format) --}}
                            {{-- @if($about->resume ?? '')
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Previous
                                    Image/PDF</label>
                                <div class="col-sm-12 col-md-7">
                                    @if (in_array(pathinfo($about->resume ?? '', PATHINFO_EXTENSION), ['jpg', 'jpeg',
                                    'png',
                                    'gif']))
                                    <img style="max-width: 330px; height: auto;" src="{{ asset($about->resume) }}"
                                        alt="">
                                    @elseif (pathinfo($about->resume ?? '', PATHINFO_EXTENSION) === 'pdf')
                                    <iframe src="{{ asset($about->resume) }}" style="width:100%; height:500px;"
                                        frameborder="0"></iframe>
                                    @else
                                    <p>Unsupported file type.</p>
                                    @endif
                                </div>
                            </div>
                            @endif --}}

                            {{-- displaying resume in icon --}}
                            @if($about->resume)
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Resume</label>
                                <div class="col-sm-12 col-md-7">
                                    <div>
                                        <a href="{{ asset($about->resume) }}" target="_blank">
                                            <i class="fas fa-file-pdf" style="font-size: 80px; color: red;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" name="resume" value="{{ $about->resume ?? '' }}"
                                        class="form-control" value="">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Initialize Summernote after content is loaded -->
<script>
    $(document).ready(function() {
            $('#summernote').summernote({
                height: 120,
                placeholder: 'Write here...',
                tabsize: 2,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
</script>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#image-preview').css({
            'background-image': 'url("{{ asset($about->image) }}")',
         'background-size': 'cover',
         'background-position': 'center center',

        })
    });
</script>
@endpush