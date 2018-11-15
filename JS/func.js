function sched() {
			scheduler.locale.labels.timeline_tab = "Timeline";
			scheduler.locale.labels.section_custom="Section";
			scheduler.config.details_on_create=true;
			scheduler.config.details_on_dblclick=true;
			scheduler.config.xml_date="%Y-%m-%d %H:%i";

			scheduler.createTimelineView({
				name:	"timeline",
				x_unit:	"minute",
				x_date:	"%H:%i",
				x_step:	30,
				x_size: 24,
				x_start: 16,
				render:"days",
				days:18
			});

			var view_name = 'timeline';
			scheduler.attachEvent("onBeforeViewChange", function(old_mode,old_date,mode,date){
				var year = date.getFullYear();
				var month= (date.getMonth() + 1);
				var d = new Date(year, month, 0);

				scheduler.matrix[view_name].days = d.getDate();
				return true;
			});
			scheduler.date['add_' + view_name] = function(date, step){
				if(step > 0){
					step = 1;
				}else if(step < 0){
					step = -1;
				}
				return scheduler.date.add(date, step, "month")
			};

			scheduler.date[view_name + "_start"] = function (date) {
				var view = scheduler.matrix.timeline;
				date = scheduler.date.month_start(date);
				date = scheduler.date.add(date, view.x_step*view.x_start, view.x_unit);
				return date;
			};

			scheduler.attachEvent("onYScaleClick", function (index, section, e){
				if(scheduler.getState().mode == view_name){
					scheduler.setCurrentView(new Date(section.key), "day");
				}
			});

			scheduler.init('scheduler_here',new Date(),"timeline");
			scheduler.parse();
		}
		
		///*nav change color*////
		$(window).scroll(function(){
		$('nav').toggleClass('scrolled', $(this).scrollTop() > 50);
		});
		
		///////*disable f12 & right-click*///////
		document.onkeypress = function (event) {
        event = (event || window.event);
        if (event.keyCode == 123) {
            return false;
        }
    }
		document.onmousedown = function (event) {
        event = (event || window.event);
        if (event.keyCode == 123) {
            return false;
        }
    }
		document.onkeydown = function (event) {
        event = (event || window.event);
        if (event.keyCode == 123) {
            return false;
        }
    }
	
	var message="Sorry, right-click has been disabled"; 

	function clickIE() {if (document.all) {(message);return false;}} 
	function clickNS(e) {if 
	(document.layers||(document.getElementById&&!document.all)) { 
	if (e.which==2||e.which==3) {(message);return false;}}} 
	if (document.layers) 
	{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;} 
	else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;} 
	document.oncontextmenu=new Function("return false")

	$('.datepicker').pickadate(); 