<template>
  <div class="container-fluid pending-vend">
    <br>
    <div class="prof-area vendor-pro-b1">
      <div class="row">
        <div class="col-sm-4">
          <div class="user-prof">
            <img src="/img/user_profile.png" alt="">
            <h1>{{ user.first_name }} {{ user.last_name }}</h1>
            <span>{{ user.email }}</span>
          </div>
        </div>
        <div class="col-sm-4">
          <table class="user-desc">
            <tbody>
            <tr>
              <td>Company Name</td>
              <td>{{ company.name }}</td>
            </tr>
            <tr>
              <td>Company Phone</td>
              <td>{{ company.phone }}</td>
            </tr>
            <tr>
              <td>Mobile Number</td>
              <td>{{ user.phone }}</td>
            </tr>
            <tr v-if="user.user_type == 'seller'">
              <td>Website URL</td>
              <td>www.plego.com</td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class=" col-sm-4">
          <button class="edit">
            <img src="/img/edit.png" alt="">EDIT PROFILE
          </button>
        </div>
      </div>
    </div>
    <div class="prof-area vendor-pro-b2">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="mini-head">Company Location</h1>
        </div>

        <div class="col-sm-6">
          <button class="add-new">
            <img src="/img/add.png" alt="">ADD NEW
          </button>
          <button class="edit sm-wd">
            <img src="/img/edit.png" alt="">EDIT
          </button>
        </div>
        <div class="col-sm-6">
          <table class="comp-addr">
            <tbody>
            <tr>
              <td>
                <h2>Address</h2>
                <span>{{ company.address }}</span>
              </td>
              <td>
                <h2>State</h2>
                <span>{{ company.state }}</span>
              </td>
            </tr>
            <tr>
              <td>
                <h2>City</h2>
                <span>{{ company.city }}</span>
              </td>
              <td>
                <h2>Zip Code</h2>
                <span>{{ company.zip_code }}</span>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
export default {
  data() {
    return {
      user: this.$store.state.auth.user,
      company: null
    }
  },
  created() {
    console.log('Component mounted.')
    this.getUserCompanyData();
  },
  methods: {
    getUserCompanyData() {
      document.getElementById('ajaxLoader').style.display = 'block';
      var url = '/api/user-company/' + this.user.id;

      fetch(url)
          .then(res => res.json())
          .then(res => {
            this.company = res;
          })
          .catch(err => console.log(err))
          .finally(function () {
            document.getElementById('ajaxLoader').style.display = 'none';
          });
    }
  }
}
</script>
