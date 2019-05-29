'use strict';

class ImageDisplayAnfahrt extends React.Component {
	render() {
	  return(
	  	<div className="full-scale">
			{/* the image inclusive the bottom yellow border */}
			<div className="anfahrt-image-display" id="image-display-yellow-transition"></div>
			{/* the little arrow, below the yellow border */}
			<div className="col-12"><img src="./images/arrow-25to15.png" alt="yellow arrow" /></div>
		</div>
	  );
	}
  }

let elementAnfahrt = <ImageDisplayAnfahrt/>;

ReactDOM.render(
  elementAnfahrt,
  document.getElementById('anfahrtImageDisplay')
);

