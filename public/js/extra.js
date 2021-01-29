setInterval(function(){
    if(window.innerWidth<580){
        document.getElementById('login').className='login';
    }
    else{
        document.getElementById('login').className='navitem';
    }
},1);
