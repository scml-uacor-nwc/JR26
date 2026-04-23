console.log('JR26 main.js loaded');

document.addEventListener('DOMContentLoaded', () => {

	// Mobile navigation toggle
	const navToggle = document.querySelector('.js-nav-toggle');
	const navClose  = document.querySelector('.js-nav-close');
	const nav       = document.getElementById('primary-navigation');

	function openNav() {
		if (!nav) return;
		nav.classList.add('is-open');
		navToggle && navToggle.setAttribute('aria-expanded', 'true');
		document.body.style.overflow = 'hidden';
	}

	function closeNav() {
		if (!nav) return;
		nav.classList.remove('is-open');
		navToggle && navToggle.setAttribute('aria-expanded', 'false');
		document.body.style.overflow = '';
	}

	navToggle && navToggle.addEventListener('click', openNav);
	navClose  && navClose.addEventListener('click', closeNav);

	document.addEventListener('keydown', (e) => {
		if (e.key === 'Escape' && nav && nav.classList.contains('is-open')) {
			closeNav();
		}
	});

	// Search panel toggle
	const searchToggle = document.querySelector('.js-search-toggle');
	const searchPanel  = document.getElementById('site-search-panel');

	function openSearch() {
		if (!searchPanel) return;
		searchPanel.removeAttribute('hidden');
		searchToggle && searchToggle.setAttribute('aria-expanded', 'true');
		searchPanel.querySelector('.search-field') && searchPanel.querySelector('.search-field').focus();
	}

	function closeSearch() {
		if (!searchPanel) return;
		searchPanel.setAttribute('hidden', '');
		searchToggle && searchToggle.setAttribute('aria-expanded', 'false');
	}

	const searchClose  = document.querySelector('.js-search-close');
	searchClose && searchClose.addEventListener('click', closeSearch);

	searchToggle && searchToggle.addEventListener('click', () => {
		const isOpen = searchToggle.getAttribute('aria-expanded') === 'true';
		isOpen ? closeSearch() : openSearch();
	});

	document.addEventListener('keydown', (e) => {
		if (e.key === 'Escape' && searchPanel && !searchPanel.hasAttribute('hidden')) {
			closeSearch();
			searchToggle && searchToggle.focus();
		}
	});

	document.addEventListener('click', (e) => {
		if (!searchPanel || searchPanel.hasAttribute('hidden')) return;
		if (!searchPanel.contains(e.target) && !searchToggle.contains(e.target)) {
			closeSearch();
		}
	});


	const featuredVideos = document.querySelectorAll('.js-featured-video');

	featuredVideos.forEach((videoWrapper) => {
		const button = videoWrapper.querySelector('.home-featured-video__button');
		const embedUrl = videoWrapper.dataset.embedUrl;

		if (!button || !embedUrl) {
			return;
		}

		button.addEventListener('click', () => {
			videoWrapper.innerHTML = `
				<div class="home-featured-video__embed">
					<iframe
						class="home-featured-video__iframe"
						src="${embedUrl}"
						title="Embedded video player"
						frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
						referrerpolicy="strict-origin-when-cross-origin"
						allowfullscreen
					></iframe>
				</div>
			`;
		});
	});
});