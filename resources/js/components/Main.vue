<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">Main page</div>

                    <div class="card-body">
                        <h5 v-if="over18">Welcome Guest!</h5>
                        <h5 v-if="authenticated">Welcome {{ user.name }}!</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex';
export default {
    computed: {
        ...mapState(["user","over18","authenticated"])
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
