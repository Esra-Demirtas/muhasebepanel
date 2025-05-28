<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 28.05.2025
 * Time: 18:38
 */
?>
<?php
$alert = $this->session->flashdata("alert");
if($alert){
	if($alert["type"] === "success"){ ?>
		<script>
			swal.fire({
				title: '<?php echo $alert["title"]; ?>',
				html: `<?php echo $alert["text"]; ?>`,
				icon: "success",
				showConfirmButton: false,
				timer : 1500
			});
		</script>
	<?php } else { ?>
		<script>
			swal.fire({
				title: '<?php echo $alert["title"]; ?>',
				html: `<?php echo $alert["text"]; ?>`,
				icon: "error",
				showConfirmButton: false,
				timer : 1500
			});
		</script>
	<?php }
} ?>
