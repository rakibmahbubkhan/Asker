<template>
    <div>
        
        <a v-if="canAccept" title="Mark this answer as best answer" :class="classes" @click.prevent="create"> 
        <i class="fas fa-check fa-2x"></i>
        <!-- <span class="favourites-count">123</span> -->
        </a>
        
            
        <a v-if="accepted" title="The question owner accepted this answer as best answer" :class="classes"> 
        <i class="fas fa-check fa-2x"></i>
        <!-- <span class="favourites-count">123</span> -->
        </a>
            

    </div>
</template>

<script>
export default {
    props: ['answer'],

    data() {
        return {
            isBest: this.answer.is_best,
            id: this.answer.id
        }
    },

    methods: {
        create() {
            axios.post(`../answers/${this.id}/accept`)
            .then(res => {
                this.$toast.success(res.data.message, "Success", {
                    timeout: 3000,
                    position: 'bottomLeft'
                });
                this.isBest = true;
            })
        }
    },

    computed: {
        canAccept () {
            return this.authorize('accept', this.answer);
        },

        accepted () {
            return !this.canAccept && this.answer.is_best;
        },

        classes() {
            return [
                'mt-2',
                this.accepted ? 'vote-accepted' : ''
            ]
        }
    }
}
</script>
