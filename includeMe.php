<?php
/* includeMe.php
   tabledump function, display and SQL result table, with headers.
   openZoo function, to open the Zoo database
*/
   
   // if there's an error, head to ErrorReport with messages (and don't return)
   function mysqlErrorCheck( $result )
   {
      echo "inside mysqlErrorCheck ";
      //if ( $result.mysql_errno() != 0 )
      {
         $num = mysql_errno();
         $msg = addslashes( mysql_error());
         echo "num=$num msg=$msg";
         header("Location: ErrorReport.php?stat=mysqlerror&num=ack&msg=blork"); exit;
      }
   }


   // Returns true if $result has no errors and is not empty.
   // Will echo HTML if there IS an error.
   function noerror( $result )
   {
      if($result==0)
      {
          //echo "check1";
         echo "<b>Error ".mysql_errno().": ".mysql_error()."</b>";
         return false;
      }
      elseif (@mysql_num_rows($result)==0)
      {
         //echo "check2";
         echo "<b>Query completed.  Empty result.</b><br>\n";
         return false;
      }
      else
      { return true; }
   }
   // Returns true if $result has no errors. empty is ok.
   // Will echo HTML if there IS an error.
   function noerrorquiet( $result )
   {
      if($result==0)
      {
          //echo "check1";
         echo "<b>Error ".mysql_errno().": ".mysql_error()."</b>";
         return false;
      }
      else
      { return true; }
   }
?>
<?php
   // Returns true if $result is empty (but no an error).  No echoes.
   function isEmpty( $result )
   {
      if($result==0)
      {
         //echo "<b>Error ".mysql_errno().": ".mysql_error()."</b>";
         return false;
      }
      elseif (@mysql_num_rows($result)==0)
      {
         //echo "<b>Query completed.  Empty result.</b><br>";
         return true;
      }
      else
      { return false; }
   }
?>
<?php
function tabledump( $result )
{
   if($result==0)
   {
      echo "<b>Error ".mysql_errno().": ".mysql_error()."</b>";
   }
   else if (@mysql_num_rows($result)==0)
   {
      echo "<b>Query completed.  Empty result.</b><br>";
   }
   else
   {
   $nf = mysql_num_fields($result);
   $nr = mysql_num_rows($result);
      echo "<table border='1'> <thead>";
         echo "<tr>";
            for($i=0; $i<$nf; $i++ )
            {
               echo "<th>".mysql_field_name($result,$i)."</th>";
            }
         echo "</tr>";
      echo "</thead><tbody>";
         for($i=0; $i<$nr; $i++ )
         {
            echo "<tr>";
               $row=mysql_fetch_array($result);
               for( $j=0; $j<$nf; $j++ )
               { echo "<td>".$row[$j]."</td>"; }
            echo "</tr>";
         }
      echo "</tbody></table>";
   }
   return $row;
}
?>