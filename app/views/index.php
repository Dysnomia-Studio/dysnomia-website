		<div id="menu-back"></div>
		<img src="img/hamburger.png" id="hamburger">
		<nav id="menu">
			<ul>
				<li><a href="/">Dysnomia</a></li>
				<li><a class="menuAncre" href="#whoami"><?= MENU_WHOAMI ?></a></li>
				<li><a class="menuAncre" href="#projects"><?= MENU_PROJECTS ?></a></li>
				<li><a class="menuAncre" href="#contact"><?= MENU_CONTACT ?></a></li>
				<!--<li><a class="menuAncre" href="#partners"><?= MENU_PARTNERS ?></a></li>-->
			</ul>
		</nav>

		<section id="index-top" class="corps">
			<h1>Dysnomia</h1>
			<p><?= INDEX_MAIN_TEXT ?></p>
		</section>

		<div id="whoami" class="anchor"></div>
		<section id="index-comp-desc" class="corps-text">
			<h2><?= WHOAMI_TITLE ?></h2>
			<?= WHOAMI_TEXT ?>
		</section>

		<div id="projects" class="anchor"></div>
		<section id="index-projects" class="corps">
			<h2><?= PROJECT_TITLE ?></h2>
			<div class="project-list">
				<div class="project-item">
					<span class="project-title"><a href="https://howtoopen.me" target="_blank">HowToOpen.me</a></span>
					<span class="project-time"><?= PROJECT_SINCE ?> 2018</span><br/><br/>
					<span class="project-type"><?= PROJECT_TOOL ?></span><br/>
					<span class="project-desc"><?= HOWTOOPENME_DESC ?></span><br/><br/>
					<span class="project-logo"><a href="https://howtoopen.me" target="_blank"><img src="img/icons/howtoopenme.jpg" alt="howtoopen.me"></a></span>
					<span class="project-url"><a href="https://howtoopen.me" target="_blank">www.howtoopen.me</a></span><br/>
				</div>

				<div class="project-item">
					<span class="project-title"><a href="https://dehash.me" target="_blank">Dehash.me</a></span>
					<span class="project-time"><?= PROJECT_SINCE ?> 2017</span><br/><br/>
					<span class="project-type"><?= PROJECT_TOOL ?></span><br/>
					<span class="project-desc"><?= DEHASH_DESC ?></span><br/><br/>
					<span class="project-logo"><a href="https://dehash.me"><img src="img/icons/dehashme.jpg" alt="dehash.me"></a></span>
					<span class="project-url"><a href="https://dehash.me">www.dehash.me</a></span><br/>
				</div>

				<div class="project-item">
					<span class="project-title"><a href="https://galactae.eu" target="_blank">Galactae: Space Age Dawn</a></span>
					<span class="project-time"><span class="project-time"><?= PROJECT_SINCE ?> 2016<br><?= PROJECT_OUT ?> en 2018</span></span><br/><br/>
					<span class="project-type"><?= PROJECT_BROWSER_MOBILE_GAME ?></span><br/>
					<span class="project-desc"><?= GALACTAE_DESC ?></span><br/><br/>
					<span class="project-logo"><a href="https://galactae.eu" target="_blank"><img src="img/icons/galactae.jpg" alt="galactae.eu"></a></span>
					<span class="project-url">
						<a href="https://galactae.eu" target="_blank">www.galactae.eu</a><br/><br/>
						<a href="https://play.google.com/store/apps/details?id=eu.elanis.galactae" target="_blank"><img src="img/android.png" alt="android app"></a>
						<a target="_blank"><img src="img/ios-soon.png" alt="ios app"></a>
						<a target="_blank"><img src="img/windows-store-soon.png" alt="windows app"></a>
					</span><br/>
				</div>
			</div>
		</section>

		<div id="contact" class="anchor"></div>
		<section id="index-contact" class="corps">
			<h2><?= CONTACT_TITLE ?></h2>
			
			<form method="post" action="contact">
				<input type="text" name="name" placeholder="Nom" required>
				<input type="text" name="mail" placeholder="Mail" required><br/><br/>
				<select name="objet">
					<option disabled selected><?= CONTACT_OBJ ?></option>
					<option value="partner"><?= CONTACT_PARTNERS ?></option>
					<option value="galactae" disabled>Galactae (<?= CONTACT_CF_OFF_SITE ?>)</option>
					<option value="dehashme">Dehash.me</option>
					<option value="howtoopenme">Howtoopen.me</option>
					<option value="autre"><?= CONTACT_OTHERS ?></option>
				</select><br/><br/>
				<textarea name="message"></textarea><br/>
				<input type="submit" value="<?= CONTACT_ENVOYER ?>">
			</form>
		</section>

		<!--<div id="partners" class="anchor"></div>
		<section id="index-partners" class="corps">
			<h2><?= PARTNERS_TITLE ?></h2>
			
		</section>-->

		<footer>
			<table>
				<tr class="first-footer">
					<td>		
						<ul>
							<li><h3>Galactae</h3></li>
							<li><a href="https://galactae.eu"><?= FOOTER_OFF_WEBSITE ?></a></li>
							<li><a href="https://galactae.eu/medias"><?= FOOTER_GALACTAE_GALERIE ?></a></li>
							<li><a href="https://galactae.eu/blog"><?= FOOTER_DEVBLOG ?></a></li>
							<li><a href="https://forum.galactae.elanis.eu/"><?= FOOTER_FORUM ?></a></li>
						</ul>
					</td>

					<td>
						<ul>
							<li><h3><?= FOOTER_OTHER_WEBSITES ?></h3></li>
							<li><a href="https://dehash.me">Dehash.me</a></li>
							<li><a href="https://howtoopen.me">HowToOpen.Me</a></li>
						</ul>
					</td>

					<td>
						<ul>
							<li><h3><?= FOOTER_SOCIAL_NETWORK ?></h3></li>
							<li><a href="redir/facebook.php">Facebook</a></li>
							<li><a href="redir/twitter.php">Twitter</a></li>
							<li><a href="redir/youtube.php">Youtube</a></li>
							<li><a href="https://discord.gg/c8aARey">Discord</a></li>
						</ul>
					</td>

					<td>
						<ul>
							<li><h3>Divers</h3></li>
							<li><a href="https://bugs.dysnomia.studio"><?= FOOTER_BUGTRACKER ?></a></li>
						</ul>
					</td>
				</tr>
			</table>
			<table>
				<tr class="second-footer">
					<td>Dysnomia <!-- - Société au capital de XXXX€ - SIREN: ......... --><br/>
					Copyright 2018 - <?= FOOTER_ALL_RIGHT_RESERVED ?></td>
				</tr>
			</table>
		</footer>
	</body>
</html>