<template>
  <!-- Latest Blog Post -->
  <section id="blog" class="overview-block-ptb grey-bg iq-blog blog-section">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="heading-title">
            <h3 class="title iq-tw-7">
              Latest Blog Post
            </h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div
            class="owl-carousel"
            data-autoplay="true"
            data-loop="true"
            data-nav="false"
            data-dots="true"
            data-items="3"
            data-items-laptop="3"
            data-items-tab="2"
            data-items-mobile="1"
            data-items-mobile-sm="1"
            data-margin="30"
          >
            <!--<div class="item">
              <CardStyle1>
                <div slot="cardMedia">
                  <div class="media-wrapper">
                    <video id="player1" style="width:100%;height:100%;" :poster="require('../../assets/video/01.jpg')" controls preload="none">
                      <source type="video/m4v" :src="require('../../assets/video/01.m4v')">
                      <source type="video/webm" :src="require('../../assets/video/01.webm')">
                      <source type="video/ogg" :src="require('../../assets/video/01.ogv')">
                    </video>
                  </div>
                </div>
                <div slot="cardTitle">
                  <a href="javascript:void(0)">
                    <h5 class="iq-tw-7 iq-mb-10">Blogpost With HTML Video</h5>
                  </a>
                </div>
                <div slot="cardBody">
                  <p>Quae laboriosam sunt consectetur, assumenda provident lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div slot="cardFooter">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="javascript:void(0)"><i class="fa fa-user-circle" aria-hidden="true" /> Tom Herry</a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void(0)"><i class="fa fa-calendar" aria-hidden="true" /> 12 Aug 2017</a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void(0)"><i class="fa fa-comment" aria-hidden="true" /> 5</a>
                    </li>
                  </ul>
                </div>
              </CardStyle1>
            </div>-->
            <div class="item">
              <CardStyle1>
                <div slot="cardMedia">
                  <img class="img-fluid center-block" :src="require('../../assets/images/blog/01.jpg')" alt="#">
                </div>
                <div slot="cardTitle">
                  <a href="javascript:void(0)">
                    <h5 class="iq-tw-7 iq-mb-10">Blogpost With Image</h5>
                  </a>
                </div>
                <div slot="cardBody">
                  <p>Quae laboriosam sunt consectetur, assumenda provident lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div slot="cardFooter">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="javascript:void(0)"><i class="fa fa-user-circle" aria-hidden="true" /> Tom Herry</a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void(0)"><i class="fa fa-calendar" aria-hidden="true" /> 12 Aug 2017</a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void(0)"><i class="fa fa-comment" aria-hidden="true" /> 5</a>
                    </li>
                  </ul>
                </div>
              </CardStyle1>
            </div>
            <div class="item">
              <CardStyle1>
                <div slot="cardMedia">
                  <div class="iq-bolg-video">
                    <iframe src="https://player.vimeo.com/video/176916362" />
                  </div>
                </div>
                <div slot="cardTitle">
                  <a href="javascript:void(0)">
                    <h5 class="iq-tw-7 iq-mb-10">Blogpost With Vimeo</h5>
                  </a>
                </div>
                <div slot="cardBody">
                  <p>Quae laboriosam sunt consectetur, assumenda provident lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div slot="cardFooter">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="javascript:void(0)"><i class="fa fa-user-circle" aria-hidden="true" /> Tom Herry</a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void(0)"><i class="fa fa-calendar" aria-hidden="true" /> 12 Aug 2017</a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void(0)"><i class="fa fa-comment" aria-hidden="true" /> 5</a>
                    </li>
                  </ul>
                </div>
              </CardStyle1>
            </div>
            <div class="item">
              <CardStyle1>
                <div slot="cardMedia">
                  <div class="iq-bolg-video">
                    <iframe src="https://www.youtube.com/embed/nrJtHemSPW4?rel=0" allowfullscreen />
                  </div>
                </div>
                <div slot="cardTitle">
                  <a href="javascript:void(0)">
                    <h5 class="iq-tw-7 iq-mb-10">Blogpost With Youtube</h5>
                  </a>
                </div>
                <div slot="cardBody">
                  <p>Quae laboriosam sunt consectetur, assumenda provident lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div slot="cardFooter">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="javascript:void(0)"><i class="fa fa-user-circle" aria-hidden="true" /> Tom Herry</a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void(0)"><i class="fa fa-calendar" aria-hidden="true" /> 12 Aug 2017</a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void(0)"><i class="fa fa-comment" aria-hidden="true" /> 5</a>
                    </li>
                  </ul>
                </div>
              </CardStyle1>
            </div>
            <div class="item">
              <CardStyle1>
                <div slot="cardMedia">
                  <img class="img-fluid center-block" :src="require('../../assets/images/blog/03.jpg')" alt="#">
                  <div id="player2-container" class="players">
                    <div class="media-wrapper">
                      <audio id="player2" preload="none" controls>
                        <source src="http://www.largesound.com/ashborytour/sound/AshboryBYU.mp3" type="audio/mp3">
                      </audio>
                    </div>
                  </div>
                </div>
                <div slot="cardTitle">
                  <a href="javascript:void(0)">
                    <h5 class="iq-tw-7 iq-mb-10">Blogpost With Audio</h5>
                  </a>
                </div>
                <div slot="cardBody">
                  <p>Quae laboriosam sunt consectetur, assumenda provident lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div slot="cardFooter">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="javascript:void(0)"><i class="fa fa-user-circle" aria-hidden="true" /> Tom Herry</a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void(0)"><i class="fa fa-calendar" aria-hidden="true" /> 12 Aug 2017</a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void(0)"><i class="fa fa-comment" aria-hidden="true" /> 5</a>
                    </li>
                  </ul>
                </div>
              </CardStyle1>
            </div>
            <div class="item">
              <CardStyle1>
                <div slot="cardMedia">
                  <img class="img-fluid center-block" :src="require('../../assets/images/blog/02.jpg')" alt="#">
                </div>
                <div slot="cardTitle">
                  <a href="javascript:void(0)">
                    <h5 class="iq-tw-7 iq-mb-10">Blogpost With Image</h5>
                  </a>
                </div>
                <div slot="cardBody">
                  <p>Quae laboriosam sunt consectetur, assumenda provident lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <div slot="cardFooter">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="javascript:void(0)"><i class="fa fa-user-circle" aria-hidden="true" /> Tom Herry</a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void(0)"><i class="fa fa-calendar" aria-hidden="true" /> 12 Aug 2017</a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void(0)"><i class="fa fa-comment" aria-hidden="true" /> 5</a>
                    </li>
                  </ul>
                </div>
              </CardStyle1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Latest Blog Post END -->
</template>

<script>
export default {
  name: 'Blog'
}
</script>
