<template>
    <div class="container-fluid pending-vend">
        <div class="row mt-4">
            <div class="col-sm-12">
                <div class="top-newOrder myorder mb-4">
                    <div class="row mb-4 up-main-bx">
                        <div class="col-sm-6">
                            <div class="up-main-bx-1">
<h3>About US:</h3>
<br>
                                <div class="form-outline-ft mb-5">
                                    <input type="text" v-model="about_us" class="form-control-label" required>
                                    <label class="form-label">About US</label>
                                    
                                </div>

                                <div>
                                    <button @click="addinfo" class="primary">SAVE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user:this.$store.state.auth.user,
            about_us:'',
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    mounted(){
        this.getHeaderFooter()
    },
    methods: {

        addinfo() {

            document.getElementById('ajaxLoader').style.display = 'block';
            
            var object = this;

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            let data = new FormData();
            data.append('seller_id', this.user.id);
            data.append('about_us', this.about_us);
            
            axios.post('/createaboutus', data, config)
                .then(function (res) {
                    console.log(res);
                    var data = res.data;
                    if (data.success == 'true') {
                        alert('Created successfully.');
                        object.clearForm();
                    } else {
                        object.errors = data.errors;
                    }
                })
                .catch(function (res) {
                    console.log(res);
                })
                .finally(()=>{
                    this.processing = false;
                    document.getElementById('ajaxLoader').style.display = 'none';
                });

        },
        async getHeaderFooter(){
            document.getElementById('ajaxLoader').style.display = 'block';
            let result = axios.get('/getheaderfooter/'+this.user.id);
            const data = (await result).data
            console.log("HeaderFooterData")
            console.log(data)
            this.about_us = data.about_us

            document.getElementById('ajaxLoader').style.display = 'none';
        }
    }
}
</script>
