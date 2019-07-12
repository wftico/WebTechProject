'use strict';

class ImageDisplayPhilosophie extends React.Component {
	render() {
	  return(
	  	<div className="full-scale">
			{/* the image inclusive the bottom yellow border */}
			<div className="philosophie-image-display" id="image-display-yellow-transition">
				
			</div>
			{/* the little arrow, below the yellow border */}
			<div className="col-12 yellow-arrow-padding-fix"><img src="./images/arrow-25to15.png" alt="yellow arrow" /></div>
		</div>
	  );
	}
  }

let elementPhilosophie = <ImageDisplayPhilosophie/>;

ReactDOM.render(
  elementPhilosophie,
  document.getElementById('philosophieImageDisplay')
);

