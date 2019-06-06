'use strict';

class ImageDisplaySortiment extends React.Component {
	render() {
	  return(
	  	<div className="full-scale">
			{/* the image inclusive the bottom yellow border */}
			<div className="sortiment-image-display" id="image-display-yellow-transition">
				<div class="col-12"><h1 class="text-label-center">&raquo; Sortiment</h1></div>
			</div>
			{/* the little arrow, below the yellow border */}
			<div className="col-12 yellow-arrow-padding-fix"><img src="./images/arrow-25to15.png" alt="yellow arrow" /></div>
		</div>
	  );
	}
  }

let elementSortiment = <ImageDisplaySortiment/>;

ReactDOM.render(
  elementSortiment,
  document.getElementById('sortimentImageDisplay')
);

