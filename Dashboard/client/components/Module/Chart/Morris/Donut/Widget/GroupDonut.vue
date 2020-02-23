
<template>
<b-card no-body>
    <b-card-header>
        <chart-toolbar title=""
            subTitle
            compact
            iconClass="la la-cog text-theme1 my-auto"> </chart-toolbar>

    </b-card-header>
    <b-card-body class="p-2">

        <donut> </donut>
        <div>G. Alpha</div>
        <donut> </donut>
        <div>G. Beta</div>
        <donut> </donut>
        <div>G. Gamma</div>

    </b-card-body>

</b-card>
</template>
<script>
import Donut from '@/components/Module/Chart/Morris/Donut/Donut'
import ChartToolbar from '@/components/Module/Chart/ChartToolbar'

/*
Card for rendenring donut chart on morris library
*/
export default {
  // Testando
  components: {
    Donut,
    ChartToolbar
  }
}

</script>


<style lang="scss" scoped>
.card-body {
  justify-content: center;
  align-items: center;
}

</style>


