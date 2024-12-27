import { t } from 'i18next';

import './index.css';

export default function Contact() {
	return (
		<div className="contact" id="contact">
			<h2>{t('contact.title')}</h2>
			<p>{t('contact.text')}</p>
			<ul>
				<li><a href="https://bsky.app/profile/elanis.eu">Bluesky</a></li>
				<li><a href="https://discord.com/invite/c8aARey">Discord</a></li>
				<li><a href="https://mastodon.gamedev.place/@Elanis">Mastodon</a></li>
			</ul>
		</div>
	);
}