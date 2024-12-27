import { defaultLang, languageList, translations } from './constants';

export function getLangFromUrl(url) {
	const [, lang] = url.pathname.split('/');
	if(languageList.includes(lang)) {
		return lang;
	}
	return defaultLang;
}

export function useTranslations(lang) {
	return function t(key) {
		const keys = key.split('.');

		if(keys.length === 2) {
			const [tCategory, tKey] = keys;

			const localizedText = translations[lang][tCategory][tKey];
			if(localizedText && localizedText !== '?') {
				return localizedText;
			}

			return translations[defaultLang][tCategory][tKey];
		} else {
			const [tCategory, tGame, tKey] = keys;
			const localizedText = translations[lang][tCategory][tGame][tKey];
			if(localizedText && localizedText !== '?') {
				return localizedText;
			}

			return translations[defaultLang][tCategory][tGame][tKey];
		}
	}
}