@extends('layouts.new')
@section('content')
<style>
footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
</style>    
<div>
    <h1 class="bg-success text-center">WELCOME</h1>
</div>
<div class="container-fluid" id="app">
   <div class="row">
       <div class="col-md-6 col-sm-6  text-dark">
           <h1>Butics Item</h1>
         <!-- <ol class="text-dark">
             <li>Item 1</li>
             <li>Item 2</li>
             <li>Item 3</li>
             <li>Item 4</li>
          </ol>  -->
          <form-butics value="Butics"></form-butics>
       </div>
       <div class="col-md-6 col-sm-6 text-dark">
          <h1>Food Item</h1>
          <p>Click the food item available for today</p>
          <!-- <form role="form">
               <input type="checkbox" name="item1" id="item1"> Item 1 <br>
               <input type="checkbox" name="item2" id="item2"> Item 2 <br>
               <input type="checkbox" name="item3" id="item3"> Item 3 <br>
               <input type="checkbox" name="item4" id="item4"> Item 4 <br>
          </form> -->

          <form-example :value=2></form-example>
          
       </div>
   </div>
</div>
<br><br>
<footer class="text-center">
      <p>Footer Text</p>
      <a href="/foodies">Home</a>
</footer>
@endsection

