import './index.css';

export default function ProjectList({ projects }) {
	return (
		<div className="sidebar">
			<img className='sidebar-dysnomia-logo' src='/img/dysnomia.png' />
			<div className="project-list">
				{projects.map((project, index) => (
					project.inSidebar && <a href={`#${project.id}`} className="project-list-item" key={index}>
						<img src={`/img/${project.id}/sidebar-logo.png`} />
						{project.name}
					</a>
				))}
			</div>
			<a className="sidebar-link" href="#downstatus">Websites</a>
			<a className="sidebar-link" href="#contact">Contact</a>
			<a className="sidebar-link" href="https://blog.dysnomia.studio">Blog</a>
			<a className="sidebar-link" href="https://github.com/Dysnomia-Studio">Github</a>
			<a className="sidebar-link" href="https://twitter.com/DysnomiaStudio">Twitter</a>
		</div>
	);	
}