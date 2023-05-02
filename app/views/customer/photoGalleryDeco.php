<!doctype html>
<html>
<head>
 
		<title>Photo Carosal</title>
                    


 <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">
		<style>
 
body{    
    font-family: 'Roboto Condensed', sans-serif;
    overflow-x: hidden; 
}
        /* body { background-image: url(ur.jpg)} */
        h1 { margin:150px auto 30px auto; text-align:center; color:#fff;}
   
            .hi-slide { position: relative; width: 754px; height: 292px; margin: 115px auto 0; }
            
.hi-slide .hi-next,
.hi-slide .hi-prev 
            { position: absolute;
              top: 50%; 
              width: 40px;
              height: 40px; 
              margin-top: -20px;     
              border-radius: 50px; 
                 
                
              line-height: 40px;
              text-align: center; 
              cursor: pointer;
              background-color: #fff; 
              color: black;               
              transition: all 0.6s;
              font-size: 20px; 
                font-weight: bold;
            }
           .hi-slide .hi-next:hover, 
            .hi-slide .hi-prev:hover 
            {
            opacity: 1; 
            background-color: #fff;  
            }
            
           .hi-slide .hi-prev { left: -60px; }
            
    .hi-slide .hi-prev::before { content: '<'; }
    .hi-slide .hi-next { right: -60px; }
    .hi-slide .hi-next::before { content: '>'; }
    
            .hi-slide > ul
                    { 
                        list-style: none; 
                        position: relative;
                        width: 754px; 
                        height: 292px; 
                        margin: 0;
                        padding: 0;
            }
            
            
        .hi-slide > ul > li {
            overflow: hidden; 
            position: absolute; 
            z-index: 0; 
            left: 377px;
            top: 146px; 
            width: 0; 
            height: 0; 
            margin: 0; 
            padding: 0;
            border: 3px solid #fff;
            border-radius:10px;
            background-color: #333; 
            cursor: pointer; }
            
        .hi-slide > ul > li > img { width: 100%; height: 100%; background-position: center;}

 

		</style>
	</head>
	<body>
 <br><br>
		<div class="slide hi-slide" style="margin-bottom:150px;">
		  <div class="hi-prev "></div>
			<div class="hi-next "></div>
			<ul>
				<li><img src="https://images.pexels.com/photos/698907/pexels-photo-698907.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!"/></li>
				<li><img src="https://images.pexels.com/photos/6211092/pexels-photo-6211092.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!" /></li>
				<li><img src="https://images.pexels.com/photos/6102575/pexels-photo-6102575.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!" /></li>
				<li><img src="https://images.pexels.com/photos/6211036/pexels-photo-6211036.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!" /></li>
				<li><img src="https://images.pexels.com/photos/4916677/pexels-photo-4916677.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!" /></li>
				<li><img src="https://images.pexels.com/photos/6102440/pexels-photo-6102440.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!" /></li>
				<li><img src="https://images.pexels.com/photos/6152029/pexels-photo-6152029.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!" /></li>
                                <li><img src="https://images.pexels.com/photos/4947272/pexels-photo-4947272.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!" /></li>
			</ul>
		</div>
		
		
		
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="<?php echo URLROOT ?>/public/js/customer/jquery.hislide.js"></script>

		<!-- <script type="text/javascript" src="js/jquery.hislide.js" ></script> -->
		<script>
			$('.slide').hiSlide();
		</script>
	</body>
    
</html>
