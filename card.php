  <body>
  <style>
  
  .s2
{
  position:static;
  margin-bottom:0;
  font-family:Times New Roman;
  padding-top:20px;
}
.s1
{
  margin-bottom:0;
  font-family:Times New Roman;
  padding-top:100px;	
}

  </style>
  </body>
  
  <div class="s1">
	<div class="row">
	<div class="column">
		<div class="card">
		<?php
		echo "
		<form method='POST' action='order1.php?id=",$row1['id'],"'>
		"
		?>
		<img src="d1.png" height="400"  width="200"/><br><br>
		 <?php echo $row1['dress'] ?> <br>₹ <?php echo $row1['price'] ?> /-<br>
		 <div class="button">
		 <input type="submit" class="btn" name="sub" value="View Product"/>
        </div></form>
		</div>
    </div>

<div class="column">
		<div class="card1">
		<?php
		echo "
		<form method='POST' action='order1.php?id=",$row2['id'],"'>
		"
		?>
		<img src="t1.jpeg" height="380"  width="200"/><br><br>
		 <?php echo $row2['dress'] ?> <br>₹ <?php echo $row2['price'] ?> /-<br>
		 <div class="button">
          <input type="submit" class="btn" name="sub" value="View Product"/>
        </div></form>
		</div>
    </div>


  <div class="column">
		<div class="card">
				<?php
		echo "
		<form method='POST' action='order1.php?id=",$row3['id'],"'>
		"
		?>
		<img src="d2.jfif" height="405"  width="200"/>	<br><br>
		 <?php echo $row3['dress'] ?> <br>₹ <?php echo $row3['price'] ?> /-<br>
		 <div class="button">
          <input type="submit" class="btn" name="sub" value="View Product"/>
        </div></form>
		</div>
		 </div>
		 
  
	<div class="column">
    <div class="card">
			<?php
		echo "
		<form method='POST' action='order1.php?id=",$row4['id'],"'>
		"
		?>
	<img src="g1.jpg" height="400"  width="200"/>
	<br><br>
		   <?php echo $row4['dress'] ?> <br>₹ <?php echo $row4['price'] ?> /-<br>
		 <div class="button">
          <input type="submit" class="btn" name="sub" value="View Product"/>
        </div></form>
    </div>
  </div>
  
 

 <div class="column">
		<div class="card">
				<?php
		echo "
		<form method='POST' action='order1.php?id=",$row5['id'],"'>
		"
		?>
		<img src="d3.jpg" height="400"  width="200"/>
		<br><br>
		 <?php echo $row5['dress'] ?> <br>₹ <?php echo $row5['price'] ?> /-<br>
		 <div class="button">
          <input type="submit" class="btn" name="sub" value="View Product"/>
        </div></form>
		</div>
    </div>
  

	<div class="column">
		<div class="card">
				<?php
		echo "
		<form method='POST' action='order1.php?id=",$row6['id'],"'>
		"
		?>
		<img src="t3.jpeg" height="405"  width="200"/>
		<br><br>
		 <?php echo $row6['dress'] ?> <br>₹ <?php echo $row6['price'] ?> /-<br>
		 <div class="button">
          <input type="submit" class="btn" name="sub" value="View Product"/>
        </div></form>
		</div>
    </div>
  
  <div class="column">
		<div class="card">
				<?php
		echo "
		<form method='POST' action='order1.php?id=",$row7['id'],"'>
		"
		?>
		<img src="g3.jpg" height="400"  width="200"/>
		<br><br>
		 <?php echo $row7['dress'] ?> <br>₹ <?php echo $row7['price'] ?> /-<br>
		 <div class="button">
          <input type="submit" class="btn" name="sub" value="View Product"/>
        </div></form>
		</div>	
    </div>
	
	 <div class="column">
		<div class="card">
			<?php
		echo "
		<form method='POST' action='order1.php?id=",$row8['id'],"'>
		"
		?>
		<img src="t2.jpeg" height="380"  width="200"/>
		<br><br>
		  <?php echo $row8['dress'] ?> <br>₹ <?php echo $row8['price'] ?> /-<br>
		 <div class="button">
          <input type="submit" class="btn" name="sub" value="View Product"/>
        </div></form>
		</div>	
    </div>
	
	 
	 <div class="column">
		<div class="card">
				<?php
		echo "
		<form method='POST' action='order1.php?id=",$row9['id'],"'>
		"
		?>
		<img src="g2.jpg" height="400"  width="200"/>
		<br><br>
		 <?php echo $row9['dress'] ?> <br>₹ <?php echo $row9['price'] ?> /-<br>
		 <div class="button">
          <input type="submit" class="btn" name="sub" value="View Product"/>
        </div></form>
		</div>	
    </div>


</div>

</div>