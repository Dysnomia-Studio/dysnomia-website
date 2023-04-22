import './index.css';

import i18next, { t } from "i18next";

export default function HomepageProject({ project, description }) {
	return (
		<div className={`homepage-project homepage-project-${project.id}`}>
			<div className="homepage-project-screenshots">
				{project.screenshots > 0 && <img src={`/img/${project.id}/screenshot-0.png`} alt={`${project.name} screenshot`} />}
				{project.screenshots > 1 && <img src={`/img/${project.id}/screenshot-1.png`} alt={`${project.name} screenshot`} />}
				{project.screenshots > 2 && <img src={`/img/${project.id}/screenshot-2.png`} alt={`${project.name} screenshot`} />}
			</div>

			<div className="homepage-project-details">
				{!project.hasLogo && <h2 className="homepage-project-title">{project.name}</h2>}
				{project.hasLogo && <img className="homepage-project-logo" src={`/img/${project.id}/logo.png`} alt={`${project.name} logo`} />}

				{project.screenshots > 0 && <img className="homepage-project-screenshot-mobile" src={`/img/${project.id}/screenshot-0.png`} alt={`${project.name} screenshot`} />}

				<p>{t('site.description')}</p>
				<p>{t(`projects.${project.id}.description`)}</p>
				<p>{description}</p>
			</div>
		</div>
	);
}