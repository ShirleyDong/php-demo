<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `books` WHERE CONCAT(`book_id`, `title`, `pages`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 elseif(isset($_POST['All'])) {
    $query = "SELECT * FROM `books`";
    $search_result = filterTable($query);
}else{
	$query = "SELECT * FROM `books`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect  =  mysqli_connect('cs1.ucc.ie','td11','fou0Chah','mscim2018_td11');
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>






<!DOCTYPE html>
<html>
    <head>
    <meta charset = "utf-8">
        <title>Book</title>
    	<link rel="stylesheet" type="text/css" href="style.css">
    
        <script>
        function change(selectedValue){
        	if(selectedValue == "byName"){
        		sortTableByName();
        		}
        	if(selectedValue == "byPage"){
        		sortTableByPage();
        		}
        	if(selectedValue == "byId"){
        		sortTableById();
        		}
        	}
		function sortTableByName() {
  		var table, rows, switching, i, x, y, shouldSwitch;
  			table = document.getElementById("tableBook");
  			switching = true;
  
 		while (switching) {    	
    		switching = false;
    		rows = table.getElementsByTagName("TR");
    
    	for (i = 1; i < (rows.length - 1); i++) {

      		shouldSwitch = false;

      		x = rows[i].getElementsByTagName("TD")[1];
      		y = rows[i + 1].getElementsByTagName("TD")[1];
      
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        shouldSwitch= true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

function sortTableByPage() {
  		var table, rows, switching, i, x, y, shouldSwitch;
  			table = document.getElementById("tableBook");
  			switching = true;
  
 		while (switching) {    	
    		switching = false;
    		rows = table.getElementsByTagName("TR");
    
    	for (i = 1; i < (rows.length - 1); i++) {

      		shouldSwitch = false;

      		x = rows[i].getElementsByTagName("TD")[2];
      		y = rows[i + 1].getElementsByTagName("TD")[2];
      
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        shouldSwitch= true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

function sortTableById() {
  		var table, rows, switching, i, x, y, shouldSwitch;
  			table = document.getElementById("tableBook");
  			switching = true;
  
 		while (switching) {    	
    		switching = false;
    		rows = table.getElementsByTagName("TR");
    
    	for (i = 1; i < (rows.length - 1); i++) {

      		shouldSwitch = false;

      		x = rows[i].getElementsByTagName("TD")[0];
      		y = rows[i + 1].getElementsByTagName("TD")[0];
      
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        shouldSwitch= true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
</script>
    </head>
    <body>
    	<nav>
		<div class="brand" id="nav-placeholder">
			<h2>My page</h2>
		</div>
		<ul class="showing">
			<li><a href="index.html">Home</a></li>
			<li><a href="filter.php">Sort</a></li>
			<li><a href="search.php">Search</a></li>
		</ul>
	   </nav>
	   <section class="sec1"></section>
	   <section class="sec2">
    	
        
        
        <form action="filter.php" method="post">
        	Please input id, name or pages to search:<br>
            <input type="text" name="valueToSearch" placeholder="Search"><br><br>
            <input type="submit" name="search" value="Search Books"><br><br>
            <select onchange = "change(this.value)">
	   		<option value = "byId" selected>SortById</option>
	   		<option value = "byName">SortByName</option>
	   		<option value = "byPage">SortByPage</option>
	   		</select>
	   		<br><br>
	   		<input type="submit" name="showAll" value="All"><br>
            <table id="tableBook">
                <tr>
                    <th>Book Id</th>
                    <th>Book Name</th>
                    <th>Pages</th>

                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['book_id'];?></td>
                    <td><?php echo $row['title'];?></td>
                    <td><?php echo $row['pages'];?></td>

                    
                </tr>
                <?php endwhile;?>
            </table>
        </form>
    </section>
    </body>
</html>