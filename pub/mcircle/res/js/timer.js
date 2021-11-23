//-----------------------------------------------------
// 공용 JS
//-----------------------------------------------------
var _timer =
{
	data   : null,      // 타이머 초기화
	hour   : 0,			// 시
	min	   : 0,			// 분
	sec	   : 0,			// 초
	
	// 초기화
	init : function()
	{
		clearTimeout(_timer.data);
		this.hour	= 0;
		this.min	= 0;
		this.sec	= 0;
	},
	
	// 타이머 시작 및 중지
	timer : function(obj, bChk)
	{
		if (bChk == false)
		{
			_timer.sec += 1;
			
			if (_timer.sec == 60)
			{
				_timer.sec  = 0;
				_timer.min += 1;
			}
			
			if (_timer.min == 60)
			{
				_timer.min   = 0;
				_timer.hour += 1;
			}
			
			if (_timer.hour == 24)
			{
				_timer.hour   = 0;
			}
			
			var sec  = ""+ _timer.sec;
			var min  = ""+ _timer.min;
			var hour = ""+ _timer.hour;
			
			if (sec.length != 2)
			{
				sec = "0"+_timer.sec;
			}
			
			if (min.length != 2)
			{
				min = "0"+_timer.min;
			}
			
			if (hour.length != 2)
			{
				hour = "0"+_timer.hour;
			}
			
			var fullTime = hour +":"+ min +":"+ sec;
			
			$("#"+obj).text(fullTime)
			
			_timer.data = setTimeout("_timer.timer('"+obj+"', false)", 1000);
		}
	}
}