var i = 2000;
var plot ;
function createMachine(mac_name,value)
{
  var s2 = [value];
   plot = $.jqplot(mac_name,[s2],{
		title:'Test',
       seriesDefaults: {
           renderer: $.jqplot.MeterGaugeRenderer,
		  
           rendererOptions: {
			   min: 1000,
				max: 5000,
               label: mac_name,
			   labelColor:'black',
               labelPosition: 'bottom',
               labelHeightAdjust: 0,
			   baselineColor:'#000000',
               
               textColor:'',
			   ringColor:'green',
			   background:"white",
			   smooth: true,
                animation: {
                    show: true
                }
			   
			   
			   
           }
		   
		   
       }
	   
   });
   
    setInterval(function () {
        s2 = [i + 1000]	;
		plot.destroy();
        plot.series[0].data[0] = [1,s2]; //here is the fix to your code
        plot.replot();
    }, 1000);

}

			function monitor_refresh()
		{
			alert("test");
			createMachine('kuh',i);
			i = i + 1000;
			alert(i);
			window.setInterval(monitor_refresh, 1000);
		}

