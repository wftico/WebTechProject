'use strict';

class Header extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return ( 
		
			<div className="full-scale border-bottom-1px">
            {/* header menü */}
				<div className="col-12">
					<ul class="transparentBackground">
						<li id="hauptstadtbiene"><a className="a-logo" href="./index.html">Hauptstadtbiene</a></li>
						<li><a className="a-menu" href="./philosophie.html">Philosophie</a></li>
						<li><a className="a-menu" href="./sortiment.php">Honigsortiment</a></li>
						<li><a className="a-menu" href="./kontakt.php">Kontakt</a></li>
						<li><a className="a-menu" href="./anfahrt.html">Anfahrt</a></li>
						<li><a className="a-menu" href="./impressum.html">Impressum</a></li>
					</ul>
				</div>
            {/* full scale end, next */}
			</div>
			
        );
    }
}

let domContainer = document.querySelector('#header');
ReactDOM.render(<Header/>, domContainer);
