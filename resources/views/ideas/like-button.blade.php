@php use Illuminate\Support\Facades\Auth; @endphp
<div>
    @if(Auth::user()->hasLikedIdea($idea))
        <form action="{{route('ideas.unlike',$idea->id)}}" method="post">
            @csrf
            @method('PUT')
            <button class="fw-light nav-link fs-6">
                <span class="fas fa-heart me-1"></span> {{$idea->likes->count()}}
            </button>
        </form>
    @else
        <form action="{{route('ideas.like',$idea->id)}}" method="post">
            @csrf
            @method('PUT')
            <button class="fw-light nav-link fs-6">
                <span class="far fa-heart me-1"></span> {{$idea->likes->count()}}
            </button>
        </form>
    @endif
</div>
