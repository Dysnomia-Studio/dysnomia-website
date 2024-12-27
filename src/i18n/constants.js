import english from './locales/en/translation.json';
import french from './locales/fr/translation.json';

export const defaultLang = 'en';
export const languageList = ['en', 'fr'];

const translationsList = {
	en: english,
	fr: french,
};

export const translations = translationsList;