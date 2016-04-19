var canvas;
var gauge = new Array();;

function drawMachine(mac_id,mac_name,target,loc,opt_name,actual,total_h_d,report,cycle,rejection)
{
	 canvas = document.getElementById(mac_id);
	 canvas.addEventListener("click", function(){
		message(mac_id,mac_name,target,loc,opt_name,actual,total_h_d,report,cycle,rejection);}, false);
        {
			
				gauge[mac_id] = new RGraph.Gauge({
                id: mac_id,
                min: 0,
                max: 200,
                value: [0,0],
                options: {
                    titleTop: mac_name,
                    titleTopSize: '14',
                    titleTopFont: 'Aerial',
                    titleTopColor: 'white',
                    titleBottom: '',
                    titleBottomSize: ' 14',
                    titleBottomFont: 'Impact',
                    titleBottomColor: '#ccc',
                    titleBottomPos: 0.4,
                    backgroundColor: 'orange',
                    backgroundGradient: true,
                    centerpinColor: '#666',
                    needleSize: [null, 50],
                    needleColors: ['Gradient(transparent:white:white:white:white:white)', 'Gradient(transparent:#d66:#d66:#d66:#d66)'],
                    textColor: 'white',
                    tickmarksBigColor: 'black',
                    tickmarksMediumColor: 'white',
                    tickmarksSmallColor: 'white',
                    borderOuter: '#666',
                    borderInner: '#333',
                    colorsRanges: []
                }
            }).draw();
			 
		
        };
		
		

}

function message(mac_id,mac_name,target,loc,opt_name,actual,total_h_d,report,cycle,rejection)
{
	document.getElementById("location").value = loc;
	document.getElementById("mac_id").value = mac_id;
	document.getElementById("mac_name").value = mac_name;
	document.getElementById("opt_name").value = opt_name;
	document.getElementById("target").value = target;
	document.getElementById("actual").value = actual;
	document.getElementById("hour").checked = true;
	document.getElementById("total_h_d").value = total_h_d;
	document.getElementById("report_to").value = report;
	document.getElementById("cycle").checked = true;
	document.getElementById("rejection").checked = false;
	document.getElementById("lbl_balance").innerText = "Balance:" + (target - actual) ;
	document.getElementById("lbl_actual").innerText = "Actual:" + actual ;
	document.getElementById("lbl_target").innerText = "Target:" + target ;
}
function getMachineValue()
{
	
	
	var i = 1;
	setInterval(function() {
			
				var dataString = "id=" + 0  ;
				
				$.ajax({  
				
					type: "POST",  
					url: "monitor_value.php",  
					data: dataString,
				
					success: function(response)
					{
						alert(response);
						var data = JSON.parse(response);
						
						if(gauge[Number(data.mac_id)])
						{
						
						gauge[Number(data.mac_id)].value = Number(data.value);
						gauge[Number(data.mac_id)].set({backgroundColor: data.color});
						gauge[Number(data.mac_id)].draw();
						gauge[Number(data.mac_id)].grow();
						
						}				
					}
				
				});
				
				
				

        }, 1000);

}
