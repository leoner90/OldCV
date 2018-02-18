 <script type="text/javascript">

  var id        = location.hash.split("/id=").pop();
//GET TABLE NAME
  var start_pos = location.hash.indexOf('/') + 1;
  var end_pos   = location.hash.indexOf('/',start_pos);
  var tableName = location.hash.substring(start_pos,end_pos);
//GET DB NAME
  var start_pos = location.hash.indexOf('/',start_pos)+1;
  var end_pos   = location.hash.indexOf('/',start_pos);
  var dbname =  location.hash.substring(start_pos,end_pos); 


  $.post("pages/adObservephp.php",{tableName:tableName , dbname:dbname , id:id},function(data){ var result = JSON.parse(data) ;
    $(".result").html(result); 
      EqualHeight();
  }); 

</script>


<div class="result"></div>
 

 

<!-- active collor in case of reload or first visit -->
<script type="text/javascript">
if (dbname == 'alldistricts') {
  activeColor('.flats')
}
else if (dbname == 'jobs') {
  activeColor('.vacancies')
}

else {
  activeColor('.cars')
}
</script>


