function Pinboard_Linkroll()
{
    var items;
    
    this.set_items = function(i)
    {
        this.items = i;
    }
    this.show_bmarks = function()
    {
        //document.write();
        var lines = [];
        lines.push("<div id=\"pinboard_linkroll\">\n");
        //lines.push("<p class=\"pin-heading\">Pinboard links</p>");
        for (var i in this.items)
        {
            var item = this.items[i];
            var str = this.format_item(item);
            lines.push(str);
        }
        lines.push("</div>");
        //var container = document.getElementById("container");
        document.write(lines.join("\n"));
    
    }
    this.cook = function(v)
    {
        if (v.replace)
        {
            return v.replace('<', '&lt;').replace('>', '&gt>');
        }
        else 
        {
            return '';
        }
    }
    
    this.format_item = function(it)
    {
        var str = "<div class=\"pin-item\">";
        if (!it.d) { return; }
        str += "<p><a class=\"pin-title\" href=\"" + this.cook(it.u) + "\">" + this.cook(it.d) + "</a><br/>";
        if (it.n)
        {
            str += "<span class=\"pin-description\">" + this.cook(it.n) + "</span><br/>\n";
        }
        for (var i = 0; i < it.t.length; i++) 
        {
            var tag = it.t[i];
            str += " <a class=\"pin-tag\" href=\"http://pinboard.in/u:"+ this.cook(it.a) + "/t:" + this.cook(tag) + "\">" + this.cook(tag) + "</a>  ";
        }
        
        str += "</div>\n";
        return str;
    }
}
Pinboard_Linkroll.prototype = new Pinboard_Linkroll();
