<div class="header-end">
  <div class="container">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
              <img src="{{ asset('frontend') }}/assets/images/ultraboost.png" alt="...">
              <div class="carousel-caption car-re-posn">
                  <h3>Ultra-Boost</h3>
                  <h4>ADIDAS ULTRABOOST SHOES MADE IN PART WITH PARLEY OCEAN PLASTIC.</h4>
                  <span class="color-bar"></span>
              </div>
          </div>
          <div class="item">
            <img src="{{ asset('frontend') }}/assets/images/superstar.png" alt="...">
              <div class="carousel-caption car-re-posn">
                  <h3>Superstar</h3>
                  <h4>ICONIC SHELL-TOE SHOES WITH A MONOCHROME LOOK.</h4>
                  <span class="color-bar"></span>
              </div>
          </div>
          <div class="item">
            <img src="{{ asset('frontend') }}/assets/images/stansmith.png" alt="...">
              <div class="carousel-caption car-re-posn">
                  <h3>Stan Smith</h3>
                  <h4>SIGNATURE SHOES INSPIRED MADE IN PART WITH RECYCLED CONTENT.</h4>
                  <span class="color-bar"></span>
              </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left car-icn" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right car-icn" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="clearfix"></div>
  </div>
</div>