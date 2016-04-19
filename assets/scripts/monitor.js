
var chart_id;


function create_unit()
{
	
		
	//document.getElementById("config_form").style.display="none";

    google.charts.setOnLoadCallback(drawChart4(arguments[0], arguments[1], arguments[2],arguments[3] ));
      function drawChart4(chart_id, target, id,device_id) {
		  alert(chart_id);
	
      var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          [chart_id + ' - %', Number(target)]
        ]);
		
        var options = {
          width: 300, height: 180,
          minorTicks:Number(target),
		  majorTicks:[0,target],
          
		  greenFrom :0,
		  greenTo : Number(target)/3,
		  redFrom : Number(target)/3,
		  redTo : Number(target)
		  
        };
		
        var chart_id = new google.visualization.Gauge(document.getElementById(chart_id));
        
        chart_id.draw(data, options);
       
        var i = id;
		var value = 100/Number(target) ;
        setInterval(function() {
			
         var dataString = "id=" + i ;
			
				/*$.ajax({  
					type: "POST",  
					url: "update.php",  
					data: dataString,
					beforeSend: function() 
					{
						//$('html, body').animate({scrollTop:0}, 'slow');
					  	//$("#response").html('<div class="prev_box"><img src="loading.gif" align="absmiddle" alt="Loading..."> Loading...<br clear="all"><br clear="all">');
					},  
					success: function(response)
					{
				
						data.setValue(0, 1, Number(response));
						chart_id.draw(data, options);
						
					}
				});
				
				
				/*if(value >= 100  )
				{
					data.setValue(0, 1, 100);
					chart_id.draw(data, options);
				}
				else
						{
						data.setValue(0, 1, value | 0);
						chart_id.draw(data, options);
						}
				value = value + (100/Number(target));
				*/
        }, 1000);

        }
}
function popUp(location,mac_id,machine_name,opt_name,actual,performance,total_h_d,report,cycle,rejection) {
			alert(location);
			document.getElementById("location").value = location;
			document.getElementById("mac_id").value = mac_id;
			document.getElementById("mac_name").value = mac_name;
			document.getElementById("opt_name").value = opt_name;
			document.getElementById("target").value = target;
			document.getElementById("actual").value = actual;
			document.getElementById("performance").value = performance;
			document.getElementById("total_h_d").value = total_h_d;
			document.getElementById("report_to").value = report_to;
			document.getElementById("cycle").value = cycle;
			document.getElementById("rejection").value = rejection;
			
}	