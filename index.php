<?php $db = new PDO('mysql:host=localhost;dbname=turkiye;charset=utf8','root', 'root'); ?>

<select class="form-control" name="member_country" onChange="ilceGetir(this.value);">
	<?php $listS = $db->query("SELECT * FROM iller ORDER BY il_no ASC"); ?>
	<option value="0" selected>Şehir Seçin
	<?php foreach ($listS as $list) { ?>
		<option value="<?php echo $list['il_no']; ?>"><?php echo $list['isim']; ?></option>
	<?php } ?>
</select>
<select class="form-control" name="member_ilce" id="sehirler">
	<option value="">Lütfen önce şehir seçin!</option>
</select>

<script type="text/javascript">
function ilceGetir(val) {
$.ajax({
  type: "POST",
  url: "",
  data:'country_id='+val,
  success: function(data){
    $("#sehirler").html(data);
  }
});
}
</script>

<?php $listIl = $db->query("SELECT * FROM ilceler WHERE il_no = '$_POST[country_id]'"); ?>
<?php foreach ($listIl as $list) { ?>
	<option value="<?php echo $list['ilce_no']; ?>"><?php echo $list['isim']; ?></option>
<?php } ?>

<script type="text/javascript" src='jquery-2.2.4.min.js'></script>
