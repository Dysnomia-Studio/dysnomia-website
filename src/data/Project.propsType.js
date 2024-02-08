import PropTypes from 'prop-types';

const ProjectPropsType = PropTypes.shape({
	id: PropTypes.string.isRequired,
	name: PropTypes.string.isRequired,
	links: PropTypes.arrayOf(PropTypes.shape({
		name: PropTypes.string.isRequired,
		icon: PropTypes.string.isRequired,
		url: PropTypes.string.isRequired,
	})).isRequired,
	hasLogo: PropTypes.bool.isRequired,
	inSidebar: PropTypes.bool.isRequired,
	screenshots: PropTypes.number.isRequired,
});

export default ProjectPropsType;
