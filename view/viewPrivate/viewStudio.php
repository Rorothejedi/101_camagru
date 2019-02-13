<?php 
	$title = 'Studio';
	ob_start();
?>

<div class="container">
	<div id="alertNone"></div>
	<div class="row">
		<div class="col-xl-9">
			<div class="longbar">
				<form action="processSaveImage" method="POST">
					<h2 class="longbar-title">Studio</h2>
					<hr>
					
					<div id="slider1" class="mb-4">
						<label for="vador">
						<input type="radio" name="layer" value="vador" id="vador" onClick="replyClick(this.id)">
							<div class="item">
								<img src="./files/filters/vador_mini.png" alt="Casque Dark Vador cartoon">
							</div>
						</label>

						<label for="viking">
						<input type="radio" name="layer" value="viking" id="viking" onClick="replyClick(this.id)">
							<div class="item">
								<img src="./files/filters/viking_mini.png" alt="Casque Viking cartoon">
							</div>
						</label>

						<label for="hipster">
						<input type="radio" name="layer" value="hipster" id="hipster" onClick="replyClick(this.id)">
							<div class="item">
								<img src="./files/filters/hipster_mini.png" alt="Style hipster">
							</div>
						</label>
						
						<label for="cocktail">
						<input type="radio" name="layer" value="cocktail" id="cocktail" onClick="replyClick(this.id)">
							<div class="item">
								<img src="./files/filters/cocktail_mini.png" alt="Cocktail">
							</div>
						</label>
						
						<label for="hammer">
						<input type="radio" name="layer" value="hammer" id="hammer" onClick="replyClick(this.id)">
							<div class="item">
								<img src="./files/filters/hammer_mini.png" alt="Marteau viking">
							</div>
						</label>

						<label for="halo">
						<input type="radio" name="layer" value="halo" id="halo" onClick="replyClick(this.id)">
							<div class="item">
								<img src="./files/filters/halo_mini.png" alt="Casque Halo">
							</div>
						</label>

						<!-- Ici d'autres minatures de layers -->
					</div>

					<div class="fakeScreen">
						<video id="videoElement" autoplay></video>	
						<div>
							<img class="d-none layerPlayer" src="./files/filters/vador.png" id="vadorLayer">
							<img class="d-none layerPlayer" src="./files/filters/viking.png" id="vikingLayer">
							<img class="d-none layerPlayer" src="./files/filters/hipster.png" id="hipsterLayer">
							<img class="d-none layerPlayer" src="./files/filters/cocktail.png" id="cocktailLayer">
							<img class="d-none layerPlayer" src="./files/filters/hammer.png" id="hammerLayer">
							<img class="d-none layerPlayer" src="./files/filters/halo.png" id="haloLayer">
							<!-- Ici d'autres layers -->

						</div>	
						<input id="imgHidden" name="imgHidden" type="hidden" value="">
					</div>

					<div class="text-right takePhotoParent">
						<button type='submit' id="takePhoto" class="style-button button-color-photo" onclick="instashot();" disabled></button>
					</div>

					<div class="text-right mt-3">
						<p class="small">Utilisez votre webcam ou <label class="font-italic label-file" for="loadImg"> chargez une image </label></p>
						<input type="file" class="small input-file" id="loadImg" accept=".png, .jpg">
					</div>
				</form>
			</div>
		</div>

		<!-- Gérer l'affichage en fonction du nombre de photo de l'user -->

		<div class="col-xl-3">
			<div class="sidebar">
				<h2 class="sidebar-title">Vos derniers instashots</h2>
				<canvas class='fakeImg' id="canvas" width="1280" height="720"></canvas>
				<div class="fakeImg"></div>
				<div class="fakeImg"></div>
				<div class="mt-4 mb-2">
					<a href="./" class="style-button button-color-sidebar">Voir tous...</a>
				</div>
			</div>
		</div>
	</div>
</div>


<?php 
	$content = ob_get_clean();
	require('./view/template/template.php');
?>