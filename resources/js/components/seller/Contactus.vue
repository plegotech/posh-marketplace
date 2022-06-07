<template>
    <div class="container-fluid pending-vend comp-seller-myorders">
        <div class="row" style="margin-top:20px">
            <div class="col-sm-12">
                <div>
                    <!-- START: FIRST TAB CONTENT -->
                    <div id="first-pvs-posh" class="top-newOrder">
                        <div class="row  mb-4">
                            <div class="col-sm-8">
                                <div class="search-box">
                                    <img src="/img/search-icon.png" class="search-icon" alt="">
                                    <input style="float:left" type="text" class="search_BX"
                                           v-on:keypress=""
                                           data-type="pending">
                                    <img src="/img/close-srch.png" class="close-icon"
                                         alt="">
                                </div>
                            </div>

                            <!--<DateFilter :year.sync="year" :month.sync="month" @fetch="fetch()"></DateFilter>-->
                        </div>
                        <hr>
                        <!-- start: TABLE -->
                        <table class="table recent-Orders-table mobile-btn-show" id="pvs-tab">
                            <thead>
                                <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Contact Date</th>
                                <th>Purpose</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Message</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="row in data">
                                <td>
                                    <span>{{ row.id }}</span>
                                </td>
                                <td>
                                    <span>{{ row.name }} </span>
                                </td>
                                <td>
                                    <span>{{ row.new_date }}</span>
                                </td>
                                <td>
                                    <span>{{ row.purpose }}</span>
                                </td>
                                <td>
                                    <span>{{ row.phone }}</span>
                                </td>
                                <td>
                                    <span>{{ row.email }}</span>
                                </td>
                                <td>
                                    <span>{{ row.message }}</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- END: TABLE   -->
                    </div>
                    <!-- END::: FIRST TAB CONTENT -->
                </div>
            </div>


        </div>
    </div>
</template>

<script>
import DateFilter from '../DateFilter'

export default {
    components: {
        DateFilter
    },
    data() {
        return {
            user: this.$store.state.auth.user,
            data: [],
        }
    },
    created() {
        this.fetch();
    },
    methods: {
        fetch() {
            document.getElementById('ajaxLoader').style.display = 'block';
            var url = '/api/get-contact-us/' + this.user.id;

            fetch(url)
                .then(res => res.json())
                .then(res => {
                    this.data = res.data;
                })
                .catch(err => console.log(err))
                .finally(function () {
                    document.getElementById('ajaxLoader').style.display = 'none';
                });
        },

    }
}
</script>
