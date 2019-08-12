(function(){
    if(location.port == "8000")
    {
        var BASEURL = "http://127.0.0.1:8000/art-pub-mtl/";	
    }
    else
    {
        var BASEURL = "http://"+location.host+"/art-pub-mtl/api/";	
    }
    
})();
