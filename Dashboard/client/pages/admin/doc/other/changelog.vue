
<template>
<section-container previousUrl="/admin/doc/other/libraries">
    <title-page title="Changelog">
        <div />
    </title-page>

    <div class="section-body">
        1.0: Initial release
    </div>

</section-container>
</template>
<script>
import TitlePage from '@/components/Base/Title/TitlePage'
import BottomBar from '@/components/Module/Doc/BottomBar'
import SectionContainer from '@/components/Module/Doc/SectionContainer'

export default {
  components: {
    TitlePage,
    BottomBar,
    SectionContainer
  },
  layout: 'admin'
}

</script>



