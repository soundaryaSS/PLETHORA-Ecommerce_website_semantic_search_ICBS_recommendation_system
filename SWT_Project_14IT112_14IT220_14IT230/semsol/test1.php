
  <?php
  session_start();
  $con = mysqli_connect("localhost","root","mukta3396","plethora");
  include_once('ARC2.php'); /* ARC2 static class inclusion */ 
 
 
  $dbpconfig = array(
  "remote_store_endpoint" => "http://localhost:3030/ds/query",
   );
 
  $store = ARC2::getRemoteStore($dbpconfig); 
 
  if ($errs = $store->getErrors()) {
     echo "<h1>getRemoteSotre error<h1>" ;
  }

  $query = '
    SELECT ?subject
WHERE {
 ?subject <http://www.semanticweb.org/mukta/ontologies/2016/10/testontology#category_name> "'. $_GET['srch-term'].'"
}
  ';
 
 
  $rows = $store->query($query, 'rows'); /* execute the query */
   foreach( $rows as $row ) { /* loop for each returned row */

         
 			$sub=$row['subject'];

 			
  }
  
  if ($errs = $store->getErrors()) {
     echo "Query errors" ;

  }
 	$query1 = '
    SELECT ?object
WHERE {
 <'. $sub . '> <http://www.semanticweb.org/mukta/ontologies/2016/10/testontology#category_id> ?object
}
  ';

  $rows1 = $store->query($query1, 'rows'); /* execute the query */
  /* display the results in an HTML table */

  foreach( $rows1 as $row1 ) { /* loop for each returned row */
			$category=$row1['object'];
			
  }
	 session_start();
 					$_SESSION['category']=$category;

 echo "<script> window.history.go(-1); </script>";

  ?>

