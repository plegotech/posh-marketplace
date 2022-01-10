<template>
    <div>
        <h2 style="color:red">Forbidden Access!</h2>
    </div>
</template>

<script>

export default {
    data() {
        return {
            user: this.$store.state.auth.user
        }
    },
    created() {
        if(this.user.user_type == 'admin') {
            this.$router.push({name: "dashboard"});
        }
    }
}

</script>
