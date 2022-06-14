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
                <li>
                    <a href="" class="dropdown-toggle" id="dropdownMenuButton22" data-toggle="dropdown"
                             aria-haspopup="true" aria-expanded="false">
                        <img src="/img/notification-bell.png" class="notify" alt=""><span class="numberof-ma">3</span>
                    </a>
                    <div class="dropdown-menu notificationBx" aria-labelledby="dropdownMenuButton22">
                        <ul class="noti-list-bx">
                            <li v-for="(items, index) in notdata" :key="index">
                                <div><img :src="items.desc.img" style="width:10%;" /> {{ items.title+" ("+items.desc.name+")" }}</div>
                                <div>{{ "Price: "+items.desc.price }}</div>
                                <a href="#"><strong> Product detailed descriptions </strong> <span class="time-boxx"><span class="right-rem-bx">4 hours ago</span></span></a>
                            </li>
                        </ul>
                    </div>
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
    props: ['first_name', 'last_name', 'user_id'],
    data(){
        return {
            notdata:[]
        }
    },
    created(){
        this.getnotdata()
    },
    methods: {
        ...mapActions({
            signOut: "auth/logout"
        }),
        async logout() {
            await axios.post('/logout').then(({data}) => {
                this.signOut()
                axios.defaults.headers.common['X-CSRF-TOKEN'] = data;
                this.$router.push({name: "login-user"})
            })
        },
        async getnotdata() {
            await axios.get('/api/notifications/get/'+this.user_id).then(({data}) => {
                console.log(data)
                this.notdata=data.data;
            })
        }
    }
}
</script>
