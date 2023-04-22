import { useTranslation } from 'react-i18next';

import './index.css';

export default function Contact() {
	const { t } = useTranslation("translation");

	return (
		<div className="contact">
			<h2>{t('contact.title')}</h2>
			<p>{t('contact.text')}</p>
			<ul>
				<li><a href="https://discord.com/invite/c8aARey">Discord</a></li>
				<li><a href="https://twitter.com/DysnomiaStudio">Twitter</a></li>
			</ul>
		</div>
	);
}