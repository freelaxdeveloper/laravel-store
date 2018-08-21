<template>
    <div class="inline">
        <b-dropdown id="ddown1" text="Test text" class="m-md-2">
            <b-dropdown-item @click="openSubscribe">First Action</b-dropdown-item>
            <b-dropdown-item>Second Action</b-dropdown-item>
            <b-dropdown-item>Third Action</b-dropdown-item>
            <b-dropdown-divider></b-dropdown-divider>
            <b-dropdown-item>Something else here...</b-dropdown-item>
            <b-dropdown-item @click="logout">Sign out</b-dropdown-item>
        </b-dropdown>
    </div>

</template>

<script>
    export default {
        props: [],
        mounted(){
          console.log('mounted App.vue');
        },
        methods: {
            openSubscribe() {
                console.log('openSubscribe');
            },
            logout() {
              console.log('logout');
            }
        }
    }
</script>