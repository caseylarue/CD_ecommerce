<!DOCTYPE HTML>
<html>
	<head>
		<style>
				.note {
					width: 230px;
					height: 235px;
					display: inline-block;
					vertical-align: top;
					padding: 0px;
					margin: 10px;
					background-color: PaleGoldenRod;
					overflow-y: auto;
				}

				note.form {
					background-color: PaleGoldenRod;
					padding: 0px 10px;
					width: 200px;
				}

				note {
					padding: 0px 10px;
					width: 500px;
				}

				.input{
					width: 212px;
					height: 208px;
					background-color: PaleGoldenRod;
				}

		</style>
	</head>

	<body>
	<?php 
		foreach ($notes as $note)
		{ ?>
			<div class="note">
				<h4><?= $note['title'] ?></h4>
				<form action='/notes/edit/<?= $note['id'] ?>' method='post'>
					<textarea name='comment'><?= $note['description'] ?></textarea>
					<!-- <input type='submit' name='submit' value='edit'> -->
				</form>
				<form action='/notes/delete/<?= $note['id'] ?>' method='post'>
					<input type="submit" name='submit' value="Delete">
				</form>
			</div>
	<?php } ?>
	</body>
</html>