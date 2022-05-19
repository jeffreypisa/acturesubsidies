import Masonry from 'masonry-layout'

export function masonry() {
	const grid = document.querySelector('.masonry-grid')
	const msnry = new Masonry(grid, {
	  itemSelector: '.masonry-item',
	  columnWidth: '.grid-sizer',
		percentPosition: true
	})
	
	msnry.once('layoutComplete', () => {
	  grid.classList.add('load')
	})
	
	msnry.layout()
}