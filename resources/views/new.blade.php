@extends('layouts.new')
@section('nav')
<nav class="navbar navbar-expand-sm bg-dark  justify-content-center fixed-top">
	  
      <a class="navbar-brand" href="#">LOGO</a>
      <ul class="navbar-nav">
           <span class="navbar-text pl-2 pr-2">
              <h1 style="color:orange; font-weight:bold;">BUYSELL</h1>
              <p class="font-weight-bold text-success pb-1" style="padding-left:100px;">-BUY & SELL EVERYTHING</p>
          </span>
          <!-- <form class="form-inline" action="">
                  <input class="form-control mr-sm-2 " size='40' type="text" placeholder="Search...">
                  <button type="submit" placeholder="Search.." class="btn btn-warning">Search</button>
                 </div>
          </form> -->
		  <div id="app1" style="padding-top:45px;padding-left:10px"><searchbar></searchbar></div>
          <!-- <li class="nav-item ">
              <a class="nav-link pt-5 pl-5 pr-3" href="#">SIGN UP<span class="badge">0</span></a>
          </li> -->


		  @guest
            <li class="nav-item " style="font-size:17px">
			    <a class="nav-link pt-5 pl-3 pr-3" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
            </li>
			 @else
			 <li class="nav-item dropdown" style="font-size:17px">
                                <a id="navbarDropdown" class="nav-link pt-5 pl-3 pr-3 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('LOGOUT') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
             </li>
             @endguest



          <li class="nav-item" style="font-size:17px">
              <a class="nav-link pt-5 pl-3 pr-3" href="/messages">MESSAGES</a>
          
          </li>
          <li class="nav-item" style="font-size:17px">
              <a class="nav-link pt-5 pl-3 pr-3" href="#">CART</a>
          
          </li>
           <li class="nav-item" style="font-size:17px">
              <a class="nav-link pt-5 pl-3 pr-3" href="controlpanel">CONTROL PANEL</a>
          
          </li>
       </ul>
   </nav>
@endsection

@section('carousel')
<div  id="demo" class="carousel slide" data-ride="carousel" style="text-align:center;padding-top:122px;">      
	           <ul class="carousel-indicators">
		      <li data-target="#demo" data-slide-to="0" class="active"></li>
	          <li data-target="#demo" data-slide-to="1"></li>
			  <li data-target="#demo" data-slide-to="2"></li>
	           </ul> 
			
			   <div class="carousel-inner" style="width:100%;" >
              
			  <div class="carousel-item active">
			
			      <img src="images/market1.jpg" width="1500px" height="300px"> 
				  <div class="carousel-caption">
				     <span class="display-3" style="font-weight:bold;color:red;">BIGGEST ONLINE SHOP</span>
				       <p style="font-weight:bold;color:white;">ALL OVER THE WORLD</p>
			        </div>
	            </div>
			
			  <div class="carousel-item">
			       <img src="images/market2.jpeg" width="1500px" height="300px">
				   
				       <div class="carousel-caption">
				     <span class="display-3" style="font-weight:bold;color:red">UPTO 20% DISCOUNT</span>
				       <p style="font-weight:bold;color:white">ON EVERY PRODUCTS</p>
			        </div>
                     				   
	            </div>
			  <div class="carousel-item">
			     <img src="images/market3.jpg" width="1500px" height="300px">
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
<div id= "app" class="container-fluid "> 
		    <!-- <div class="form-inline p-2 justify-content-center">
                <label for="orderby">ORDER BY</label>
                <select class="form-control" id="orderby">
                   <option>Uploaded Time</option>
                   <option>Rating</option>
                   <option>Price</option>
                   <option>Product Name</option>
                 </select>
		         <select class="form-control" name="order" id="order">
    		       <option>ASC</option>
                   <option>DESC</option>
		         </select>
		    </div> -->

    
          <div class="row">
	         <div class="col-sm-2 " style="height:500px;background-color:orange;">
		         <p style="padding-top:10px">FOR ADDS,THIS PLACE IS FOR ADDS</p> 
	         </div>
	         <div class="col-sm-8 border border-top-0">
			 <orderby></orderby>

			    <!-- @foreach ($data as $data)
                    <div class="card bg-light">
			             <div class="card-body" style="height:250px;background-color:">
			                 <p style="float:left;clear:both;"> <a href="/product {{$data->id}}"><img src="{{ $data->image }}" width="150px" height="210px"></a></p>
				             <div style="text-align:left;margin-left:300px;border-left:solid black 1px;padding-left:15px;">
							    <p><span style="font-weight:bold">Product Name : </span>{{ $data->name }}</p>
								<p><span style="font-weight:bold">Available Color : </span>{{ $data->color }}</p>
					
								<p><span style="font-weight:bold">Price : </span>{{ $data->price }}</p>
								<p><span style="font-weight:bold">Rating : </span>{{ $data->rating }}</p>
								Uploaded By : <example-component :message={{ $data->user }}></example-component>
							  </div>
						 </div>
                     </div> <br>
		        @endforeach -->
                    
	          </div>
	          <div class="col-sm-2" style="height:500px;background-color:blue;">
		         <h5 style="padding-top:15px">RECOMENDATIONS</h5>
				 <br> 
				 <rec></rec>
				 <!-- <div class="card bg-light">
				     
				     <p style="padding:5px;"> Here will be the recomendation for visitor</p>
				 </div><br>
				 <div class="card bg-light">
				     <p style="padding:5px;"> Here will be the recomendation for visitor</p>
				 </div><br>
				 <div class="card bg-light">
				     <p style="padding:5px;"> Here will be the recomendation for visitor</p>
				 </div><br>
				 <div class="card bg-light">
				     <p style="padding:5px;"> Here will be the recomendation for visitor</p>
				 </div>-->
	          </div> 
           </div>   

      </div>
	  
	  <div class="bg-dark text-success" style="height:200px;font-weight:bold;">
	    <p class="p-4 text-center">This is the footer</p>
	  </div>	
	         

@endsection
