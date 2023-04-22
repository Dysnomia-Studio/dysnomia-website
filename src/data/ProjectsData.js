import projectList from './projects.json';

export default class ProjectsData {
	static getProjectsIds() {
		return Object.keys(projectList);
	}

	static getProjects() {
		return Object.values(projectList);
	}

	static getProject(id) {
		return projectList[id];
	}

	static getLatestUpdated(amount, major = true) {
		return Object.values(projectList).filter((project) => {
			return !major || project.major === true;
		}).filter((_, index) => {
			return (index < 3);
		});
	}
}