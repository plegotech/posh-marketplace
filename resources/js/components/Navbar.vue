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
                            <li><a href="#"><strong>32GB DDR4 Memory, 512GB SSD + 1TB HDD, RGB Backlit Keyboard, Windows 10 Home, Gray </strong> <span class="noti-ful-des">ASUS TUF F15 Gaming Laptop, 15.6" Full HD 144Hz Screen, Intel Core i7-10870H Processor, NVIDIA GeForce GTX 1660 Ti</span> <span class="time-boxx"><span class="right-rem-bx">4 hours ago</span></span></a></li>
                            <li><a href="#"><strong>ASUS TUF F15 Gaming Laptop, 15.6" Full HD 144Hz Screen, Intel Core i7-10870H Processor,</strong> <span class="noti-ful-des">32GB DDR4 Memory, 512GB SSD + 1TB HDD, RGB Backlit Keyboard, Windows 10 Home, Gray</span> <span class="time-boxx"><span class="right-rem-bx">4 hours ago</span></span></a></li>
                            <li><a href="#"><strong>Bilal Khan</strong> <span class="noti-ful-des">ASUS TUF F15 Gaming Laptop, 15.6" Full HD 144Hz Screen, Intel Core i7-10870H Processor</span> <span class="time-boxx"><span class="right-rem-bx">4 hours ago</span></span></a></li>
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
    props: ['first_name', 'last_name'],
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
        }
    }
}
</script>
