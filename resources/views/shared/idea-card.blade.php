<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                     src="{{$idea->user->getImageUrl()}}" alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0">
                        <a href="{{route('users.show',$idea->user_id)}}">
                            {{$idea->user_name}}
                        </a>
                    </h5>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <div>
                    <a href="{{route('ideas.show',$idea->id)}}" class="btn btn-info btn-sm">View</a>
                </div>
                <div class="ms-1">
                    <a href="{{route('ideas.edit',$idea->id)}}" class="btn btn-success btn-sm">Edit</a>
                </div>
                <div class="ms-1">
                    <form method="post" action="{{route('ideas.destroy', $idea->id)}}">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if($editing ?? false)
            <form method="post" action="{{route('ideas.update',$idea->id)}}">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="idea" rows="3">
                        {{$idea->content}}
                    </textarea>
                    @error('content')
                        <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
                    @enderror
                </div>
                <div class="">
                    <button class="btn btn-dark mb-2" type="submit"> Share </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{$idea->content}}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6">
                    <span class="fas fa-heart me-1"></span> {{$idea->likes}}
                </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted">
                    <span class="fas fa-clock"> </span>
                    {{$idea->created_at}}
                </span>
            </div>
        </div>
        @include('shared.comments-box')
    </div>
</div>
