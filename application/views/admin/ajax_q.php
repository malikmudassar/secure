<select class="form-control" name='question'>
<?php
$count=count($questions);
	for($i=0;$i<$count;$i++){
?>
	<option value="<?php echo $questions[$i]['id']?>"><?php echo substr($questions[$i]['statement'], 0,100)?></option>
<?php
	}
?>
</select>