<answer :answer="{{ $answer }}" inline-template>
    <div class="media post">

        @include('shared._vote', ['model' => $answer])

        <!-- <div class="d-flex flex-column vote-controls">
        
                <a title="This answer is useful" 
                            class="vote-up {{ Auth::guest() ? 'off' : '' }}"
                            onclick="event.preventDefault(); document.getElementById('up-vote-answer-{{ $answer->id }}').submit();"
                            >
                            <i class="fas fa-caret-up fa-3x"></i>
                </a>
                <form id="up-vote-answer-{{ $answer->id }}" action="../answers/{{ $answer->id }}/vote" method="POST" style="display:none;">
                    @csrf
                    <input type="hidden" name="vote" value="1">
                </form>

                <span class="votes-count">{{ $answer->votes_count }}</span>

                <a title="This answer is not useful" 
                    class="vote-down {{ Auth::guest() ? 'off' : '' }}"
                    onclick="event.preventDefault(); document.getElementById('down-vote-answer-{{ $answer->id }}').submit();"
                    >
                    <i class="fas fa-caret-down fa-3x"></i>
                </a>
                <form id="down-vote-answer-{{ $answer->id }}" action="../answers/{{ $answer->id }}/vote" method="POST" style="display:none;">
                    @csrf
                    <input type="hidden" name="vote" value="-1">
                </form>
        </div> -->
        
        <div class="media-body">
            <form v-if="editing" @submit.prevent="update">
                <div class="form-group">
                <textarea rows="10" v-model="body" class="form-control" required></textarea>
                </div>
                <button class="btn btn-primary" :disabled="isInvalid">Update</button>
                <button class="btn btn-outline-secondary" type="button" @click="cancel">Cancel</button>

            </form>
            <div v-else>
            <div v-html="bodyHtml"></div>
                <!-- {!! $answer->body_html !!} -->
                <div class="row">
                    <div class="col-4">
                            <div class="ml-auto">
                            @can('update', $answer)
                            <!-- href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}" -->
                                <a @click.prevent="edit" class="btn btn-sm btn-outline-info">Edit</a>
                            @endcan
                            @can('delete', $answer)
                                <form class="form-delete" action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endcan
                            </div>
                    </div>
                    <div class="col-4"></div>

                    <div class="col-4">
                        <user-info :model="{{ $answer }}" label="Answered"></user-info>
                    </div>

                </div>
            </div>
        </div>
    </div>
</answer>