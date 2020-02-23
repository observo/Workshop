
<template>
<div :style="sizeStyle">
    <client-only>
        <morris-donut-chart :id="id"
            class="donut-chart text-theme1"
            :data="data"
            :colors="colors"
            :labelColor="variablesColors.theme1"
            :backgroundColor="backgroundColor"
            :style="sizeStyle"
            :formatter="formatter"
            resize="true">
        </morris-donut-chart>

        <slot> </slot>
    </client-only>
</div>
</template>
<script>
import faker from 'faker'
import themeColors from '@@/client/util/theme/themeColors.js'

/*
Example of component for rendering donut chart on morris library
*/
export default
{
  computed: {
    variablesColors () {
      return themeColors(this.$store.state.theme.skin)
    },
    colors () {
      const color = this.variant
      return [
        this.variablesColors.variantsObj[color].base,
        this.variablesColors.variantsObj[color]['mixed-1'],
        this.variablesColors.variantsObj[color]['mixed'],
        this.variablesColors.theme1inv

      ]
    }
  },
  props: {
    'variant': { default: 'warning' },
    sizeStyle: {
      type: Object,
      default: () => ({
        'height': '90px', 'width': '90px', 'position': 'relative'
      })
    }

  },
  data () {
    const val1 = faker.random.number({ min: 1, max: 50 })
    const val2 = faker.random.number({ min: 1, max: 30 })
    const val3 = 95 - (val1 + val2)

    return {
      id: Math.random() + '',
      labelColor: '#FFF',
      backgroundColor: '#205FE3',
      resize: true,
      data: [{
        label: 'Team A',
        value: val1
      }, {
        label: 'Team B',
        value: val2
      }, {
        label: 'Team C',
        value: val3
      },
      {
        label: 'Team D',
        value: 5
      }],
      formatter: function (y) {
        return y + '%'
      }
    }
  }

}

</script>


<style lang="scss">
.donut-chart {
  height: 100%;
  width: 100%;
  max-width: 100%;
  max-height: inherit;
}

.donut-chart text {
  fill: currentColor;
  font-family: inherit !important;
  font-size: 20px !important;

  tspan {
    font-size: 20px;
    display: none;
  }
}

.donut-chart path {
  stroke-width: 0;
  stroke-linecap: round;
}

</style>


