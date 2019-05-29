'use strict';

class ImageDisplayImpressum extends React.Component {
	render() {
	  return(
	  	<div className="full-scale">
			{/* the image inclusive the bottom yellow border */}
			<div className="impressum-image-display" id="image-display-yellow-transition"></div>
			{/* the little arrow, below the yellow border */}
			<div className="col-12"><img src="./images/arrow-25to15.png" alt="yellow arrow" /></div>
		</div>
	  );
	}
  }

let elementImpressum = <ImageDisplayImpressum/>;

ReactDOM.render(
  elementImpressum,
  document.getElementById('impressumImageDisplay')
);

