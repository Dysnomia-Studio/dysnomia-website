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
}