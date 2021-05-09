<a title="Click to mark as favourite question (Click again to undo)" 
                class="favourite mt-2 {{ Auth::guest() ? 'off' : ($model->is_favourited ? 'favourited' : '') }}" onclick="event.preventDefault(); document.getElementById('favourite-question-{{ $model->id }}').submit()"
                >
    <i class="fas fa-star fa-2x"></i>
    <span class="favourites-count">{{ $model->favourites_count }}</span>
    </a>

    <form id="favourite-question-{{ $model->id }}" action="{{ $model->id }}/favourites" method="POST" style="display: none;">
        @csrf
        @if($model->is_favourited)
            @method('DELETE')
        @endif
    </form>