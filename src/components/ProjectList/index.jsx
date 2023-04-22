import './index.css';

export default function ProjectList({ projects }) {
	return (
		<div className="project-list">
			<img className='project-list-dysnomia-logo' src='/img/dysnomia.png' />
			{projects.map((project, index) => (
				<a href={`#${project.id}`} className="project-list-item" key={index}>
					<img src={`/img/${project.id}/sidebar-logo.png`} />
					{project.name}
				</a>
			))}
		</div>
	);	
}