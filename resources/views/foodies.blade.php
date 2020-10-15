
@extends('layouts.new')

  <style>
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }

    .carousel-inner img {
      width: 100%; /* Set width to 100% */
      min-height: 200px;
    }

    /* Hide the carousel text when the screen is less than 600 pixels wide */
    @media (max-width: 600px) {
      .carousel-caption {
        display: none; 
      }
    }
    .class{
      display:inline-block;
    }
    #butics{
      overflow-x:scroll;
    }
    /* #description{
      display:inline-block;
    } */
  </style>
@section('carousel')
<div  id="demo" class="carousel slide" data-ride="carousel" style="text-align:center;">      
	           <ul class="carousel-indicators">
		      <li data-target="#demo" data-slide-to="0" class="active"></li>
	          <li data-target="#demo" data-slide-to="1"></li>
			  <li data-target="#demo" data-slide-to="2"></li>
	           </ul> 
			
			   <div class="carousel-inner" style="width:100%;" >
              
			  <div class="carousel-item active">
			
			      <img src="images/market1.jpg" width="1500px" height="250px"> 
				  <div class="carousel-caption">
				     <span class="display-3" style="font-weight:bold;color:red;">BIGGEST ONLINE SHOP</span>
				       <p style="font-weight:bold;color:white;">ALL OVER THE WORLD</p>
			        </div>
	            </div>
			
			  <div class="carousel-item">
			       <img src="images/market2.jpeg" width="1500px" height="250px">
				   
				       <div class="carousel-caption">
				     <span class="display-3" style="font-weight:bold;color:red">UPTO 20% DISCOUNT</span>
				       <p style="font-weight:bold;color:white">ON EVERY PRODUCTS</p>
			        </div>
                     				   
	            </div>
			  <div class="carousel-item">
			     <img src="images/market3.jpg" width="1500px" height="250px">
				     <div class="carousel-caption">
				     <span class="display-3" style="font-weight:bold;color:red">FREE DELIVERY FOR BANGLADESH</span>
				       <p style="font-weight:bold;color:white">BKASH PAYMENT AVAILABLE</p>
			        </div>
				</div>
	
	            </div>
			   <a class="carousel-control-prev" href="#demo" data-slide="prev">
			    <span class="carousel-control-prev-icon"></span>
			       
		      </a>
			 <a class="carousel-control-next" href="#demo" data-slide="next">
			  <span class="carousel-control-next-icon"></span>
			   </a>
	       </div>
@endsection

@section('content')
<div class="container-fluid" id="app">
       <div class="row">
          <div class="col-md-4 col-sm-6  text-dark flex-center">
             <div class="text-center pb-5 pt-4">
               <h1>Food Menu</h1>
               <p>Available Food for today</p>
               @foreach($fooditem as $item)
               <div><strong>{{$item->name}}</strong></div>
               @endforeach
              
             </div>

          </div>
          <div id="butics" class="col-md-8 col-sm-6 text-dark  pb-5 pt-4"  style="border-left:solid grey 1px">
              <div class="text-center">
              <h1>Butics Lists</h1>
              <p>You are welcome to visit our shop anytime.<a href="#map"><strong>Click Here</strong></a> to get the loacation of the shop.</p>
              <p><strong>Available products for today</strong></p>
              </div>
              <div class="pl-5 pt-3">
              @foreach($butics as $item)
              <div class="class pt-3 pl-5 pr-5 pb-2"  style="border:solid grey 1px">
                <div id="description" class="pr-0"> 
                
                   <a  href="{{$item->image}}"><img src="{{$item->image}}" alt="{{$item->name}}"  width="150px" height="150px"></a><br>
                </div>
                <div id="description">
                   <span><strong>Short Description</strong></span><br>
                   <span><strong>Name : </strong>{{$item->name}}</span><br>
                   <span><strong>Price : </strong>{{$item->price}}</span><br>

                </div>
              </div>
              @endforeach
              </div> 
          </div>
       </div>
    
    <hr>
    <div id="map" class="bg-success" style="height:100px;">
       <h2>Google Map</h2>
    </div>
    <hr>
    <footer class="text-center">
      <p>Footer Text</p>
      <a href="/admin">admin</a>
    </footer>
</div>
@endsection