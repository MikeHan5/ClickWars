<?php

$db = mysqli_connect('localhost', 'root', 'Phantom123!') or die(mysql_connect_error());

mysqli_select_db($db, 'ClickWars') or die(myslqi_connect_error());

mysqli_query($db, "
CREATE TABLE IF NOT EXISTS counter(
	count BIGINT NOT NULL PRIMARY KEY
)") or die(mysqli_error($db));

$view = mysqli_query($db, "SELECT * FROM counter") or die(mysqli_error($db));

// $page_id = mysql_real_escape_string(html_entities($_POST['page_id']));
// $rating = mysql_real_escape_string(html_entities($_POST['rating']));

// mysql_query(" UPDATE ratings(vote) VALUES ('$rating') WHERE id = '$page_id' ");
?>
<script>
function rate(rating, page_id)
{

   $.ajax({
      url: 'path/to/php_script.php',
      type: 'post',
      data: 'rating='+rating+'&page_id='+page_id,
      success: function(output) 
      {
          alert('success, server says '+output);
      }, error: function()
      {
          alert('something went wrong, rating failed');
      }
   });

}
</script>

<form>   
   Like: <input type="button" value="Like" onClick="rate(1, $_GET['page_id'])" />
   <br />
   Hate: <input type="button" value="Hate" onClick="rate(2, $_GET['page_id'])" />
</form>