@extends('layouts.app')
@section('content')
<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
            <div class="container">
              <div class="carousel-caption d-none d-md-block text-left">
                <h1>Example headline.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
            <div class="container">
              <div class="carousel-caption d-none d-md-block">
                <h1>Another example headline.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
            <div class="container">
              <div class="carousel-caption d-none d-md-block text-right">
                <h1>One more for good measure.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
  

  
  
        <!-- START THE FEATURETTES -->

  
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Do you have RV? <span class="text-muted">Why not make some money?</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto"  style="width:120px" src="/storage/money.png" alt="Make some money">
          </div>
        </div>
  
        <hr class="featurette-divider">
  
        <div class="row featurette">
          <div class="col-md-7 push-md-5">
            <h2 class="featurette-heading">Do you want to rent RV? <span class="text-muted">Do it now.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <div class="col-md-5 pull-md-7">
            <img class="featurette-image img-fluid mx-auto"  style="width:120px" src="/storage/camper.png" alt="Camper">
          </div>
        </div>
  
        <hr class="featurette-divider">
  
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Do you want to try it? <span class="text-muted">It's free. Do it!</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" style="width:120px"src="/storage/about-us.png" alt="Try it">
          </div>
        </div>
  
        <hr class="featurette-divider">



      <div class="container marketing">
  
          <!-- Three columns of text below the carousel -->
          <h2> STAFF:</h2>
          <div class="row">
            <div class="col-lg-6">
              <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
              <h2>Gašper Irman</h2>
              <p>Lots of experiance in PHP, JS and C# coding. Co-author of application and idea of Pack&Go</p>
              <ul>
                  <li>Mail: gasper.irman.gg@gmail.com</li>
                  <li>Website: www.example.com</li>
                  <li>Phone: 000 000 000 </li>
                </ul>
             
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-6">
              <img class="rounded-circle" src="/storage/vgPortrait.jpg" alt="Valentin Grudnik" width="140" height="140">
              <h2>Valentin Grudnik</h2>
              <p>Lots of experiance in PHP, CSS, design and photography. Co-author of application and idea of Pack&Go</p>
              <ul>
                  <li>Mail: grudnik.fotografija@gmail.com</li>
                  <li>Website: www.fotografija-grudnik.com</li>
                  <li>Phone: 041 675 682 </li>
                </ul>
            </div><!-- /.col-lg-4 -->
          </div><!-- /.row -->

          <hr class="featurette-divider">
          <div class="row featurette">
              <h2 class="featurette-heading">Do you want to know more about us? <span class="text-muted">Feel free to contact us!</span></h2>
             
            <div class="col-md-6">
               <ul style="list-style-type:none;">
                  <li>Mail: info@packngo.com</li>
                  <li>Phone: 123 456 789</li>
                  <li>Address: Šmiklavž 3a, 3342 Gornji Grad, Slovenia</li>
                </ul>  
                
                </div>
               

                <div id="map"></div>
                    <script>
                // Initialize and add the map
                function initMap() {
                  // The location of Uluru
                  var uluru = {lat: 46.2740599, lng: 14.7541159};
                  // The map, centered at Uluru
                  var map = new google.maps.Map(
                      document.getElementById('map'), {zoom: 12, center: uluru});
                  // The marker, positioned at Uluru
                  var marker = new google.maps.Marker({position: uluru, map: map});
                }
                    </script>
                    <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAG2O5s4ztTjyYNDBrQqpBlDTmW38qx-Ac&callback=initMap">
                    </script>
         
@endsection