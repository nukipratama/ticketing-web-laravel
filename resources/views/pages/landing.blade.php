@extends('template/base')

@section('content')
<!--cover section slider -->
<section id="home" class="home-cover">
  <div class="cover_slider owl-carousel owl-theme">
    <div class="cover_item"
      style="background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.7)),url('template/img/IMG_8858.jpg');">
      <div class="slider_content">
        <div class="slider-content-inner">
          <div class="container">
            <div class="slider-content-left">
              <h1 class="h1">
                Telkom University<br>Half Marathon 2020
              </h1>
              <p class="cover-date">
                Bandung, 26 September 2020
              </p>
              <a href="/ticket" class=" btn btn-primary btn-rounded">
                Get Tickets
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="cover_item"
      style="background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.7)),url('template/img/IMG_8879.jpg');">
      <div class="slider_content">
        <div class="slider-content-inner">
          <div class="container">
            <div class="slider-content-center">
              <h1 class="h1">
                The Biggest Run Event<br>by Telkom University
              </h1>
              <p class="cover-date">
                Bandung, 26 September 2020
              </p>
              <a href="/ticket" class=" btn btn-primary btn-rounded">
                Get Tickets
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="cover_item"
      style="background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.7)),url('template/img/IMG_0942.jpg');">
      <div class="slider_content">
        <div class="slider-content-inner">
          <div class="container">
            <div class="slider-content-left">
              <h1 class="h1">
                Telkom University<br>Half Marathon 2020
              </h1>
              <p class="cover-date">
                Bandung, 26 September 2020
              </p>
              <a href="/ticket" class=" btn btn-primary btn-rounded">
                Get Tickets
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="cover_nav">
    <ul class="cover_dots">
      <li class="active" data="0"><span>1</span></li>
      <li data="1"><span>2</span></li>
      <li data="2"><span>3</span></li>
    </ul>
  </div>
</section>
<!--cover section slider end -->

<!--event info -->
<section class="pt100 pb100">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6 col-md-3  ">
        <div class="icon_box_two">
          <i class="ion-ios-calendar-outline"></i>
          <div class="content">
            <h5 class="box_title">
              DATE
            </h5>
            <p>
              26 September 2020
            </p>
          </div>
        </div>
      </div>

      <div class="col-6 col-md-3  ">
        <div class="icon_box_two">
          <i class="ion-ios-location-outline"></i>
          <div class="content">
            <h5 class="box_title">
              location
            </h5>
            <p>
              Bandung, Jawa Barat.
            </p>
          </div>
        </div>
      </div>

      <div class="col-6 col-md-3  ">
        <div class="icon_box_two">
          <i class="ion-ios-home-outline"></i>
          <div class="content">
            <h5 class="box_title">
              Organizer
            </h5>
            <p>
              ORUGA Telkom University
            </p>
          </div>
        </div>
      </div>

      <div class="col-6 col-md-3  ">
        <div class="icon_box_two">
          <i class="ion-ios-pricetag-outline"></i>
          <div class="content">
            <h5 class="box_title">
              Categories
            </h5>
            <p>
              5K, 10K, 21K
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--event info end -->

<!--event countdown -->
<section class="bg-img pt70 pb70 " style="background-image: url('template/img/IMG_9758.jpg');">
  <div class="overlay_dark"></div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10">
        <h4 class="mb30 text-center color-light">Countdown to the Race Day!</h4>
        <div class="countdown"></div>
      </div>
    </div>
  </div>
</section>
<!--event count down end-->

<!--about the event -->
<section class="pt100 pb100">
  <div class="container">
    <div class="section_title">
      <h3 class="title">
        Telkom University Half Marathon 2020
      </h3>
    </div>
    <div class="row justify-content-center">
      <div class="col-6 col-md-6">
        <div class="embed-responsive embed-responsive-16by9">
          <video width="320" height="240" controls>
            <source src="template/img/TUHM19 - AFTERMOVIE.mp4" type="video/mp4">
          </video>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing eli. Integer iaculis in lacus a sollicitudin.
          Ut hendrerit hendrerit nisl a accumsan. Pellentesque convallis consectetur tortor id placerat.
          Curabitur a pulvinar nunc. Maecenas laoreet finibus lectus, at volutpat ligula euismod.
          In rhoncus massa nec sollicitudin. Ut hendrerit hendrerit nisl a accumsan. Pellentesque
          convallis consectetur tortor id placerat. Curabitur a pulvinar nunc. Maecenas laoreet finibus
          lectus, at volutpat ligula euismod quis. Maecenas ornare, ex in malesuada tempus.
        </p>
      </div>

    </div>
  </div>
</section>
<!--about the event end -->

<!--speaker section-->
<section class="pb100">
  <div class="container">
    <div class="section_title mb50">
      <h3 class="title">
        recent photos
      </h3>
    </div>
  </div>
  <div class="row justify-content-center no-gutters">
    <div class="col-md-3 col-sm-6">
      <div class="speaker_box">
        <div class="speaker_img">
          <img src="template/img/IMG_20190915_073009.jpg">
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="speaker_box">
        <div class="speaker_img">
          <img src="template/img/IMG_20190915_071948.jpg">
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="speaker_box">
        <div class="speaker_img">
          <img src="template/img/IMG_20190915_072626.jpg">
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="speaker_box">
        <div class="speaker_img">
          <img src="template/img/IMG_20190915_072549.jpg">
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="speaker_box">
        <div class="speaker_img">
          <img src="template/img/IMG_9969.jpg">
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="speaker_box">
        <div class="speaker_img">
          <img src="template/img/IMG_9882.jpg">
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="speaker_box">
        <div class="speaker_img">
          <img src="template/img/IMG_9942.jpg">
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="speaker_box">
        <div class="speaker_img">
          <img src="template/img/IMG_9962.jpg">
        </div>
      </div>
    </div>



  </div>
</section>
<!--speaker section end -->

<!--Price section-->
<section class="pb100">
  <div class="container">
    <div class="section_title mb50">
      <h3 class="title">
        Ticket Pricing
      </h3>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-4 col-12">
        <div class="price_box active">
          <div class="price_highlight">
            recommended
          </div>
          <div class="price_header">
            <h4>
              Early Bird
            </h4>
            <h6>
              For the fast ones
            </h6>
          </div>
          <div class="price_tag">
            65 <sup>$</sup>
          </div>
          <div class="price_features">
            <ul>
              <li>
                Early Entrance
              </li>
              <li>
                Front seat
              </li>
              <li>
                Complementary Drinks
              </li>
              <li>
                Promo Gift
              </li>
            </ul>
          </div>
          <div class="price_footer">
            <a href="#" class="btn btn-primary btn-rounded">Purchase</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-12">
        <div class="price_box">
          <div class="price_header">
            <h4>
              Start up
            </h4>
            <h6>
              For the begginers
            </h6>
          </div>
          <div class="price_tag">
            85 <sup>$</sup>
          </div>
          <div class="price_features">
            <ul>
              <li>
                Early Entrance
              </li>
              <li>
                Front seat
              </li>
              <li>
                Complementary Drinks
              </li>
              <li>
                Promo Gift
              </li>
            </ul>
          </div>
          <div class="price_footer">
            <a href="#" class="btn btn-primary btn-rounded">Purchase</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-12">
        <div class="price_box">
          <div class="price_header">
            <h4>
              Corporate
            </h4>
            <h6>
              For the business
            </h6>
          </div>
          <div class="price_tag">
            95 <sup>$</sup>
          </div>
          <div class="price_features">
            <ul>
              <li>
                Early Entrance
              </li>
              <li>
                Front seat
              </li>
              <li>
                Complementary Drinks
              </li>
              <li>
                Promo Gift
              </li>
            </ul>
          </div>
          <div class="price_footer">
            <a href="#" class="btn btn-primary btn-rounded">Purchase</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--price section end -->


<!--brands section -->
<section class="bg-gray pt100 pb100">
  <div class="container">
    <div class="section_title mb50">
      <h3 class="title">
        our sponsors
      </h3>
    </div>
    <div class="brand_carousel owl-carousel">
      <div class="brand_item text-center">
        <img src="template/img/brands/b1.png" alt="brand">
      </div>
      <div class="brand_item text-center">
        <img src="template/img/brands/b2.png" alt="brand">
      </div>

      <div class="brand_item text-center">
        <img src="template/img/brands/b3.png" alt="brand">
      </div>
      <div class="brand_item text-center">
        <img src="template/img/brands/b4.png" alt="brand">
      </div>
      <div class="brand_item text-center">
        <img src="template/img/brands/b5.png" alt="brand">
      </div>
    </div>
  </div>
</section>
<!--brands section end-->

<!--get tickets section -->
<section class="bg-img pt100 pb100"
  style="background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.7)), url('template/img/IMG_9785.jpg');">

  <div class="container">
    <div class="section_title mb30">
      <h3 class="title color-light">
        Get your tikets
      </h3>
    </div>
    <div class="row justify-content-center align-items-center">
      <div class="col-md-9 text-md-left text-center color-light">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus massa nec gravida tempus.
        Integer iaculis in aazzzCurabitur a pulvinar nunc. Maecenas laoreet finibus lectus, at volutpat
        ligula euismod.
      </div>
      <div class="col-md-3 text-md-right text-center">
        <a href="/ticket" class="btn btn-primary btn-rounded mt30">buy now</a>
      </div>
    </div>
  </div>
</section>
<!--get tickets section end-->
@endsection