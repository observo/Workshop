
<template>
    <section class="page-section bg-white"
        tyle="min-height: 100vh;">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center ">

                    <div class="img-container">
                        <img src="/img/screen/component/1.png"
                            class="img-fluid shadow-1 img-component " />
                        <img src="/img/screen/component/2.png"
                            class="img-fluid img-special shadow-1 position-absolute img-component" />
                        <img src="/img/screen/component/3.png"
                            class="img-fluid img-special-2 shadow-1 position-absolute img-component" />

                    </div>

                </div>
                <div class="col-lg-6 text-left">
                    <h2 class="text-theme1 mt-0">Components that you can reuse in any business segment.</h2>

                    <p class="text-theme1 mb-4">
                        <strong>Ignity Admin </strong> has everything you need to get your new website up and running in no time!
                        Choose one of our included skins, or edit any component of the package.</p>

                    <h2 class="text-theme1 mt-4">Clean and Beautiful Design </h2>
                    <p class="mb-4">

                        Regardless of the color scheme you define, all components, including graphics, color classes and bootstrap elements, will have their colors adjusted to ensure perfect harmony across the application.

                    </p>
                    <hr class="divider light my-4">

                    <b-btn size="xl"
                        variant="outline-danger"
                        href="/demo2/admin/dashboard/1">Preview Admin</b-btn>
                    </hr>

                </div>
            </div>

        </div>

    </section>
</template>


<style lang="scss" scoped>
.img-container {
  img {
    position: relative;
    transition: transform 0.5s;

    &:hover {
      transform: translate(0px, -5px);
      z-index: 2;
    }

    &.img-special {
      bottom: 0;
      left: 0;
    }

    &.img-special-2 {
      bottom: 0;
      right: 0;
    }
  }
}

.img-component {
  border-radius: 8px;
}

</style>


