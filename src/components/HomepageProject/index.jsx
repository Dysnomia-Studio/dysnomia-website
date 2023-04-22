import './index.css';

import { useTranslation } from 'react-i18next';

export default function HomepageProject({ project }) {
	const { t } = useTranslation("translation");

	return (
		<div id={project.id} className={`homepage-project homepage-project-${project.id}`}>
			<div className="homepage-project-screenshots">
				{project.screenshots > 0 && <img src={`/img/${project.id}/screenshot-0.png`} alt={`${project.name} screenshot`} />}
				{project.screenshots > 1 && <img src={`/img/${project.id}/screenshot-1.png`} alt={`${project.name} screenshot`} />}
				{project.screenshots > 2 && <img src={`/img/${project.id}/screenshot-2.png`} alt={`${project.name} screenshot`} />}
			</div>

			<div className="homepage-project-details">
				{!project.hasLogo && <h2 className="homepage-project-title">{project.name}</h2>}
				{project.hasLogo && <a target="_blank" href={project.links[0].url}><img className="homepage-project-logo" src={`/img/${project.id}/logo.png`} alt={`${project.name} logo`} /></a>}

				{project.screenshots > 0 && <img className="homepage-project-screenshot-mobile" src={`/img/${project.id}/screenshot-0.png`} alt={`${project.name} screenshot`} />}

				<p>{t(`projects.${project.id}.description`)}</p>

				<div className="homepage-project-link-list">
					{project.links.map((x, i) => (
						<a key={i} className="homepage-project-link" target="_blank" href={x.url}>
							<img src={x.icon} alt={x.name} />
							<span>{x.name}</span>
						</a>
					))}
				</div>
			</div>
		</div>
	);
}