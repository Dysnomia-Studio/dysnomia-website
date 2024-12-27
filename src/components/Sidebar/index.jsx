import PropTypes from 'prop-types';

import ProjectPropsType from '../../data/Project.propsType.js';

import './index.css';

export default function ProjectList({ projects, t }) {
	return (
		<div className="sidebar">
			<img className="sidebar-dysnomia-logo" src="/img/dysnomia.webp" alt="Logo" />
			<div className="project-list">
				{projects.map((project) => (
					project.inSidebar && <a href={`#${project.id}`} className="project-list-item" key={project.id}>
						<img src={`/img/${project.id}/sidebar-logo.webp`} alt={project.name} />
						{project.name}
					</a>
				))}
			</div>
			<a className="sidebar-link" href="#achieve-games">Websites</a>
			<a className="sidebar-link" href="#contact">{t('contact.title')}</a>
			<a className="sidebar-link" href="https://bugs.dysnomia.studio">Bug Tracker</a>
			<a className="sidebar-link" href="https://blog.dysnomia.studio">Blog</a>
			<a className="sidebar-link" href="https://github.com/Dysnomia-Studio">Github</a>
			<a className="sidebar-link" href="https://twitter.com/DysnomiaStudio">Twitter</a>
			<a className="sidebar-link" href="https://patreon.com/DysnomiaStudio">Patreon</a>
			<a className="sidebar-link" href="/privacy">{t('privacy.mainTitle')}</a>
		</div>
	);	
}

ProjectList.propTypes = {
	projects: PropTypes.arrayOf(ProjectPropsType).isRequired,
	t: PropTypes.func.isRequired,
};
