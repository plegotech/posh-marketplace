<template>
    <nav class="navbar navbar-expand-lg navbar-dark">
        
        <div class="" id="navbarTogglerDemo01">
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarTogglerSidebar"
                aria-controls="navbarTogglerSidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <a class="navbar-brand" href="#">Dashboard</a>
            <ul class="topnav-user">
                <li><a href=""><img src="/img/mail-icon.png" alt="" class="notify"><span class="numberof-ma">3</span></a></li>
                <li>
                    <a href="">
                        <img src="/img/notification-bell.png" class="notify" alt="">
                    </a>
                </li>
                <li>
                    <img src="/img/profile.png" class="profile" alt="">

                    <div class="dropdown foruser-pmarket">
                        <div class="userlogined dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                             aria-haspopup="true" aria-expanded="false">
                            {{first_name }} {{ last_name }}
                        </div>
                        <div class="dropdown-menu dropdown-menu dropdown-menu-right"
                             aria-labelledby="dropdownMenuButton">
                            <a href="javascript:void(0)" @click="logout" class="dropdown-item">
                                Logout
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
import {mapActions} from 'vuex'
export default {
    props: ['first_name', 'last_name'],
    methods: {
        ...mapActions({
            signOut: "auth/logout"
        }),
        async logout() {
            await axios.post('/logout').then(({data}) => {
                this.signOut()
                axios.defaults.headers.common['X-CSRF-TOKEN'] = data;
                this.$router.push({name: "login"})
            })
        }
    }
}
</script>
