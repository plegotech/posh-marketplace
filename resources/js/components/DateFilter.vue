<template>
    <div class="float-right row">
        <div class="col mb-4">
            <select v-model="year" @change="$emit('update:year', year);$emit('fetch');"
                    class="mt-0 select-custom-point">
                <option value="" selected>Choose Year</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
                <option value="2018">2018</option>
                <option value="2017">2017</option>
            </select>
        </div>
        <div class="col mb-4">
            <select v-model="month" @change="$emit('update:month', month);$emit('fetch');"
                    class="mt-0 select-custom-point">
                <option value="" selected>Choose Month</option>
                <option value="01">Janruary</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
        </div>
    </div>
</template>

<script>
    export default {
        name: "DateFilter",
        props: {
            year: String,
            month: String
        }
    }
</script>
