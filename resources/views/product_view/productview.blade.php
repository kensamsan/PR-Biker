@extends('template.master')


@section('content')
<link rel="stylesheet" href="/css/store/productpreview.css">
<link rel="stylesheet" href="/css/store/checkout.css">
<link rel="stylesheet" href="/css/store/main.css">
<link rel="stylesheet" href="/css/store/normalize.css">
<link rel="stylesheet" href="/css/store/sidebar.css">


<style>
  .btn span.icon a{
    background:tomato;
    text-decoration: none;
    padding-top: 5pt;
    color: #fff;
    float: left;
    width: 100%;
    height: 40px;
  }

  textarea {
  width: 92%;
  height: 100px;
  margin-left: 15px;
  padding: 10px 20px;
  box-sizing: border-box;
  border: 2px solid rgb(197, 197, 197);
  border-radius: 4px;
  background-color: #ffffff;
  font-size: 16px;
  resize: none;
}
.column {
    float: left;
    width: 50%;
    }

    .row:after {
    content: "";
    display: table;
    clear: both;
    }

    
html, body {
    font-family: 'Red Hat Display';
}

#usericon {
    width: 50px;
    clip-path: circle();
}

label, p {
    line-height: 80%;
}

#prodname {
    font-weight: 900;
}

.uname {
    display: flex;
}

#bigcard {
    border-radius: 30px;
    background-color: white;
}

.indivcard {
    border-radius: 15px;
}

.indivcard:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
}

.buttondetails {
    background-color: #EA5656;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
}

.buttondetails:hover {
    background-color: #c74343;
    cursor: pointer;
}

#viewmore {
    border: 1px solid gray;
    border-radius: 5px;
}

#viewmore:hover {
    background-color: rgb(204, 204, 204);
}
</style>
<!--White navbar-->
@include('template.search')



<section class="content" style="padding-top: 22vh; padding-bottom: 5vh;">
    <div class="main-carousel">
      <div class="cell"><img src="Images/sample1.svg" alt=""></div>
      <div class="cell"><img src="Images/sample2.svg" alt=""></div>
      <div class="cell"><img src="Images/sample3.svg" alt=""></div>
      <div class="cell"><img src="Images/sample4.svg" alt=""></div>
      <div class="cell"><img src="Images/sample5.svg" alt=""></div>
      <div class="cell"><img src="Images/sample6.svg" alt=""></div>
      <div class="cell"><img src="Images/sample7.svg" alt=""></div>
    </div>
  </section>


  <div class="container-fluid pb-5">
  <div class="section2 pb-5">
    <div class="content">
      <div class="left">
        <h1 class="pt-1">Raleigh Redux 2</h1>
        <h2>PHP 12,000</h2>
        <caption><img src="Images/Icon material-date-range.png" style="margin-right: 8pt;">2015</caption>
        <caption><img src="Images/Icon material-location-on.png" style="margin-right: 8pt; margin-left: 5pt;">Manila City</caption>
        
        <hr class="pt-1"style="" />
        <h1 class="pt-1" style="font-weight: 900;">Description</h1>
        <caption>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut<br>
          labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco<br>
           laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in<br>
           reprehenderit in voluptate velit </caption>
      </div>
      <div class="btn btn_red"><span class="icon"></span><a href="#" style="font-weight: 800; color: tomato; margin-left: -10pt;">Read More</a></div>
    </div>

    <div class="right">
      <div class="card" style="margin-right: 0vh; margin-top: -42pt; border-radius: 8pt;" >
        <div class="row">
          <div class="col-3 p-3">
            <img class="pl-3 pr-1" src="Images/1155017.png" alt="">
          </div>
    
          <div class="col-9 p-3 pl-2" style="margin-right: -10pt;">
            <div class="d-flex pl-1"><h1 style="font-size: 13pt; font-weight: 800;">SELLER NAME</h1>
            <div>@seller_name</div>
            </div>
            <div class="d-flex">
              <div class="p-1">5.0</div>
              <div class="p-1"><img src="Images/Group 87.png" alt=""></div>
              <div class="p-1">(20 Reviews)</div>
            </div>
          </div>
        </div>
        <div class="btn"><span class="icon pt-3"><a href="#"><img src="Images/Icon material-chat-bubble.png" style="width: 15pt; margin-right: 10pt;" alt="">Chat</a></span>
        </div>
        <form>
          <textarea placeholder="Write a costume messege..."></textarea>
        </form>
        <div class="btn"><span class="icon pt-3"><a href="#" style="border-radius: 15pt;">Hi, is the product still available?</a></span>
        </div>
        <div class="btn"><span class="icon pt-3"><a href="#" style="border-radius: 15pt;">Is the price negotiable?</a></span>
        </div>
        <div class="btn"><span class="icon pt-3"><a href="#" style="border-radius: 15pt;">Can I see more photos?</a></span>
        </div>
        <div class="p-3" style="margin-left: 11vh;"><strong>••• ••• 254</strong><img src="Images/Icon feather-phone.png" style="margin-left: 1vh;" alt=""> <strong style="color: tomato;">Show Number</strong></div>
      </div>
    </div>
  </div>
</div>


<div class="container-fluid pt-5 pb-2">
  <h1 style="font-weight: 800;">Meet The Seller</h1>
  <hr  style="width:50%; height: 3pt; margin-top: -4vh;",size="3", color=tomato>
</div>






  <div class="container-fluid row p-3" >

    <div class="col-md-10">
      <div class="row mx-auto" style="">
        <div class="" style="">
            <!-- YUNG USER ICON -->
            <img src="Images/1155017.png" class="" style="display:block; width: 15vh;">
        </div>
        <div class="col-8 " style="margin-left: -1rem;">
            <div class="col-md-5" style="font-size: 2rem; font-weight: 800;"><strong>SELLER NAME</strong></div>
            <div class="col-md-5">@seller_name</div>
            <div class="col-md-5" style="">
                <!-- YUNG IMAGE NA STARS -->
               <img src="Images/Icon material-timelapse.png" style="width: 5%;"> Joined 4 years ago
                 <!-- <img src="bigblue.svg" class="circle bigblue" style="width: 2%;">
                <img src="bigblue.svg" class="circle bigblue" style="width: 2%;">
                <img src="bigblue.svg" class="circle bigblue" style="width: 2%;">
                <img src="bigblue.svg" class="circle bigblue" style="width: 2%;"> -->
            </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-4" style="margin-left: -42rem;">
      <div class="pt-2 pb-4" style="font-weight: 800; font-size: 20pt;"><strong>Reviews for @seller_name</strong></div>
      <i class="icon p-2"><img src="Images/BG1.png" style="width: 15%;" alt=""></i>
      <span class="count-name" style="font-weight: 800;"><strong>SELLER NAME</strong></span>
      <i class="icon py-5"><img src="Images/Group 87.png" style="width: 5rem;" alt=""></i>
      <div class="container pb-5" style="width: 180%;"><caption>Lorem ipsum dolor sit amet, consecteturt ut labore et dolore magna aliqua.
         Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
          ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
      </caption></div>

      <i class="icon p-2"><img src="Images/1155017.png" style="width: 15%;" alt=""></i>
      <span class="count-name" style="font-weight: 800;"><strong>SELLER NAME</strong></span>
      <i class="icon py-5"><img src="Images/Group 87.png" style="width: 5rem;" alt=""></i>
      <div class="container pb-5" style="width: 180%;"><caption>Lorem ipsum dolor sit amet, consecteturt ut labore et dolore magna aliqua.
         Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
          ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
      </caption></div>

      <i class="icon p-2"><img src="Images/BG1.png" style="width: 15%;" alt=""></i>
      <span class="count-name" style="font-weight: 800;"><strong>SELLER NAME</strong></span>
      <i class="icon py-5"><img src="Images/Group 87.png" style="width: 5rem;" alt=""></i>
      <div class="container pb-4" style="width: 180%;"><caption>Lorem ipsum dolor sit amet, consecteturt ut labore et dolore magna aliqua.
         Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
          ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
      </caption></div>
      <div class="btn btn_red"><span class="icon"></span><a href="#" style="font-weight: 800; color: tomato; margin-left: -10pt;">Read All Reviews</a></div>

  </div>
  <div class="container-fluid pt-5 pb-2">
    <h1 style="font-weight: 800;">Similar listing</h1>
    <hr  style="width:50%; height: 3pt; margin-top: -4vh;",size="3", color=tomato>
  </div>
  </div>

  <section class="content p-3 mx-auto">
    <div class="container-fluid bg-light shadow-lg mx-2 my-4 mx-auto" id="bigcard" style="position: relative;">
      <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        
        
        <div class="col-lg-3 col-sm-12 p-3">
          <div class="card card-course shadow indivcard">
            <div class="card-body">
              <label class="uname">
                <div><img src="Images/1155017.png" alt="user photo" id="usericon"></div>
                <div class="mt-3 ml-2">username1 <p style="font-style: italic;">30 mins ago</p>
                </div>
              </label>

              <img src="Images/sample5.svg" class="card-img-top" alt="bike">
              <label class="mt-3" id="prodname">Product Name</label>
              <p class="card-text">PRICE</p>
            </div>

            <div class="card buttondetails">
              <button class="mx-auto btn col-lg-6" style="color: white; font-style:italic">
                Other Details
              </button>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12 p-3">
          <div class="card card-course shadow indivcard">
            <div class="card-body">
              <label class="uname">
                <div><img src="Images/1155017.png" alt="user photo" id="usericon"></div>
                <div class="mt-3 ml-2">username1 <p style="font-style: italic;">30 mins ago</p>
                </div>
              </label>

              <img src="Images/sample6.svg" class="card-img-top" alt="bike">
              <label class="mt-3" id="prodname">Product Name</label>
              <p class="card-text">PRICE</p>
            </div>

            <div class="card buttondetails">
              <button class="mx-auto btn col-lg-6" style="color: white; font-style:italic">
                Other Details
              </button>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12 p-3">
          <div class="card card-course shadow indivcard">
            <div class="card-body">
              <label class="uname">
                <div><img src="Images/1155017.png" alt="user photo" id="usericon"></div>
                <div class="mt-3 ml-2">username1 <p style="font-style: italic;">30 mins ago</p>
                </div>
              </label>

              <img src="Images/sample7.svg" class="card-img-top" alt="bike">
              <label class="mt-3" id="prodname">Product Name</label>
              <p class="card-text">PRICE</p>
            </div>

            <div class="card buttondetails">
              <button class="mx-auto btn col-lg-6" style="color: white; font-style:italic">
                Other Details
              </button>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12 p-3">
          <div class="card card-course shadow indivcard">
            <div class="card-body">
              <label class="uname">
                <div><img src="Images/1155017.png" alt="user photo" id="usericon"></div>
                <div class="mt-3 ml-2">username1 <p style="font-style: italic;">30 mins ago</p>
                </div>
              </label>

              <img src="Images/sample8.svg" class="card-img-top" alt="bike">
              <label class="mt-3" id="prodname">Product Name</label>
              <p class="card-text">PRICE</p>
            </div>

            <div class="card buttondetails">
              <button class="mx-auto btn col-lg-6" style="color: white; font-style:italic">
                Other Details
              </button>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12 p-3">
          <div class="card card-course shadow indivcard">
            <div class="card-body">
              <label class="uname">
                <div><img src="Images/1155017.png" alt="user photo" id="usericon"></div>
                <div class="mt-3 ml-2">username1 <p style="font-style: italic;">30 mins ago</p>
                </div>
              </label>

              <img src="Images/sample9.svg" class="card-img-top" alt="bike">
              <label class="mt-3" id="prodname">Product Name</label>
              <p class="card-text">PRICE</p>
            </div>

            <div class="card buttondetails">
              <button class="mx-auto btn col-lg-6" style="color: white; font-style:italic">
                Other Details
              </button>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12 p-3">
          <div class="card card-course shadow indivcard">
            <div class="card-body">
              <label class="uname">
                <div><img src="Images/1155017.png" alt="user photo" id="usericon"></div>
                <div class="mt-3 ml-2">username1 <p style="font-style: italic;">30 mins ago</p>
                </div>
              </label>

              <img src="Images/sample10.svg" class="card-img-top" alt="bike">
              <label class="mt-3" id="prodname">Product Name</label>
              <p class="card-text">PRICE</p>
            </div>

            <div class="card buttondetails">
              <button class="mx-auto btn col-lg-6" style="color: white; font-style:italic">
                Other Details
              </button>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12 p-3">
          <div class="card card-course shadow indivcard">
            <div class="card-body">
              <label class="uname">
                <div><img src="Images/1155017.png" alt="user photo" id="usericon"></div>
                <div class="mt-3 ml-2">username1 <p style="font-style: italic;">30 mins ago</p>
                </div>
              </label>

              <img src="Images/sample11.svg" class="card-img-top" alt="bike">
              <label class="mt-3" id="prodname">Product Name</label>
              <p class="card-text">PRICE</p>
            </div>

            <div class="card buttondetails">
              <button class="mx-auto btn col-lg-6" style="color: white; font-style:italic">
                Other Details
              </button>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12 p-3">
          <div class="card card-course shadow indivcard">
            <div class="card-body">
              <label class="uname">
                <div><img src="Images/1155017.png" alt="user photo" id="usericon"></div>
                <div class="mt-3 ml-2">username1 <p style="font-style: italic;">30 mins ago</p>
                </div>
              </label>

              <img src="Images/sample12.svg" class="card-img-top" alt="bike">
              <label class="mt-3" id="prodname">Product Name</label>
              <p class="card-text">PRICE</p>
            </div>

            <div class="card buttondetails">
              <button class="mx-auto btn col-lg-6" style="color: white; font-style:italic">
                Other Details
              </button>
            </div>
          </div>
        </div>
        <div class="col-lg-12 text-center py-3">
          <button class="mx-auto btn col-lg-2 mb-2" id="viewmore">View More</button>
        </div>
      </div>
    </div>
  </section>
   
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  <script>
    $('.main-carousel').flickity({
  // options
  cellAlign: 'left',
  wrapAround: true,
  freeScroll: true
});
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/f67ab1f0a2.js" crossorigin="anonymous"></script>

  @endsection
