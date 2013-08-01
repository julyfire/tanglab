    var count = '3';
    function pinboardNS_fetch_script(url)
    {
        document.writeln('<s'+'cript type="text/javascript" src="' + url + '"></s'+'cript>');
    }
    pinboardNS_fetch_script('http://pinboard.in/js/v1/linkroll.js');
    
     
    function pinboardNS_show_bmarks(r)
    {
        var lr = new Pinboard_Linkroll();
        lr.set_items(r);
        lr.show_bmarks();
     } 
     
    var pinboardNS_linkroll;
    var pinboardNS_callback = function(x)
    {
        pinboardNS_linkroll = new Pinboard_Linkroll();
        pinboardNS_linkroll.set_items(x);
        pinboardNS_linkroll.show_bmarks();
    }
    var json_URL = "http://feeds.pinboard.in/json/v1/u:simplebits/?cb=pinboardNS_show_bmarks&count=" + count;
    
    pinboardNS_fetch_script(json_URL);
