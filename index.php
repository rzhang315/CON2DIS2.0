<!DOCTYPE html>
<html>
<head>
	


<link rel='stylesheet' type='text/css' href='http://jsxgraph.uni-bayreuth.de/distrib/jsxgraph.css' />
<script type="text/javascript" src="http://jsxgraph.uni-bayreuth.de/distrib/jsxgraphcore.js"></script>
<style type="text/css">
.title
      {
      width:1000px;
	  height: 40px;
	  margin:15px auto;
	  background-color:#D1E4E2;
	  border:1px solid #006633;
	  color:#000000;
	  padding: 10px 10px 10px 10px;
	  font-weight:bold;
      }
.subtitle
      {
      width:1000px;
	  height: 70px;
	  margin:15px auto;
	  background-color:#E4E3E2;
	  border:1px solid #006633;
	  color:#000000;
	  padding: 10px 10px 10px 10px;
	  font-weight:bold;
      }
.question
      {
      width:1000px;
	  height: 250px;
	  margin:15px auto;
	  background-color:#F3F2E2;
	  border:1px solid #006633;
	  color:#000000;
	  padding: 10px 10px 10px 10px;
	  font-weight:bold;
      }
.center_page
      {
      width:1080px;
	  margin:10px auto;
      }
.left_side
      {
	 width: 210px;
     float: left;
     margin: 10px 0px 10px 0px;
	 background-color:#FFEAEA;
	 border: 1px solid #993300;
     color: #000000;
     padding: 10px 10px 10px 10px;
	 font-weight:bold;
      }
.jxgbox
     {
    width:800px; height:300px;
    float:right;
    margin: 10px 5px 10px 0px;
    background-color: #EAF9FF;
    border:1px solid #006699;
    color: #000000;
    padding: 10px 10px 10px 10px;
     }
     /*----- Drop-down menu ---- */
     .menu {
         width: 200px;
     }
     .menu .arrow {
         font-size: 11px;
     }
     /*----- Top Level -----*/
     .menu > ul {
         float: left;
         position: relative;
         font-size: 17px;
     }
     .menu > ul > a {
         text-shadow: 0px 1px 0px rgba(0, 0, 0, 0.4);
     }
     .menu > ul > .current-item {
         background: #FFF;
     }
     /*----- Bottom Level -----*/
     /* The child will be hidden by default when the page loads
     and only shown when the parent is hovered over.
     */
     .menu:hover .sub-menu {
         z-index: 1;
         opacity: 1;
     }
     .sub-menu {
         width: 200%;
         padding: 5px 0px;
         position: absolute;
         top: 100%;
         left: 0px;
         z-index: -1;
         opacity: 0;
         transition: opacity linear 0.15s;
         box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.2);
         background: #FFF;
     }
</style>
</head>
<body>

    <div align="center" class="title">Continous - Discrete Sampling Demo 2.0
        <br> VIP Team: Intelligent Tutoring Systems
         &nbsp &nbsp &nbsp  Contributors: Ruo Zhang, Dhamma Kimpara, and Anagha Indic
    </div>
    
    
    <div align="center" class="subtitle" >3.2 Sampling and Aliasing
    <br> Use the con2dis GUI to do the following exercises. The parameters of the input signal are its frequency
f0 in Hz, and its phase ' in rads. The sampling rate of the A/D converter and the D/A converter is fs in
samples/sec.
.
    </div>
    
    
    <div align="center" class="question">Question from Lab
		<div style = "width:800px; border: solid 1px #333333; " align = "left">
        <?php
		   session_start();
		   include("config.php");
		   error_reporting(-1);
		   
		    
		   
		   if (!isset($_SESSION['renew']))
			  {
					$_SESSION['renew'] = 1;
					//include("storeQuestion.php");
					$sql = "update Labs set score=0";
					mysqli_query($db, $sql);
					
					echo "\t\t<div>renewed</div>\n";
			  }
		   
		   if (!isset($_SESSION['count2']))
			  {
					$_SESSION['count2'] = 0;
			  }
			  
		   if($_SERVER["REQUEST_METHOD"] == "POST") {
	   
			  $sql = "SELECT question,score,id FROM Labs";
			  $result2 = mysqli_query($db,$sql);
			  
			  if (false === $result2) {
				echo mysqli_error();
			  }
			 		  
			  $max2 = mysqli_num_rows($result2);
			  
			  $i = 0;
			  while ($i<=$_SESSION['count2'])
			  {
			  $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
			  $i = $i+1;
			  
			  }
						
				      
			  $_SESSION['count2'] = $_SESSION['count2'] + 1;
			  //echo $_SESSION['count2'];
				       	
				      
			  if ($_SESSION['count2']>=$max2)
			  {$_SESSION['count2'] = 0;}
		  
			  
									
			  echo "<br>";
			  
			  //echo "\r\n";
							  
			  $questionBank = $row2["question"];
			  
			  echo "\t\t<div>Question: $questionBank</div>\n"; 
			  
			  $score = $row2["score"]; 	
			  
			  echo "\r\n";
		
			  echo "\t\t<div>Score: $score</div>\n"; 
			  $idLab = $row2["id"]; 
			      
			  echo "\t\t<div>Id: $idLab</div>\n"; 
			  
			  if (!isset($_SESSION['totalscore']))
			  {
					$_SESSION['totalscore'] = 0;
					
			  }
			  
			
			  
			  $_SESSION['totalscore']= 0;
			  $i = 0;
			  $sql = "SELECT question,score,id FROM Labs";
			  $result2 = mysqli_query($db,$sql);
			  
			  while ($i<=$max2)
			  {
			  
			  $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
			  $i = $i+1;
			  $_SESSION['totalscore'] = $_SESSION['totalscore']+ $row2["score"];
			  }
			  $totalscore = $_SESSION['totalscore'];
			  echo "\t\t<div>TotalScore: $totalscore</div>\n"; 
			}
   
		?>
		</div>
		
		
	   <div style = "margin:40px">
	   
	   <form action = "" method = "post">
		  <button type="submit" name="btnSubmit">Next Lab Part</button> 
		  <input type="button" id="SubmitState" value="Submit State" onClick="sendState();"><br/>
		 
	   </form>
	   <form method="post">  UserName(GTid):

		  <input type = "text" name = "username" id = "username" size = "6" /><br/>
		  <input type = "button" value = "Login for checkoff" onClick="sendUserInfo();" /><br />
	   
	   </form>
		
	   
	   <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?//php echo $error; ?></div>
               
               
    </div>
    
     <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
          
				
         </div>
			
      </div>
    
    
   
    
    <div class="center_page">
    <div class="left_side">
        1. Hit {Play Demo} to see how the signal changes!
        <br>       <input type="button" id="playbutton" value="&#9654 Play Demo" onClick="player();">
        <br>  ---------------------------------------
        <br> 2. Interact by updating the input or draging the slider.
        <br> Input: original signal
        <br> > Original Frequency:
        <br> <form method="post">fo = <input type="text" id="fo" size = 6 name = "q" > Hz (0, 40)</form>
        <br> > Phase:
        <br> <form method="post">  &#966 = <input type="text" id="phase" size  = 6 name = "r" > ( - &#960, &#960 )</form>
        <br> > Sampling Rate:
        <br> <form method="post">fs = <input type="text" id="fs" size = 6 name = "s"> Hz (0, 40) </form>
        <br>       <input type="button" id="updateText" value="Update State" onClick="updateSlider();">
        
        <br>  ---------------------------------------
        3. Focus on the change of one signal.
        <br>       <input type="button" id="mode1" value="Show Original" onClick="showOriginal();">
        <br>       <input type="button" id="mode2" value="Show Reconstructed" onClick="showSampled();">
        <br>       <input type="button" id="mode12" value="Show Both" onClick="showBoth();">
        <br>  ---------------------------------------
        4. Question: Consider the input signal above, what is the reconstructed signal?
        
       
        <nav class="menu">
            <ul class="clearfix">
                <a href="#"> Answer <span class="arrow">&#9660;</span></a>
                <ul class="sub-menu">
                    Output = cos (2&#960 (<output type="text" id="demo"></output>) t
                      + <output type="text" id="phase2"></output> )
                </ul>
            </ul>
        </nav>
        <br>
        <br>
        <br>  ---------------------------------------
        5. Formula:
        <br> &#969 = 2&#960 ( fo / fs )

    </div>

    <div id="box" class="jxgbox" ></div>
    <br> <div id="box3" class="jxgbox" style="height:150px;"></div>
    <br> <div id="box2" class="jxgbox" style="height:150px;"></div>

    <script type="text/javascript">
    // ---------------- Board 1 : Time Domain ------------------------------------------//
    var board = JXG.JSXGraph.initBoard('box', {boundingbox: [0, 2, 0.3, -3], axis:false, grid:true, showCopyright:false, showNavigation:false});
    var txt2 = board.create('text',[0.005 ,1.8 , 'Time Domain'], {fontSize:13});
    var xaxis1 = board.create('arrow',[[0,0],[0.3,0]],{strokecolor:"#444",
    strokeWidth:1,highlight:true,fixed:true});
    var pi =  Math.PI ;
    var sMin = 0;
    var sMax = 40;
    // sliders
    slider = board.create('slider',[[0,-1.5],[0.2,-1.5],[sMin,20,sMax]],{name:'Original Frequency'});
    slider2 = board.create('slider',[[0,-2.0],[0.2,-2.0],[sMin,30,sMax]],{name:'Sampling Frequency'});
    phase = board.create('slider',[[0,-2.5],[0.2,-2.5],[-pi,0,pi]],{name:'Phase'});
    // avoid undersampling by adding event listener to the board
    board.addHook(function() {
    if (slider.position > 2 * slider2.position ) {
        slider.position = 2 * slider2.position;
        alert("Undersampling. ");
    }
    }, 'update');
    // 'update' to execute the callback function every time board.update() is executed
    // initial states of textbox content
    document.getElementById('fo').value = (slider.position * sMax).toFixed(2);
    document.getElementById('fs').value = (slider2.position * sMax).toFixed(2);
    document.getElementById('phase').value = (phase.Value()).toFixed(2);
    // Graph function of the original sinusoid
    var graph = board.create('functiongraph', [function(x){
    var frequency= slider.Value();
    return Math.cos(frequency * x * 2 * pi + phase.Value());
    }],{strokeColor: 'blue',strokeWidth:2})
    // Graph function of the sampled sinusoid
    var value;
    var value2;
    
    var graph2 = board.create('functiongraph', [function(x){
    var fs = slider2.Value();
    var fo = slider.Value();
    var inversed;
    value = fo;
    var nyquistfre;
    var nyquistfre2;
    var phasev;
    for (i = -10; i < 10; i++) {
        if (Math.abs(fs*i-fo)<value && (Math.abs(fs*i-fo)!=0))
        {
           value = Math.abs(fs*i-fo)
           value2 = fs*i-fo
           if ((fs*i-fo)<0){inversed = true}
           //if (i == 1) {nyquistfre = true}
           //if (i == 2) {nyquistfre2 = true}
           phasev = phase.Value()
           //MATH EQUATION to display graph, dont ask me what nyquistfre means, it works...somehow
        }
    }
    // sampled frequency stored in global variable
    document.getElementById("demo").innerHTML = value.toFixed(2);
    document.getElementById("phase2").innerHTML = phase.Value().toFixed(2);
    var coeff = value;
    //if (nyquistfre2 == true){return Math.cos(-coeff * x * 2 * pi +  phase.Value());}
    if (inversed == true){return Math.cos(coeff * x * 2 * pi -  phase.Value());}
    //if (nyquistfre == true){return Math.cos(coeff * x * 2 * pi -  phase.Value());}
    return Math.cos(coeff * x * 2 * pi +  phase.Value());
    }],{strokeColor: "red",strokeWidth:1.5});
    // Using for loops to generate coordinates of segement
    var pointBottom = new Array();
    for (i = 0; i < 10; i++)
    {
       pointBottom[i] = board.create('point', [function(){return 1/slider2.Value()*i;},0], {name: '',color:'grey',size:0});
    }
    var pointTop = new Array();
    for (i = 0; i < 10; i++)
    {
       pointTop[i] = board.create('point', [function(){return 1/slider2.Value()*i;},function(){return Math.cos((1/slider2.Value()*i)*2*pi*slider.Value()+phase.Value());}], {name: '',color:'grey',size:2});
    }
    
  
    var segments = new Array();
    for (i = 0; i < 10; i++)
    {
       segments[i] = board.create('line', [pointBottom[i],pointTop[i]], {straightFirst:false, straightLast:false,strokeColor:'black'});
    }
    
    // ---------------- Board 2 : Discrete Time Spectrum ------------------------------------------//
    var board2 = JXG.JSXGraph.initBoard('box2', {boundingbox: [-50, 2, 50,-0.7], axis:false, grid:false, showCopyright:false, showNavigation:false});
    board.addChild(board2);
    var xaxis1 = board2.create('arrow',[[0, 0],[0,2]],{strokecolor:"#444",
    strokeWidth:1,highlight:true,fixed:true});
    var xaxis2 = board2.create('arrow',[[-50, 0],[48.5, 0]],{strokecolor:"#444",
    strokeWidth:1,highlight:true,fixed:true});
    var txt6 = board2.create('text',[ 26, -0.5, 'Frequency(Radian)'], {fontSize:12});
    var txt9 = board2.create('text',[ -49, 1.8, 'Discrete Time Spectrum'], {fontSize:12});
    
    
    var pr1 = board2.create('point',[
        function(){return value2;},1
    ],{name:'', face:'square', size:2, color:'red', fillOpacity:1, strokeOpacity: 0.6});
    // +/- 2 pi
    var dfr2 = board2.create('line',[
        [function(){return (value2) + slider2.Value();},1],
        [function(){return value2 + slider2.Value();},0]
    ],{strokecolor:"red",strokeWidth:2,highlight:true,straightFirst:false,straightLast:false,fixed:true});
    var dfr2 = board2.create('line',[
        [function(){return -slider2.Value() - (value2);},1],
        [function(){return -slider2.Value() - (value2);},0]
    ],{strokecolor:"red",strokeWidth:2,highlight:true,straightFirst:false,straightLast:false,fixed:true});
    // left_side arrow of reconstructed signal
    var dfr1 = board2.create('line',[
        [function(){return -(slider.Value())+slider2.Value();},1],
        [function(){return -(slider.Value())+slider2.Value();},0]
    ],{strokecolor:"red", strokeWidth:2,highlight:true,straightFirst:false,straightLast:false,fixed:true});
    // right_side arrow of reconstructed signal
    var dfr2 = board2.create('line',[
        [function(){return slider.Value()-slider2.Value();},1],
        [function(){return slider.Value()-slider2.Value();},0]
    ],{strokecolor:"red",strokeWidth:2,highlight:true,straightFirst:false,straightLast:false,fixed:true});
    // left_side arrow of original signal
    var dpo1 = board2.create('point',[
        function(){return -slider.Value();},1
    ],{name:'fo', face:'square', size:2, color:'blue', fillOpacity:1, strokeOpacity: 0.6});
    var dfo1 = board2.create('segment',[
        [function(){return -slider.Value();},1],
        [function(){return -slider.Value();},0]
    ],{strokecolor:"blue",strokeWidth:2,highlight:true,straightFirst:false,straightLast:false,fixed:true});
    // right_side arrow of original signal
    
    var dfo2 = board2.create('segment',[
        [function(){return slider.Value();},1],
        [function(){return slider.Value();},0]
    ],{strokecolor:"blue",strokeWidth:2,highlight:true,straightFirst:false,straightLast:false,fixed:true});
    // sampling frequency limit bound
    var li1 = board2.create('line',[[function(){return slider2.Value()},0],[function(){return slider2.Value()},4]],
     {straightFirst:false, straightLast:false, strokeWidth:2,strokeColor: "black",dash:2});
    var li2 = board2.create('line',[[function(){return -slider2.Value()},0],[function(){return -slider2.Value()},4]],
     {straightFirst:false, straightLast:false, strokeWidth:2,strokeColor: "black",dash:2});
    var p33 = board2.create('point',[function(){return slider2.Value()},0], {name:'2&#960',size:1});
    var p34 = board2.create('point',[function(){return -slider2.Value()},0], {name:'- 2&#960',size:1});
    var p35 = board2.create('point',[0,0], {name:'0',size:1});
    // Area
    var p31 = board2.create('point',[function(){return slider2.Value()/2},4], {name:'',size:0});
    var p32 = board2.create('point',[function(){return -slider2.Value()/2},4], {name:'',size:0});
    var p33 = board2.create('point',[function(){return slider2.Value()/2},0], {name:'&#960',size:1});
    var p34 = board2.create('point',[function(){return -slider2.Value()/2},0], {name:'- &#960',size:1});
    var poly3 = board2.createElement('polygon',[p31,p32,p34,p33]);
    // ---------------- Board 3 : Continous Time Spectrum ------------------------------------------//
    var board3 = JXG.JSXGraph.initBoard('box3', {boundingbox: [-50, 2, 50,-0.7], axis:false, grid:false, showCopyright:false, showNavigation:false});
    board.addChild(board3);
    var xaxis3 = board3.create('arrow',[[0, 0],[0,2]],{strokecolor:"#444",
    strokeWidth:1,highlight:true,fixed:true});
    var xaxis4 = board3.create('arrow',[[-50, 0],[48.5, 0]],{strokecolor:"#444",
    strokeWidth:1,highlight:true,fixed:true});
    var txt6 = board3.create('text',[ 26, -0.5, 'Frequency(Hz)'], {fontSize:12});
    var txt9 = board3.create('text',[ -49, 1.8, 'Continous Time Spectrum'], {fontSize:12});
    // left_side arrow of reconstructed signal
    var pr1 = board3.create('point',[
        function(){return value2;},1
    ],{name:'', face:'square', size:2, color:'red', fillOpacity:1, strokeOpacity: 0.6});
    var fr1 = board3.create('line',[
        [function(){return -(document.getElementById("demo").innerHTML);},1],
        [function(){return -(document.getElementById("demo").innerHTML);},0]
    ],{strokecolor:"red",strokeWidth:2,highlight:true,straightFirst:false,straightLast:false,fixed:true});
    // right_side arrow of reconstructed signal
    var fr2 = board3.create('line',[
        [function(){return +(document.getElementById("demo").innerHTML);},1],
        [function(){return +(document.getElementById("demo").innerHTML);},0]
    ],{strokecolor:"red",strokeWidth:2,highlight:true,straightFirst:false,straightLast:false,fixed:true});
    // left_side arrow of original signal
    var po1 = board3.create('point',[
        function(){return -slider.Value();},1
    ],{name:'fo', face:'square', size:2, color:'blue', fillOpacity:1, strokeOpacity: 0.6});
    var fo1 = board3.create('segment',[
        [function(){return -slider.Value();},1],
        [function(){return -slider.Value();},0]
    ],{strokecolor:"blue",strokeWidth:2,highlight:true,straightFirst:false,straightLast:false,fixed:true});
    // right_side arrow of original signal
  
    var fo2 = board3.create('segment',[
        [function(){return slider.Value();},1],
        [function(){return slider.Value();},0]
    ],{strokecolor:"blue",strokeWidth:2,highlight:true,straightFirst:false,straightLast:false,fixed:true});
    // sampling frequency limit bound
    var li1 = board3.create('line',[[function(){return slider2.Value()},0],[function(){return slider2.Value()},4]],
     {straightFirst:false, straightLast:false, strokeWidth:2,strokeColor: "black",dash:2});
    var li2 = board3.create('line',[[function(){return -slider2.Value()},0],[function(){return -slider2.Value()},4]],
     {straightFirst:false, straightLast:false, strokeWidth:2,strokeColor: "black",dash:2});
    var p37 = board3.create('point',[function(){return slider2.Value()},0], {name:function(){return (slider2.Value()).toFixed(2)},size:1});
    var p38 = board3.create('point',[function(){return -slider2.Value()},0], {name:function(){return (-slider2.Value()).toFixed(2)},size:1});
    //var p35 = board3.create('point',[0,0], {name:'0',size:1});
    // Area
    var p31 = board3.create('point',[function(){return slider2.Value()/2},4], {name:'',size:0});
    var p32 = board3.create('point',[function(){return -slider2.Value()/2},4], {name:'',size:1});
    var p33 = board3.create('point',[function(){return slider2.Value()/2},0], {name:function(){return (slider2.Value()/2).toFixed(2)},size:1});
    var p34 = board3.create('point',[function(){return -slider2.Value()/2},0], {name:function(){return (slider2.Value()/-2).toFixed(2)},size:1});
    var poly3 = board3.createElement('polygon',[p31,p32,p34,p33]);
    // ---------------------- Animation and Updates -------------------------------------//
    // set the timer
    var animate = null;
    // update the slider when play button is pressed
    function sliderAnimation() {
        // increment the value of slider 0.1 for every udpdate
        var sdiff = sMax - sMin;
            newval = slider.Value() + 0.1;
        // set the position of slider
        slider.position = (newval - sMin) / sdiff;
        // set a boundary for slider
        // notice: the range of slider.position is 0 to 1
        var boundary = slider2.Value() / sMax;
        if (slider.position > boundary) {
            slider.position = 0.0;
        }
        // update the main board
        board.update();
        // update the value in textbox
        document.getElementById('fo').value = (slider.position * sMax).toFixed(2);
        document.getElementById('fs').value = (slider2.position * sMax).toFixed(2);
        document.getElementById('phase').value = (phase.Value()).toFixed(2);
        // call itself every 25 milliseconds
        animate = setTimeout(sliderAnimation,25);
    };
    // stop and resume play animation
    function player(){
        if (!animate) {
            document.getElementById('playbutton').value = ' stop demo ';
            sliderAnimation();
        } else {
            document.getElementById('playbutton').value = ' play demo ';
            clearTimeout(animate);
            animate = null;
        }
    };
    // update the slider with requested user input
    function updateSlider() {
        document.getElementById('updateText').value = 'update';
        fo = document.getElementById('fo').value;
        slider.position = (fo - sMin) / sMax;
        ph = document.getElementById('phase').value;
        phase.position = (ph / pi) / 2 + 0.5;
        fs = document.getElementById('fs').value;
        slider2.position = (fs - sMin) / sMax;
        board.update();
    }
    function showOriginal() {
        pr1.hideElement();
        //pr2.hideElement();
        fr1.hideElement();
        fr2.hideElement();
        graph.showElement();
        graph2.hideElement();
        po1.showElement();
        //po2.showElement();
        fo1.showElement();
        fo2.showElement();
    }
    function showSampled() {
        graph.hideElement();
        graph2.showElement();
        po1.hideElement();
        //po2.hideElement();
        fo1.hideElement();
        fo2.hideElement();
        pr1.showElement();
        //pr2.showElement();
        fr1.showElement();
        fr2.showElement();
    }
    function showBoth() {
        graph.showElement();
        graph2.showElement();
        po1.showElement();
        //po2.showElement();
        fo1.showElement();
        fo2.showElement();
        pr1.showElement();
        //pr2.showElement();
        fr1.showElement();
        fr2.showElement();
    }
    
    var startTime = new Date();
    
    var seconds;
    var timeDiff;
    
    //var startTime;
    
    function sendState(){
		
		
     	endTime = new Date();
     	timeDiff =  endTime - startTime;
		seconds = Math.round(timeDiff % 60);
		
		fo = document.getElementById('fo').value;
        ph = document.getElementById('phase').value;
        fs = document.getElementById('fs').value;
        var id = <?php echo json_encode($idLab); ?>;
        //send state to PHP
        var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET", "sendState.php?q=" + fo + "&r=" +
		ph + "&s=" + fs + "&id=" + id + "&sec=" + seconds, true);
		xmlhttp.send(null);
		
		startTime = new Date();
	}
	
	function sendUserInfo(){
		var username = document.getElementById('username').value;
        var xmlhttp2 = new XMLHttpRequest();
		xmlhttp2.open("GET", "storeScore.php?q=" + username, true);
		xmlhttp2.send(null);
	}
	
    </script>
</body>
</html>
