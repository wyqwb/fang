google.load("search", "1");
$.nameSpace('GoogleSearch');
var gs = GoogleSearch = function(obj)
{
	this.__construct(obj);
}
$.extend(gs,{
	ini:false,
	google:null,
	searchControl:null,
	options:null,
	site : null,
	defaultkey:'',
	searching:function(val,container)
	{
		$(container).empty();
		gs.searchControl = new google.search.SearchControl();  
		gs.options = new google.search.SearcherOptions();   
		gs.options.setNoResultsString('查询结果为空！');    
		gs.searchControl.setResultSetSize(8);
		gs.site = new google.search.WebSearch();  
		gs.site.setUserDefinedLabel("友山");  
		gs.site.setSiteRestriction("http://www.ushinef.com/");
		gs.searchControl.addSearcher(gs.site, gs.options);  
		gs.searchControl.draw(container);  
		gs.searchControl.execute(val);  
	}
});

$.extend(gs.prototype,{
	__construct:function(obj)
	{
		var _this = this;
		gs.defaultkey = obj.defaultkey;
		google.setOnLoadCallback(_this.defaultOnload);
	},
	defaultOnload : function()
	{
		gs.searchControl = new google.search.SearchControl();  
		gs.options = new google.search.SearcherOptions();   
		gs.options.setNoResultsString('查询结果为空！');    
		gs.searchControl.setResultSetSize(8);
		gs.site = new google.search.WebSearch();  
		gs.site.setUserDefinedLabel("友山");  
		gs.site.setSiteRestriction("http://www.ushinef.com/");
		gs.searchControl.addSearcher(gs.site, gs.options);  
		gs.searchControl.draw(document.getElementById('searchcontrol'));  
		gs.searchControl.execute(gs.defaultkey);  
	},
	create:function(obj)
	{
		var input = $.packing(obj.input),
			btn = $('#'+obj.btn),
			container = document.getElementById(obj.container);
		input.bind('keypress',function(e){
			if(e.keyCode == 13)
			{
				var val = input.val();
				if(val == '')
				{
					return;
				}
				else
				{
					gs.searching(val,container);
				}
				
			}
		});
		btn.click(function(){
			var val = input.val();
			gs.searching(val,container);
		})
	}
});