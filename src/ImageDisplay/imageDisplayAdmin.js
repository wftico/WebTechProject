'use strict';

class ImageDisplayAdmin extends React.Component {
	render() {
	  return(
	  	<div className="full-scale">
			{/* the image inclusive the bottom yellow border */}
			<div className="admin-image-display" id="image-display-yellow-transition">
				{/* 
				<div class="col-12"><h1 class="text-label-center">&raquo; Admin</h1></div>
				*/}
			</div>
			{/* the little arrow, below the yellow border */}
			<div className="col-12 yellow-arrow-padding-fix"><img src="../images/arrow-25to15.png" alt="yellow arrow" /></div>
		</div>
	  );
	}
  }

let elementAdmin = <ImageDisplayAdmin/>;

ReactDOM.render(
  elementAdmin,
  document.getElementById('adminImageDisplay')
);

